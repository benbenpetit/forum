<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_GET['create-post'])) {
    $titrePost = $_GET['title'];
    $sujetPost = $_GET['text'];
    date_default_timezone_set('UTC');
    $date = date("Y-m-d H:i:s");
    $collection = $client->Forum->Posts;
    $result = $collection->insertOne([
        'titrePost' => $titrePost,
        'sujetPost' => $sujetPost,
        'date' => $date,
    ]);
}

?>