<?php session_start();

if (isset($_POST['submit'])) {
    try {
        $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $filter = ['email' => $_POST['email'], 'password' => $_POST['password']];
        $query = new MongoDB\Driver\Query($filter);

        $res = $mng->executeQuery("Forum.Users", $query);

        $user = current($res->toArray());

        if (!empty($user)) {
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {
        $filename = basename(__FILE__);

        echo "The $filename script has experienced an error.\n";
        echo "It failed with the following exception:\n";

        echo "Exception:", $e->getMessage(), "\n";
        echo "In file:", $e->getFile(), "\n";
        echo "On line:", $e->getLine(), "\n";
    }
}

if (isset($_SESSION['email'])) {
    echo '<h1>Vous êtes connecté en tant que '.$_SESSION['email'].' '.$_SESSION['password'].'</h1>';
    ?>
    <div>
        <form action="create_post.php" method="post">
            <input type="text" name="titrePost" required placeholder="Titre">
            <input type="text" name="sujetPost" required placeholder="De quoi on parle? ">
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
    <?php


} else {
    echo '<h1>Va te faire connecter.</h1>';
}