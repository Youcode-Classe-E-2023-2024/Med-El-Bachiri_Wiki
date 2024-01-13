<?php

if (isset($_GET['search_by_title'])) {
    $input = $_GET['search_by_title'];
    $searchedWikisIDs = Search::searchByTitle($input);
    $output = [];
    foreach ($searchedWikisIDs as $wiki) {
        try {
            $wikiDetail = Wiki::getWiki($wiki['id']);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        $output[] = $wikiDetail;
    }
    echo json_encode($output);
    exit;
}

if (isset($_GET['search_by_tag'])) {
    $input = $_GET['search_by_tag'];
    $searchedWikisIDs = Search::searchByTag($input);
    $output = [];
    foreach ($searchedWikisIDs as $wiki) {
        try {
            $wikiDetail = Wiki::getWiki($wiki['id']);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        $output[] = $wikiDetail;
    }
    echo json_encode($output);
    exit;
}

if (isset($_GET['search_by_category'])) {
    $input = $_GET['search_by_category'];
    $searchedWikisIDs = Search::searchByCategory($input);
    $output = [];
    foreach ($searchedWikisIDs as $wiki) {
        try {
            $wikiDetail = Wiki::getWiki($wiki['id']);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        $output[] = $wikiDetail;
    }
    echo json_encode($output);
    exit;
}