<?php session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['submit'])) {
    $_id = $_POST['_id'];
    $_userId = $_SESSION['id'];
    $_postId = $_POST['postId'];
    $message = $_POST['comment'];
    $collection = $client->Forum->Posts;
    //var_dump($collection);
    $result = $collection->insertOne([
        '_id' => $_id,
        '_userId' => $_userId,
        '_postId' => $_postId,
        'message' => $message
    ]);
    echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
}