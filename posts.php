<?php session_start();
require 'vendor/autoload.php';

try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Posts", $query);

    foreach ($rows as $row) {
        echo "<a href='http://localhost/forum/post.php?id=".$row->_id."'>id post : $row->_id</br>
              titre post : $row->titrePost</br>
              sujet post : $row->sujetPost</br> 
              date : $row->date</a></br></br>";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}