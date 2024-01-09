<?php
if(isset($_SESSION['user_id'])){
    if ($_SESSION['role'] !== 'admin') {
        header('location: index.php?page=home');
    }
}

// handle ajax requests here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // filter request with checking the 'type'

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'addCat' && isset($data['name'])) {
        $result = Category::add($data['name']);
        if ($result) {
            exit(true);
        }
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'getCat') {
        $result = Category::getAll();
        if ($result) {
            exit(json_encode($result));
        }
        exit();
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'editCat' && isset($data['name'])) {
        $cat = new Category($data['id']);
        $cat->name = $data['name'];
        $result = $cat->edit();
        exit($result);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
}