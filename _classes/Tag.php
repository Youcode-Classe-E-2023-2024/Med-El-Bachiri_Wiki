<?php

class Tag
{
    public $id;
    public $name;

    public function __construct($id)
    {
        global $db;

        $query = "SELECT * FROM tags WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if ($user !== false > 0) {
            $this->id = $user['id'];
            $this->name = $user['name'];
        }
    }


    static function getAll(): array
    {
        global $db;
        $result = $db->query("select * from categories");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function edit(): bool
    {
        global $db;
        $query = "UPDATE tags SET name = :name WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stm->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stm->execute();
    }

    static function delete($id) : bool
    {
        global $db;
        $query = "delete from tags WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);

        return $stm->execute();
    }


    static function add($name): bool
    {
        global $db;
        $query = "INSERT INTO tags (name) VALUES (:name)";
        $stm = $db->prepare($query);
        $stm->bindValue(':name', $name, PDO::PARAM_STR);

        return $stm->execute();
    }
}