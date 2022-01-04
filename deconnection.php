<?php 
session_start();
session_unset('email');
session_destroy();

header('Location: http://localhost:8888/sorbonne/PHP/forum/');

?>