<!-- To display all the users of the DB - FOR TEST -->
<?php require 'vendor/autoload.php'; ?>

<body>
    <div>
        <form method="post" action="">
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
    <br />

    <div>
        <form action="login.php" method="post">
            <input type="text" name="email" required placeholder="email">
            <input type="password" name="password" required placeholder="mot de passe">
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
</body>

</html>

<?php

$client = new MongoDB\Client("mongodb://localhost:27017");

if (isset($_POST['submit'])) {
    $_id = $_POST['_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $pseudo = $_POST['pseudo'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $collection = $client->Forum->Users;
    //var_dump($collection);
    $result = $collection->insertOne([
        '_id' => $_id,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'pseudo' => $pseudo,
        'age' => $age,
        'password' => $password,
        'email' => $email,
    ]);
    echo "<br/>inserted with object id :" . $result->getInsertedId() . "<br/><br/>";
}

// https://docs.mongodb.com/manual/tutorial/install-mongodb-on-os-x/
// https://moodle-sciences.upmc.fr/moodle-2021/course/view.php?id=3427


// Insert manuel dans DB Forum ( local )
// $collection = (new MongoDB\Client)->Forum->Users;

// $insertOneResult = $collection->insertOne([
//     '_id' => '10',
//     'firstName' => 'Paul',
//     'lastName' => 'Marechal',
//     'pseudo' => 'Polo',
//     'email' => 'paulmarechal75@gmail.com',
//     'age' => '29',
//     'password' => 'root'
// ]);
// fin insert manuel 

//printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount(), "</br></br>");
//var_dump($insertOneResult->getInsertedId());

// Affichage des infos Users de la DB Forum ( local )
try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $mng->executeQuery("Forum.Users", $query);

    foreach ($rows as $row) {

        echo "_id :         $row->_id</br>
              firstName :   $row->firstName</br> 
              lastName :    $row->lastName</br> 
              pseudo :      $row->pseudo</br> 
              email :       $row->email</br>
              age :         $row->age</br>
              password :    $row->password</br></br> ";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}

?>

</main>
</body>
</html>