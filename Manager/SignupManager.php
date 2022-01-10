<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$manager = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&retryWrites=true&w=majority");

if (isset($_POST['try-signup']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['pseudo'])) {
    try {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $pseudo = $_POST['pseudo'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    
        // $collection = $client->forum->Users;
        // $result = $collection->insertOne([
        //     'firstName' => $firstName,
        //     'lastName' => $lastName,
        //     'pseudo' => $pseudo,
        //     'age' => $age,
        //     'password' => $password,
        //     'email' => $email,
        // ]);
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['firstName' => $prenom,'age' => $age,'pseudo' => $pseudo, 'lastName' => $nom, 'email' => $email, 'password' => $password, 'date' => date("d/m/Y, h:i:s")]);
        $manager->executeBulkWrite('forum.Users', $bulk);

    } catch (MongoDB\Driver\Exception\Exception $e) {
        $filename = basename(__FILE__);

        echo "The $filename script has experienced an error.\n";
        echo "It failed with the following exception:\n";
    
        echo "Exception:", $e->getMessage(), "\n";
        echo "In file:", $e->getFile(), "\n";
        echo "On line:", $e->getLine(), "\n";
    }
} else {
    echo 'not created';
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['firstName' => $prenom, 'lastName' => $nom, 'email' => $email, 'password' => $password, 'date' => date("d/m/Y, h:i:s")]);
    $manager->executeBulkWrite('forum.Users', $bulk);
}