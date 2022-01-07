<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['try-signup']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['pseudo'])) {
    try {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $pseudo = $_POST['pseudo'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    
        $collection = $client->Forum->Users;
        $result = $collection->insertOne([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'pseudo' => $pseudo,
            'age' => $age,
            'password' => $password,
            'email' => $email,
        ]);
    } catch (MongoDB\Driver\Exception\Exception $e) {
        $filename = basename(__FILE__);
        echo 'not created';
    }
} else {
    echo 'not created';
}