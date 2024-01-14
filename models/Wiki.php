<?php

class Wiki
{
    public $id;
    public $title;
    public $content;
    private $status;
    public $id_user;
    public $id_category;


    public function __construct($id)
    {
        global $db;

        $query = "SELECT * FROM wikis WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $article = $stm->fetch(PDO::FETCH_ASSOC);

        if ($article !== false > 0) {
            $this->id = $article['id'];
            $this->title = $article['title'];
            $this->content = $article['content'];
            $this->status = $article['status'];
            $this->id_user = $article['id_user'];
            $this->id_category = $article['id_category'];
        }
    }


    static function getAll(): array
    {
        global $db;
        $result = $db->query("
        SELECT wikis.*, GROUP_CONCAT(tags.name separator '#') AS tag_names, categories.name AS category_name
        FROM wikis
        LEFT JOIN wikis_tags ON wikis.id = wikis_tags.id_wiki
        LEFT JOIN tags ON wikis_tags.id_tag = tags.id
        LEFT JOIN categories ON wikis.id_category = categories.id
        WHERE wikis.status = 'published'
        GROUP BY wikis.id
        ");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    static function getMine($id_user)
    {
        global $db;

                                // GROUP_CONCAT = croups tags names into one column (tag_names) as string with ', '
        $query = "SELECT wikis.*, GROUP_CONCAT(tags.name separator ', ') AS tag_names, categories.name AS category_name
        FROM wikis
        LEFT JOIN wikis_tags ON wikis.id = wikis_tags.id_wiki
        LEFT JOIN tags ON wikis_tags.id_tag = tags.id
        LEFT JOIN categories ON wikis.id_category = categories.id
        WHERE wikis.id_user = :id_user
          AND wikis.status = 'published'
        GROUP BY wikis.id

        ";
        $stm = $db->prepare($query);
        $stm->bindValue(':id_user', $id_user, PDO::PARAM_STR);
        $execution = $stm->execute();

        if (!$execution) {
            throw new Exception($stm->errorInfo());
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if ($result !== false) {
                return $result;
            } else {
                return false;
            }
        }
    }

    static function update($title, $content, $id_category, $wiki_id, $id_user): bool
    {
        global $db;
        $query = "UPDATE wikis SET title = :title, content = :content, id_category = :id_category, edit_at = now(), id_user = :id_user  WHERE id = :wiki_id";
        $stm = $db->prepare($query);
        $stm->bindValue(':title', $title, PDO::PARAM_STR);
        $stm->bindValue(':content', $content, PDO::PARAM_STR);
        $stm->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        $stm->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stm->bindValue(':wiki_id', $wiki_id, PDO::PARAM_INT);

        return $stm->execute();
    }

    static function archiveWiki($wiki_id): bool
    {
        global $db;
        $query = "UPDATE wikis SET status = 'archived' WHERE id = :wiki_id";
        $stm = $db->prepare($query);
        $stm->bindValue(':wiki_id', $wiki_id, PDO::PARAM_INT);
        return $stm->execute();
    }

    static function delete($id): bool
    {
        global $db;
        $query = "delete from wikis WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);

        return $stm->execute();
    }


    static function add($title, $content, $id_user, $id_category)
    {
        global $db;
        $query = "INSERT INTO wikis (title, content, create_at, status, id_user, id_category) VALUES (:title, :content, now(), 'published', :id_user, :id_category)";
        $stm = $db->prepare($query);
        $stm->bindValue(':title', $title, PDO::PARAM_STR);
        $stm->bindValue(':content', $content, PDO::PARAM_STR);
        $stm->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stm->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $result = $stm->execute();
        if ($result !== false) {
            return $db->lastInsertId(); // return the id of the wiki just added
        } else {
            return false;
        }
    }

    static function lastWikis(): array
    {
        global $db;
        $result = $db->query("SELECT *
        FROM wikis
        WHERE status = 'published'
        ORDER BY COALESCE(edit_at, create_at) DESC
        LIMIT 3;
        ");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    static function getWiki($wiki_id)
    {
        global $db;
        $query = "
        SELECT wikis.*, GROUP_CONCAT(tags.name separator ', ') AS tag_names, categories.name AS category_name, users.*
        FROM wikis
                 LEFT JOIN wikis_tags ON wikis.id = wikis_tags.id_wiki
                 LEFT JOIN tags ON wikis_tags.id_tag = tags.id
                 LEFT JOIN categories ON wikis.id_category = categories.id
                 LEFT JOIN users on wikis.id_user = users.user_id
        WHERE wikis.id = :wiki_id AND wikis.status = 'published' "
        ;
        $stm = $db->prepare($query);
        $stm->bindValue(':wiki_id', $wiki_id, PDO::PARAM_INT);

        $execution = $stm->execute();
        if (!$execution) {
            throw new Exception($stm->errorInfo());
        } else {
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            if ($result !== false) {
                return $result;
            } else {
                return false;
            }
        }
    }
}