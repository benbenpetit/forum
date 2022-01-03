<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: http://localhost/forum/index.php');
} ?>

<section class="container">
    <form class="js-login-form">
        <input type="email" name="email" required placeholder="email">
        <input type="password" name="password" required placeholder="mot de passe">
        <input type="submit" name="submit" value="submit">
    </form>
</section>

<script src="./scripts/login.js"></script>

</main>
</body>
