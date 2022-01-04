<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: http://localhost:8888/sorbonne/PHP/forum/index.php');
} ?>

<section class="container cardLogin">
    <form class="js-login-form">
        <h3 id="connect">Connectez vous</h3>
        <h5 id="connect2">Connectez vous en utilisant votre mail et mot de passe</h5>
        <h6 class="textCard">Email</h6>
        <input type="email" name="email" required placeholder="example@example.com">
        <h6 class="textCard">Votre mot de passe</h6>
        <input type="password" name="password" required placeholder="mot de passe">
        <input class="btnCoLogin" type="submit" name="submit" value="Connexion">
    </form>
</section>


<script src="./scripts/login.js"></script>

<!-- test -->

<!-- fin test -->

</main>
</body>
