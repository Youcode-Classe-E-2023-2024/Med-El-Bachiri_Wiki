<?php
if(isset($_SESSION['user_id'])){
    if ($_SESSION['role'] !== 'admin') {
        header('location: index.php?page=home');
    }
}
// redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header('location: index.php?page=login');
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


    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'addTag' && isset($data['tagName'])) {
        $result = Tag::add($data['tagName']);
        if ($result) {
            exit(true);
        }
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'deleteCat') {
        $result = Category::delete($data['id']);
        exit($result);
    }
}