<?php

class ArticleTag
{
    static function add($id_article, $id_tag): bool
    {
        global $db;
        $query = "INSERT INTO articles_tags (id_article, id_tag) VALUES (:id_article, :id_tag)";
        $stm = $db->prepare($query);
        $stm->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stm->bindValue(':id_tag', $id_tag, PDO::PARAM_INT);

        return $stm->execute();
    }
}