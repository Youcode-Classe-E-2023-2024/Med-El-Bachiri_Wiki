<?php

class WikiTag
{
    static function add($id_wiki, $id_tag): bool
    {
        global $db;
        $query = "INSERT INTO wikis_tags (id_wiki, id_tag) VALUES (:id_article, :id_tag)";
        $stm = $db->prepare($query);
        $stm->bindValue(':id_article', $id_wiki, PDO::PARAM_INT);
        $stm->bindValue(':id_tag', $id_tag, PDO::PARAM_INT);

        return $stm->execute();
    }
}