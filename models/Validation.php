<?php

class Validation
{

    static function validateUsername($username)
    {
        if (empty($username)) {
            return "Username is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
            return "Invalid username. Username should be at least 3 characters long.";
        }
        return false;
    }

    /**
     * @throws Exception
     */
    static function userChecker($email)
    {
        if (User::checkIfUserExist($email) !== false) {
            return "User already exists";
        } else
            return false;
    }


    static function validateEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        return false;
    }

    static function validatePassword($password)
    {
        if (empty($password)) {
            return "Password is required";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
            return "Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number.";
        }
        return false;
    }

}