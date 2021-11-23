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
    $db = new PDO ($dsn, $user, $pswd);
    echo "La connexion avec le serveur a été établie ! <'br'>";
    
    /* Tous les échanges de données en UTF8 */
    $db->exec("SET NAMES utf8");

}catch(PDOException $e){
    die($e->getMessage());
}
?>