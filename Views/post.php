<?php require_once('head.php'); 

if (isset($_GET['id'])) {
    $oid = $_SESSION["id"];

    if ($_GET['id'] != '') {
        try {
            $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
            $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
            $query = new MongoDB\Driver\Query($filter);

            // var_dump($_SESSION);
            
            $res = $mng->executeQuery("Forum.Posts", $query);
            
            $post = current($res->toArray());

            if (!empty($post)) {
                echo "<a href='posts.php'>Retour bahaha</a>";
                echo "<div>
                        id post : $post->_id</br>
                        titre post : $post->titrePost</br>
                        sujet post : $post->sujetPost</br> 
                        date : $post->date</div></br></br>";
                echo '<form class="js-submit-comment">
                        <label for="">Message</label>
                        <input type="text" name="message">
                        <input type="submit" value="submit">
                        <input type="hidden" name="_post_id" value="'. $post->_id .'">
                    </form>';
            } else {
                header("Location: posts.php");
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
    
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
    
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";

            header("Location: ". $_ENV['BASE_URL'] ."posts.php");
        }

        try {
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $filter  = ['_post_id' => $_GET['id']];
            $option = ['sort' => ['date' => 1]];
            $read = new MongoDB\Driver\Query($filter, $option);
            $messages = $manager->executeQuery('Forum.Messages', $read);

            foreach ($messages as $message) {
                $date = new DateTime($message->date);
                setlocale(LC_TIME, "fr_FR", "French");
                echo strftime("%d %B %G à %H:%M:%S", strtotime($message->date));
                echo '<br/>';
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
    
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
    
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
        }
    } else {
        header("Location: ". $_ENV['BASE_URL'] ."posts.php");
    }
}
?>

<script src="./scripts/submitComment.js" async defer></script>

</main>
</body>
</html>