<?php session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['submit'])) {
    $titrePost = $_POST['titrePost'];
    $sujetPost = $_POST['sujetPost'];
    date_default_timezone_set('UTC');
    $date = date("Y-m-d H:i:s");
    $collection = $client->Forum->Posts;
    $result = $collection->insertOne([
        'titrePost' => $titrePost,
        'sujetPost' => $sujetPost,
        'date' => $date,
    ]);
}

try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Posts", $query);

    foreach ($rows as $row) {
        echo "titre post :         $row->titrePost</br>
              sujet post :   $row->sujetPost</br> 
              date :    $row->date</br> ";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}

header('Location: http://localhost:8888/sorbonne/PHP/forum/posts.php');

?>