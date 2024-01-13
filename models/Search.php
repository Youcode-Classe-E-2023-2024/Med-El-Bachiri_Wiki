<?php

class Search
{
        static function searchByTitle($title)
        {
            global $db;
            $titleSql = '%' . $title . '%';
            $sql = "
           SELECT id
            FROM wikis
            WHERE title LIKE :title AND status = 'published';
            ";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $titleSql, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    static function searchByTag($name)
    {
        global $db;
        $tag_name = '%' . $name . '%';
        $sql = "
           SELECT w.id
            FROM wikis w
                     join wikis_tags wt on w.id = wt.id_wiki
                     join tags t on t.id = wt.id_tag
            WHERE t.name LIKE :tag_name
              AND status = 'published';
            ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_name', $tag_name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function searchByCategory($category_name)
    {
        global $db;
        $cat_name_sql = "%" . "$category_name" . "%";
        $sql = "
           SELECT w.id
            FROM wikis w
                     join categories c on w.id_category = c.id
            WHERE c.name LIKE :category_name
              AND status = 'published';
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category_name', $cat_name_sql, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
