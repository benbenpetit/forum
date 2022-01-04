<<<<<<< HEAD
<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: http://localhost/forum/index.php');
} ?>

<section class="container">
    <div>
        <form class="js-signup-form">
            <input name="_id" type="text" placeholder="id">
=======
<?php require 'head.php' ?>

<main class="container">
    <div>
        <form method="post" action="">
            <!-- <input name="_id" type="text" placeholder="id"> -->
>>>>>>> 2d879b67ccd3f1816cca7736a07fc2cf3aa5a0d0
            <input name="firstName" type="text" placeholder="firstName">
            <input name="lastName" type="text" placeholder="lastName">
            <input name="pseudo" type="text" placeholder="pseudo">
            <input name="email" type="text" placeholder="email">
            <input name="age" type="text" placeholder="age">
            <input name="password" type="text" placeholder="password">
            <input type="submit" value="Save" name="submit">
        </form>
    </div>
<<<<<<< HEAD
</section>

<script src="./scripts/signup.js"></script>

</main>
</body>
=======

<?php

$client = new MongoDB\Client("mongodb://localhost:27017");
$aleatoire = rand(0, 200000);

if (isset($_POST['submit'])) {
    $_id = $aleatoire;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $pseudo = $_POST['pseudo'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $collection = $client->Forum->Users;
    //var_dump($collection);
    $result = $collection->insertOne([
        '_id' => $_id,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'pseudo' => $pseudo,
        'age' => $age,
        'password' => $password,
        'email' => $email,
    ]);
    echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
}

// try {

//     $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//     $query = new MongoDB\Driver\Query([]);
//     $rows = $mng->executeQuery("Forum.Users", $query);

//     foreach ($rows as $row) {

//         echo "_id :         $row->_id</br>
//               firstName :   $row->firstName</br> 
//               lastName :    $row->lastName</br> 
//               pseudo :      $row->pseudo</br> 
//               email :       $row->email</br>
//               age :         $row->age</br>
//               password :    $row->password</br></br> ";
//     }
// } catch (MongoDB\Driver\Exception\Exception $e) {

//     $filename = basename(__FILE__);

//     echo "The $filename script has experienced an error.\n";
//     echo "It failed with the following exception:\n";

//     echo "Exception:", $e->getMessage(), "\n";
//     echo "In file:", $e->getFile(), "\n";
//     echo "On line:", $e->getLine(), "\n";
// }
>>>>>>> 2d879b67ccd3f1816cca7736a07fc2cf3aa5a0d0
