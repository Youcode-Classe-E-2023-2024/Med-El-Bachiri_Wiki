<?php
$currentUser = new User($_SESSION['user_id']);
if($currentUser->role !== 'admin'){
    header('location: index.php?page=home');
}

// archive wiki
if (isset($_POST['archiveWikiBtn']) && isset($_POST['wikiID'])) {
    $wiki = Wiki::archiveWiki($_POST['wikiID']);
    header('location: index.php?page=dashboard');
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


    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'getTags') {
        $result = Tag::getAll();
        if ($result) {
            exit(json_encode($result));
        }
        exit();
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'editTag' && isset($data['name'])) {
        $tag = new Tag($data['id']);
        $tag->name = $data['name'];
        $result = $tag->edit();
        exit($result);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'deleteCat') {
        $result = Category::delete($data['id']);
        exit($result);
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'deleteTag') {
        $result = Tag::delete($data['id']);
        exit($result);
    }
}