<?php session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['message'])) {
    $_post_id = $_POST['_post_id'];
    $message = $_POST['message'];
    $collection = $client->Forum->Messages;
    $result = $collection->insertOne([
        '_user_id' => $_SESSION['_id'],
        '_post_id' => $_post_id,
        'message' => $message
    ]);
    echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
}
