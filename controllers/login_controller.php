<?php
// redirect to home if already logged in
if (isset($_SESSION['user_id'])) {
    header('location: index.php?page=home');
}


// log in
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'];
    $password = $data['password'];


    try {
        $user = User::login($email, $password);
        if ($user === false) {
            echo json_encode(['success' => false, 'message' => 'User not found']);
        } elseif ($user === "passError") {
            echo json_encode(['success' => false, 'message' => 'Password incorrect']);
        } else {
            echo json_encode(['success' => true]);
            $_SESSION['user_id'] = $user['user_id'];
        }
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }
}

// log out
if (isset($_SESSION['user_id']) && isset($_POST['logout_btn'])) {
    session_destroy();
}