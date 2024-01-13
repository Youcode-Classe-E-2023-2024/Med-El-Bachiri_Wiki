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
}
