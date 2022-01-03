<?php session_start();

if (isset($_POST['try_signup'])) {
    $client = new MongoDB\Client("mongodb://localhost:27017");

    $_id = $_POST['_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $pseudo = $_POST['pseudo'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $collection = $client->Forum->Users;
    $result = $collection->insertOne([
        '_id' => $_id,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'pseudo' => $pseudo,
        'age' => $age,
        'password' => $password,
        'email' => $email,
    ]);

    echo '<signedup></signedup>
}