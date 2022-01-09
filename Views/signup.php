<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: '. $_ENV['BASE_URL'] .'Views/index.php');
}

if (isset($_GET['signedup'])) {
    header('Location: '. $_ENV['BASE_URL'] .'Views/login.php');
} ?>

 <main class="o-container cardLogin">
     <div>
         <form class="js-signup-form">
            <h3>Inscrivez-vous</h3>
            <label for="firstname">Prénom</label>
            <input required name="firstname" type="text" placeholder="Prénom">
            <label for="lastname">Nom</label>
            <input required name="lastname" type="text" placeholder="Nom">
            <label for="pseudo">Pseudo</label>
            <input required name="pseudo" type="text" placeholder="Pseudo">
            <label for="email">Email</label>
            <input required name="email" type="text" placeholder="example@example.com">
            <label for="age">Age</label>
            <input required name="age" type="text" placeholder="Age">
            <label for="password">Mot de passe</label>
            <input required name="password" type="password" placeholder="Mot de passe">
            <button>Inscription</button>
         </form>
     </div>

     <script src="./scripts/signup.js"></script>

</main>
</body>
</html>