<?php
// redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header('location: index.php?page=login');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'getCat') {
        $result = Category::getAll();
        if ($result) {
            exit(json_encode($result));
        }
        exit();
    }

    if (isset($data['type']) && $data['type'] === 'addWiki') {
        $thisWikiId = Wiki::add($data['title'], $data['content'], $_SESSION['user_id'], $data['id_category']);
        if ($thisWikiId !== false) {
            foreach ($data['tags'] as $tag) {
                WikiTag::add($thisWikiId, $tag);
            }
            exit(true);
        } else {
            exit(false);
        }
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'getTags') {
        $result = Tag::getAll();
        if ($result) {
            exit(json_encode($result));
        }
        exit();
    }


    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'getMyWikis') {
        try {
            $result = Wiki::getMine($_SESSION['user_id']);
            if ($result) {
                exit(json_encode($result));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit();
    }

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'editWiki') {
        // Update the wiki
        Wiki::update($data['title'], $data['content'], $data['id_category'], $data['wiki_id'], $_SESSION['user_id']);

        // Delete existing tags for the wiki
        WikiTag::deleteWikiTags($data['wiki_id']);

        // Add the new tags for the wiki
        foreach ($data['tags'] as $tag) {
            WikiTag::add($data['wiki_id'], $tag);
        }

        exit; // Make sure this exit is used for your specific use case
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'deleteWiki') {
        $result = Wiki::delete($data['id']);
        exit($result);
    }
}