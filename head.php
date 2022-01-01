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
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li>-</li>
                    <li><a href=""><?php echo($_SESSION['email'])?></a></li>
                    <li>-</li>
                    <li><a href="deconnection.php">logout</a></li>
                </ul>
            </nav>
        </header>