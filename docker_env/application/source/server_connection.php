<?php
/* CONNEXION PDO PHP DATA OBJECT */

$host = "database";
$user = "root";
$pswd = "root";
$database = "mydb";

/* DATA SOURCE NAME (DSN) DE CONNECTION */

$dsn = "mysql:dbname=".$database.";host=".$host;

/* CONNEXION A LA BASE */

try{
    /* PDO */
	$conn = new PDO($dsn, $user, $pswd);;
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}


}catch(PDOException $e){
    die($e->getMessage());
}


?>