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
