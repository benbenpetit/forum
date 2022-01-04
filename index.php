<?php 
require 'head.php';
session_start(); 

if (isset($_SESSION['email'])) {
    require('posts.php');
}
?>

</main>
</body>
</html>