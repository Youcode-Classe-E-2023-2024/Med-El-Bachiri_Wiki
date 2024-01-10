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

        $query = "SELECT * FROM articles WHERE id = :id";
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
        $result = $db->query("select * from articles");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    static function getMine($id)
    {
        global $db;
        $query = "select * from articles where id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_STR);
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

    function edit(): bool
    {
        global $db;
        $query = "UPDATE articles SET title = :title, content = :content, status = :status, id_category = :id_category, edit_at = now()  WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stm->bindValue(':content', $this->content, PDO::PARAM_STR);
        $stm->bindValue(':status', $this->status, PDO::PARAM_STR);
        $stm->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
        $stm->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stm->execute();
    }

    function archiveThisWiki()
    {
        $this->status = 'archived';
    }

    static function delete($id): bool
    {
        global $db;
        $query = "delete from articles WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);

        return $stm->execute();
    }


    static function add($title, $content, $id_user, $id_category): bool
    {
        global $db;
        $query = "INSERT INTO articles (title, content, create_at, status, id_user, id_category) VALUES (:title, :content, now(), 'published', :id_user, :id_category)";
        $stm = $db->prepare($query);
        $stm->bindValue(':title', $title, PDO::PARAM_STR);
        $stm->bindValue(':content', $content, PDO::PARAM_STR);
        $stm->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stm->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        return $stm->execute();
    }
}