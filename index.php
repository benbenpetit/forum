<?php require 'head.php'; ?>

<main class="container">

<?php

try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Users", $query);

    foreach ($rows as $row) {

        echo "_id :         $row->_id</br>
              firstName :   $row->firstName</br> 
              lastName :    $row->lastName</br> 
              pseudo :      $row->pseudo</br> 
              email :       $row->email</br>
              age :         $row->age</br>
              password :    $row->password</br></br> ";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}

if (isset($_SESSION['email'])) {
    echo 
    `<div>
        <form action="create_post.php" method="post">
            <input type="text" name="titrePost" required placeholder="Titre">
            <input type="text" name="sujetPost" required placeholder="De quoi on parle? ">
            <input type="submit" name="submit" value="submit">
        </form>
    </div>`;
}
?>

</main>
</body>
</html>