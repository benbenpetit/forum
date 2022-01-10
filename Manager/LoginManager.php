<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

if (isset($_POST['try_login']) && !empty($_POST['email'] && !empty($_POST['password']))) {
    try {
        $manager = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&w=majority");

        $filter = ['email' => $_POST['email'], 'password' => $_POST['password']];
        $query = new MongoDB\Driver\Query($filter);

        $res = $manager->executeQuery("forum.Users", $query);

        // $firstName = $_SESSION['firstName'];
        // $lastName = $_SESSION['lastName'];
        // $email = $_SESSION['email'];
        // $id = $_SESSION['id'];
        // $pseudo = $_SESSION['pseudo'];
        // $age = $_SESSION['age'];

        $user = current($res->toArray());

        if (!empty($user->email)) {
            $_SESSION['id'] = $user->_id;
            $_SESSION['email'] = $user->email;
            $_SESSION['firstName'] = $user->firstName;
            $_SESSION['lastName'] = $user->lastName;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['age'] = $user->age;
            echo $user->pseudo;

        } else {
            // $bulk = new MongoDB\Driver\BulkWrite;
            // $bulk->insert(['firstName' => $prenom, 'lastName' => $nom, 'email' => $email, 'password' => $password, 'date' => date("d/m/Y, h:i:s")]);
            // $manager->executeBulkWrite('forum.Users', $bulk);
            echo 'empty';
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
    echo 'not logged in';
}