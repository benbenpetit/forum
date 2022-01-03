<?php require 'head.php'; 

try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Posts", $query);

    ?>
    <div>
        <form action="create_post.php" method="post">
            <input type="text" name="titrePost" required placeholder="Titre">
            <input type="text" name="sujetPost" required placeholder="De quoi on parle? ">
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
    <?php

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