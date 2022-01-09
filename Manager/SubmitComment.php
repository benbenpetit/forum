<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_GET['message'])) {
    $_user_id = $_SESSION['id'];
    $_pseudo = $_SESSION['pseudo'];
    $_post_id = $_GET['_post_id'];
    $message = $_GET['message'];
    date_default_timezone_set('UTC');
    $date = date("Y-m-d H:i:s");
    $collection = $client->Forum->Messages;
    $result = $collection->insertOne([
        '_user_id' => $_user_id,
        '_post_id' => $_post_id,
        '_pseudo' => $_pseudo,
        'message' => $message,
        'date' => $date
    ]);
    echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
}
