<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: '. $_ENV['BASE_URL'] .'Views/index.php');
} ?>

<section class="o-container cardLogin">
    <form class="js-login-form">
        <h3>Connectez-vous</h3>
        <label for="email">Email</label>
        <input type="email" name="email" required placeholder="example@example.com">
        <label for="password">Votre mot de passe</label>
        <input type="password" name="password" required placeholder="mot de passe">
        <button>Connexion</button>
    </form>
</section>

<script src="./scripts/login.js"></script>

<!-- test -->

<!-- fin test -->

</main>
</body>
