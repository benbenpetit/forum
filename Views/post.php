<?php require_once('head.php'); 

echo '<section class="o-container">';
echo '<div class="post-section">';

if (isset($_GET['id'])) {
    if ($_GET['id'] != '') {
        try {
            $mng = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
    
            $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
            $query = new MongoDB\Driver\Query($filter);
            
            $res = $mng->executeQuery("Forum.Posts", $query);
            
            $post = current($res->toArray());

            if (!empty($post)) {
                echo "<a class='retour' href='posts.php'>< Retour</a>";
                echo "<div>";
                echo "<div class='cardSujet'>
                        <span class='pseudo'><span class='pseudo__icon'>👤</span> ". ($post->_pseudo) . "</span>
                        <span class='date'>  - " . strftime('%d %B %G à %H:%M:%S', strtotime($post->date)) . "</span>
                        <h3 class='titrePost'>$post->titrePost</h3>
                        <p class='sujetPost'>$post->sujetPost</p>
                    </div>";
                
                if (isset($_SESSION['email'])) {
                    echo '<form class="js-submit-comment inputPost">
                            <h3>Écrire un commentaire</h3>
                            <textarea rows="3" class="inputText" name="message"></textarea>
                            <input class="submitButton" type="submit" value="Envoyer">
                            <input type="hidden" name="_post_id" value="'. $post->_id .'">
                        </form>';
                } else {
                    echo "<div class='cardSujet' style='margin-top: 20px'>
                        <h4 style='margin-top: 0' class='titrePost'>Se connecter pour converser</h4>
                    </div>";
                }
            } else {
                header("Location: ". $_ENV['BASE_URL'] ."Views/posts.php");
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
    
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
    
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";

            header("Location: ". $_ENV['BASE_URL'] ."Views/posts.php");
        }

        try {
            $manager = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
            $filter  = ['_post_id' => $_GET['id']];
            $option = ['sort' => ['date' => 1]];
            $read = new MongoDB\Driver\Query($filter, $option);
            $messages = $manager->executeQuery('Forum.Messages', $read);
            
            echo '<div class="messages">';
            if (!$messages->isDead()) {
                echo '<h2>Réponses</h2>';
            }

            foreach ($messages as $message) {
                $date = new DateTime($message->date);
                setlocale(LC_TIME, "fr_FR", "French");

                echo '<div class="messagesPost">';
                    echo '<span class="pseudo"><span class="pseudo__icon">👤</span> '. ($message->_pseudo) . '</span>';
                    echo '<span class="date">  - ' . strftime("%d %B %G à %H:%M:%S", strtotime($message->date)) . '</span>';
                    echo '<p class="message"> '. ($message->message) . '</p>';
                echo '</div>';
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
        header("Location: ". $_ENV['BASE_URL'] ."Views/posts.php");
    }
} else {
    header("Location: ". $_ENV['BASE_URL'] ."Views/posts.php");
}
?>

</div>
</section>
</main>
<script src="./scripts/submitComment.js" async defer></script>
</body>
</html>