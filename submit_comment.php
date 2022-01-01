<?php session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
//header('Location: http://localhost:8888/sorbonne/PHP/forum/post.php?id='. $_id);
header('Location: http://localhost:8888/sorbonne/PHP/forum/post.php?id='. $_id);

if (isset($_POST['submit'])) {
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

