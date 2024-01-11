<?php

// redirect to home if logged in
if (isset($_SESSION['user_id'])) {
    header('location: index.php?page=home');
}

// register
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];


    $errors = [
        "username_err" => Validation::validateUsername($username),
        "userExist_err" => Validation::userChecker($email),
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
    ];


    if (array_filter($errors)) {

        echo json_encode(["errors" => $errors]);
        exit;
    } else
        try {
            $user = User::register($username, $email, $password);
            if ($user) {
                echo json_encode(['success' => true, 'message' => 'Registration successful']);
                exit;
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            exit;
        }
}