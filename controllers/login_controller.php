<?php
// redirect to home if already logged in
if (isset($_SESSION['user_id'])) {
    header('location: index.php?page=home');
}


// log in
if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $user = User::login($email, $password);
    } catch (Exception $e) {
        die($e->getMessage());
    }
    if ($user !== false){
        header('location: index.php?page=home');
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
    } else {
        header('location: index.php?page=login');
    }
}


// log out
if (isset($_SESSION['user_id']) && isset($_POST['logout_btn'])) {
    session_destroy();
}