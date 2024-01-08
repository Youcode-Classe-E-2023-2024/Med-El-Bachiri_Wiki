// log in
if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $user = User::login($email, $password);
    } catch (Exception $e) {
        die($e->getMessage());
    }
    if (isset($user) && $user !== false){
        header('location: index.php?page=dashboard');
        $_SESSION['user_id'] = $user;
    } else {
        header('location: index.php?page=login');
    }
}


