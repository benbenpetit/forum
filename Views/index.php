<?php require_once('head.php');

echo '<section class="o-container">';

if (isset($_SESSION['email'])) {
    require_once('create_post.php');
}

try {
    $mng = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
    $query = new MongoDB\Driver\Query([], ['limit' => 12]);
    $rows = $mng->executeQuery("Forum.Posts", $query);

    echo '<div class="postsGrid">';
    setlocale(LC_TIME, "fr_FR", "French");
    
    foreach ($rows as $row) {
        echo "<div class='postCard'>
                <a href='". $_ENV['BASE_URL'] ."Views/post.php?id=".$row->_id."'>
                    <h3 class='titrePost'>$row->titrePost</h3>
                    <p class='sujetPost'>$row->sujetPost</p>
                    <span class='datePost'>Le ".strftime("%d %B %G à %H:%M:%S", strtotime($row->date))."</span>
                </a>
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

</section>
</main>
</body>
</html>