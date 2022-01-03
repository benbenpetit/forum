<?php session_start(); require 'vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="./styles/style.css" rel="stylesheet"></link>
    <title>Forum</title>
</head>
<body>
    <main>
        <header>
            <nav class="container">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php
                        if (!isset($_SESSION['email'])) {
                            echo '<li><a href="http://localhost/forum/login.php">Connexion</a><a href="http://localhost/forum/signup.php">Inscription</a></li>';
                        } else {
                            echo '<li><a href="http://localhost/forum/login.php">'. $_SESSION['email'] .'</a><a href="http://localhost/forum/deconnection.php">Déconnexion</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </header>