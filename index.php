<?php

require 'vendor/autoload.php';

try {
    $client = new MongoDB\Client(
        'mongodb+srv://benoit:benoit@cluster0.ptqrq.mongodb.net/'
    );

    $collection = $client->selectCollection("forum", "users");

    $insertOneResult = $collection->insertOne([
        'username' => 'admin',
        'email' => 'admin@example.com',
        'name' => 'Admin User',
    ]);

    printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

    var_dump($insertOneResult->getInsertedId());
} catch (\Throwable $th) {
    throw $th;
}
