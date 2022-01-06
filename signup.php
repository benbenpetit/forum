




<?php require 'head.php';


if (isset($_SESSION['email'])) {
    header('Location: '. $_ENV['BASE_URL']);
} ?>

 <main class="container cardLogin">
     <div>
         <form method="post" action="">
            <h3 id="connect">Inscrivez vous</h3>
            <h5 id="connect2">Inscrivez vous en renseignant l'ensemble des champs suivants</h5>
            <h6 class="textCard">Prénom</h6>
             <input class="inputInscription" name="firstName" type="text" placeholder="Prénom">
             <h6 class="textCard">Nom</h6>
             <input class="inputInscription" name="lastName" type="text" placeholder="Nom">
             <h6 class="textCard">Pseudo</h6>
             <input class="inputInscription" name="pseudo" type="text" placeholder="Pseudo">
             <h6 class="textCard">Email</h6>
             <input class="inputInscription" name="email" type="text" placeholder="example@example.com">
             <h6 class="textCard">Age</h6>
             <input class="inputInscription" name="age" type="text" placeholder="Age">
             <h6 class="textCard">Mot de passe</h6>
             <input class="inputInscription" name="password" type="text" placeholder="Mot de passe">
             <input class="btnCoSign" type="submit" value="Inscription" name="submit">
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
    //  echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
 }

 