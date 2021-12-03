<?php
// session start au tout début
session_start();
$pseudo = $_SESSION["utilisateur"]["pseudo"];
$title = "profile of " . $pseudo;

/* echo "<pre>"."<br>";
var_dump($_SESSION["utilisateur"]);
echo "</pre>"."<br>"; */

// Inclure le header
include "header.php";

// Inclure la navbar
include "navbar.php";

?>

<?php
// Connxion à la DB
require_once "server_connection.php";

if (!empty($_POST)) {
    $user_id=$_SESSION["utilisateur"]["id"];
    $username= $_POST["pseudo"];
    $email= $_POST["email"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];
    

    $sql="UPDATE `utilisateurs` SET `pseudo`='$username', `email`='$email', `nom`='$nom', `prenom`='$prenom' WHERE `user_id`= '$user_id'";
    
    $result =$conn->query($sql);

    $username= $_POST["pseudo"];
    $email= $_POST["email"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];

    /* header("Refresh:0"); */
}  

?>

<link rel="stylesheet" href="./css/profil.css">
<!-- <link rel="stylesheet" href="./css/add_user.css"> -->

<!-- Form html -->
<div id="containerProfil">
    <div id="styleProfil">   
        <h1 id="titreProfil">Profile of <?= $_SESSION["utilisateur"]["pseudo"] ?></h1>     
        <div id="formulaireProfil">
            <form method="post">
                <div class="elForm">
                    <label for="prenom">Firstname</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>" >
                </div>
                <div class="elForm">
                    <label for="nom">Lastname</label>
                    <input type="text" name="nom" id="nom" value="<?= $nom ?>">
                </div>
                <div class="elForm">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?= $username ?>">
                </div>
                <div class="elForm">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= $email ?>">
                </div>
                <div id="buttonProfil">
                    <button class="btn btn-outline my-2 my-sm-0 mx-2"  style="color: red;" type="submit" name="submit" id="submit">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// Inclure le footer
include "footer.php";
?>