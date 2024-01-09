<?php

class User
{
    public $id;
    public $email;
    public $username;
    public $image;
    public $role;
    private $password;

    public function __construct($id)
    {
        global $db;

        $query = "SELECT * FROM users WHERE user_id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if ($user !== false > 0) {
            $this->id = $user['user_id'];
            $this->email = $user['email'];
            $this->username = $user['username'];
            $this->image = $user['image'];
            $this->password = $user['password'];
        }
    }

    static function getAll(): array
    {
        global $db;
        $result = $db->query("select * from users");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function edit(): bool
    {
        global $db;
        $query = "UPDATE users SET username = :username, email = :email, image = :image WHERE user_id = :id";
        $stm = $db->prepare($query);
        $stm->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stm->bindValue(':image', $this->image, PDO::PARAM_STR);
        $stm->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stm->execute();
    }


    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }


    /**
     * @throws Exception
     */
    static function register($username, $email, $password) : bool
    {
        global $db;

        if (self::checkIfUserExist($email))
        {
            return false;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, image) VALUES (:username, :email, :password, :image)";
        $stm = $db->prepare($query);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->bindValue(':password', $hashed_password, PDO::PARAM_STR);
        $stm->bindValue(':image', 'default_profile.png', PDO::PARAM_STR);

        try {
            $execution = $stm->execute();
            if (!$execution) {
                throw new Exception($stm->errorInfo());
            }
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
        return true;
    }


    /**
     * @throws Exception
     */
    static function checkIfUserExist($email)
    {
        global $db;
        $query = "SELECT * FROM users WHERE email = :email";
        $stm = $db->prepare($query);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $exe = $stm->execute();

        if (!$exe) {
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


    /**
     * @throws Exception
     */
    static function login($email, $password){
        $user = self::checkIfUserExist($email);
        if ($user !== false) {
            if (password_verify($password, $user['password'])) {
                return $user['user_id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}