<?php

// redirect to dashboard if logged in
if (isset($_SESSION['user_id'])) {
    header('location: index.php?page=dashboard');
}


// register
if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = User::register($username, $email, $password);
        if ($user){
            header('location: index.php?page=login');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}