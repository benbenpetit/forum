<?php session_start();
require 'vendor/autoload.php';

if (isset($_GET['id'])) {
    var_dump($_SESSION);
    if ($_GET['id'] != '') {
        try {
            $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
            $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
            $query = new MongoDB\Driver\Query($filter);

            var_dump($_GET['id']);
    
            $res = $mng->executeQuery("Forum.Posts", $query);
            
            $post = current($res->toArray());

            if (!empty($post)) {
                echo "<a href='http://localhost:8888/forum/posts.php'>Retour bahaha</a>";
                echo "<div>id post : $post->_id</br>
                        titre post : $post->titrePost</br>
                        sujet post : $post->sujetPost</br> 
                        date : $post->date</div></br></br>";
                echo '<form class="js-submit-comment" action="submit_comment.php" method="post">
                        <label for="">commentaire</label>
                        <input type="text" name="comment">
                        <input type="submit" value="submit">
                    </form>';
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
        header("Location: localhost/forum/posts.php");
    }
}