<?php

class Category
{
    public $id;
    public $name;

    public function __construct($id)
    {
        global $db;

        $query = "SELECT * FROM categories WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if ($user !== false > 0) {
            $this->id = $user['id'];
            $this->name = $user['name'];
        }
    }
}