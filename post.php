<?php require_once 'head.php'; 

if (isset($_GET['id'])) {
    $oid = $_SESSION["id"];

    // var_dump($_SESSION);
    // var_dump("id submit a ajouter : " .$_id);
    if ($_GET['id'] != '') {
        try {
            $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
            $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
            $query = new MongoDB\Driver\Query($filter);

            // var_dump($_SESSION);
            
            $res = $mng->executeQuery("Forum.Posts", $query);
            
            $post = current($res->toArray());

            if (!empty($post)) {
                echo "<a href='". $_ENV['BASE_URL'] ."posts.php'>Retour bahaha</a>";
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
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            $filename = basename(__FILE__);
    
            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";
    
            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
        }

        try {
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $filter  = ['_post_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
            $option = [];
            $read = new MongoDB\Driver\Query($filter, $option);
            $messages = $manager->executeQuery('Forum.Messages', $read);

            foreach ($messages as $message) {
                echo $message;
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
