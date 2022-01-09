<?php require_once('head.php');

echo '<div class="articles">';
if (isset($_SESSION['email'])) {
    require_once('create_post.php');
}

try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Posts", $query);


    echo '<div class="cardPostsIndex">';
    
    foreach ($rows as $row) {
        echo "<div class='cardPosts cardPostsIndex'>
                <a style='text-decoration:none; color:#000' display: inline-block;' href='". $_ENV['BASE_URL'] ."Views/post.php?id=".$row->_id."'></br>
                <p class='titrePost'>$row->titrePost</p></br>
                <p class='sujetPost'>$row->sujetPost</p></br> 
                <p class='datePost'>$row->date</p></a>
              </div>";
    }
    
    echo '</div></div>';
    
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}
    ?>
</main>
</body>
</html>