<html>
<head>
</head>
<body>
<form name="frmSearch" method="POST" action="test.php">
  <table>
    <tr>
      <th>Keyword
      <input name="q" type="text" id="var1">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>

<?php
$host = "database";
$user = "root";
$pswd = "root";
$database = "mydb";

/* DATA SOURCE NAME (DSN) DE CONNECTION */

$dsn = "mysql:dbname=".$database.";host=".$host;

/* CONNEXION A LA BASE */

try{
    /* PDO */
	$conn = new PDO($dsn, $user, $pswd);
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}


}catch(PDOException $e){
    die($e->getMessage());
}




$stmt = $conn->prepare("SELECT * FROM `tutolink` WHERE auteur='".$keyword."''");
$stmt->bindValue(':search', '%' . $q . '%', PDO::PARAM_INT);
$stmt->execute();

/* Fetch all of the remaining rows in the result set */



 $result = $stmt->fetchAll();

foreach( $result as $row ) {
    echo $row["id"];
    echo $row["lien"];
}




?>

</body>
</html>
