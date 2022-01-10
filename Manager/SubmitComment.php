<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$manager = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");

try {
    if (isset($_GET['message'])) {
        $_user_id = $_SESSION['id'];
        $_pseudo = $_SESSION['pseudo'];
        $_post_id = $_GET['_post_id'];
        $message = $_GET['message'];
        date_default_timezone_set('UTC');
        $date = date("Y-m-d H:i:s");
        $collection = $client->forum->Messages;
        // $result = $collection->insertOne([
        //     '_user_id' => $_user_id,
        //     '_post_id' => $_post_id,
        //     '_pseudo' => $_pseudo,
        //     'message' => $message,
        //     'date' => $date
        // ]);
    
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['_user_id' => $_user_id,'_pseudo' => $_pseudo,'_post_id' => $_post_id, 'message' => $message, 'date' => $date]);
        $manager->executeBulkWrite('forum.Messages', $bulk);
        echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
    } else {
        $filename = basename(__FILE__);
    
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
        
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}

