<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: '. $_ENV['BASE_URL'] .'Views/index.php');
}

if (isset($_GET['signedup'])) {
    header('Location: '. $_ENV['BASE_URL'] .'Views/login.php');
} ?>

 <main class="container cardLogin">
     <div>
         <form class="js-signup-form">
            <h3 id="connect">Inscrivez vous</h3>
            <h5 id="connect2">Inscrivez vous en renseignant l'ensemble des champs suivants</h5>
            <h6 class="textCard">Prénom</h6>
             <input class="inputInscription" required name="firstname" type="text" placeholder="Prénom">
             <h6 class="textCard">Nom</h6>
             <input class="inputInscription" required name="lastname" type="text" placeholder="Nom">
             <h6 class="textCard">Pseudo</h6>
             <input class="inputInscription" required name="pseudo" type="text" placeholder="Pseudo">
             <h6 class="textCard">Email</h6>
             <input class="inputInscription" required name="email" type="text" placeholder="example@example.com">
             <h6 class="textCard">Age</h6>
             <input class="inputInscription" required name="age" type="text" placeholder="Age">
             <h6 class="textCard">Mot de passe</h6>
             <input class="inputInscription" required name="password" type="password" placeholder="Mot de passe">
             <input class="btnCoSign" type="submit" value="Inscription" name="submit">
         </form>
     </div>

     <script src="./scripts/signup.js"></script>

</main>
</body>
</html>