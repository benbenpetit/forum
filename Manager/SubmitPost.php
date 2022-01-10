<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$manager = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");

try{
    if (isset($_GET['create-post'])) {
        $titrePost = $_GET['title'];
        $sujetPost = $_GET['text'];
        $_pseudo = $_SESSION['pseudo'];
        date_default_timezone_set('UTC');
        $date = date("Y-m-d H:i:s");
        
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['titrePost' => $titrePost,'sujetPost' => $sujetPost,'date' => $date, '_pseudo' => $_pseudo]);
        $manager->executeBulkWrite('forum.Posts', $bulk);
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


?>