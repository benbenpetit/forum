<?php require_once('head.php');

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

    <div style="">

    
    <?php
    foreach ($rows as $row) {
        // id post : $row->_id pas utile dans la card
        echo "<div class='cardPosts'>
        <a style='text-decoration:none; color:#000' display: inline-block;' href='". $_ENV['BASE_URL'] ."post.php?id=".$row->_id."'></br>
               <p class='titrePost'>$row->titrePost</p></br>
              <p class='sujetPost'>$row->sujetPost</p></br> 
              <p class='datePost'>$row->date</p></a>
              </div>
              ";
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
</div>