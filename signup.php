




<?php require 'head.php';


if (isset($_SESSION['email'])) {
    header('Location: http://localhost:8888/sorbonne/PHP/forum/index.php');
} ?>

 <main class="container">
     <div>
         <form method="post" action="">
             <input name="firstName" type="text" placeholder="firstName">
             <input name="lastName" type="text" placeholder="lastName">
             <input name="pseudo" type="text" placeholder="pseudo">
             <input name="email" type="text" placeholder="email">
             <input name="age" type="text" placeholder="age">
             <input name="password" type="text" placeholder="password">
             <input type="submit" value="Save" name="submit">
         </form>
     </div>

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

 