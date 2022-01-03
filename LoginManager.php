<?php session_start();

if (isset($_POST['try_login'])) {
    try {
        $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $filter = ['email' => $_POST['email'], 'password' => $_POST['password']];
        $query = new MongoDB\Driver\Query($filter);

        $res = $mng->executeQuery("Forum.Users", $query);

        $user = current($res->toArray());

        if (!empty($user->email)) {
            $_SESSION['id'] = $user->_id;
            $_SESSION['email'] = $user->email;
            echo $user->email;
        } else {
            echo 'not found';
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {
        $filename = basename(__FILE__);
    }
}