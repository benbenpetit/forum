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
                echo "<a class='retour' href='posts.php'><</a>";
                echo "<div class='cardSujet'>
                        <p class='titre'>$post->titrePost</p></br>
                        <p class='sujet'>$post->sujetPost</p></br> 
                        <p class='date'>$post->date<p></div></br></br>";
                echo '<form class="js-submit-comment inputPost">
                        <input class="inputText" type="text" name="message">
                        <input class="submitButton" type="submit" value=">">
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

            echo '<div class="messages">';
            foreach ($messages as $message) {
                $date = new DateTime($message->date);
                setlocale(LC_TIME, "fr_FR", "French");
                echo '<div class="messagesPost">';
                echo '<p class="pseudoUser">👤 '. ($message->_pseudo) . '</p>';
                echo '<br/>';
                echo '<p> '. ($message->message) . '</p>';
                echo '<p class="dateMessage"> ' . strftime("%d %B %G à %H:%M:%S", strtotime($message->date)) . '</p>';
                echo '</br>';
                echo '</div>';
                echo '</br>';
            }
            echo "</div>";
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