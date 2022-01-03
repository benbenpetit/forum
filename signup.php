<?php require_once('head.php');

if (isset($_SESSION['email'])) {
    header('Location: http://localhost/forum/index.php');
} ?>

<section class="container">
    <div>
        <form class="js-signup-form">
            <input name="_id" type="text" placeholder="id">
            <input name="firstName" type="text" placeholder="firstName">
            <input name="lastName" type="text" placeholder="lastName">
            <input name="pseudo" type="text" placeholder="pseudo">
            <input name="email" type="text" placeholder="email">
            <input name="age" type="text" placeholder="age">
            <input name="password" type="text" placeholder="password">
            <input type="submit" value="Save" name="submit">
        </form>
    </div>
</section>

<script src="./scripts/signup.js"></script>

</main>
</body>
