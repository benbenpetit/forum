<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
try {
    $dotenv->load();
} catch (InvalidPathException $e) {
    // Do nothing. Production environments rarely use .env files.
}