<?php session_start();
require_once('../vendor/autoload.php'); require_once('../config.php');

if (isset($_POST['try_login']) && !empty($_POST['email'] && !empty($_POST['password']))) {
    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/forum?authSource=admin&replicaSet=atlas-144ubf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");

        $filter = ['email' => $_POST['email'], 'password' => $_POST['password']];
        $query = new MongoDB\Driver\Query($filter);

        $res = $mng->executeQuery("Forum.Users", $query);

        $user = current($res->toArray());

        if (!empty($user->email)) {
            $_SESSION['id'] = $user->_id;
            $_SESSION['email'] = $user->email;
            $_SESSION['firstName'] = $user->firstName;
            $_SESSION['lastName'] = $user->lastName;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['age'] = $user->age;
            echo $user->email;
        } else {
            echo 'not found';
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {
        $filename = basename(__FILE__);
        echo 'not logged in';
    }
} else {
    echo 'not logged in';
}