<?php 
$server = 'database';
$user = 'root';
$pass = 'root';
$db = 'mydb';

try {
    //
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Successfully connected to the database: ".$db;
} catch (PDOException $e){
    //
    echo "Connection failed: ", $e->getMessage();
}


?>