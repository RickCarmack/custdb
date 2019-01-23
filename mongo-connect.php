<?php
$connection = new MongoClient( "mongodb://mongo:27017" );

$collection = $connection->selectCollection('test', 'users');
if (!$collection) {
        echo 'not connected to collection';
        exit;
}
echo 'Congratulations! You have connected to MongoDB!';
$cursor = $collection->find();
foreach ($cursor as $doc) {
    var_dump($doc);
}
