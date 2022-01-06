<?php 
session_start();
session_destroy();
require_once('vendor/autoload.php');
require_once('config.php');
header('Location: '. $_ENV['BASE_URL']);

?>