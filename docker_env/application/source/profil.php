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

$user_id = $_SESSION["utilisateur"]["id"];

// Récupérer les données utilisateur depuis la DB pour les afficher dans le form
$sql = "SELECT * FROM `utilisateurs` WHERE `user_id`= $user_id";
$statement = $conn->query($sql);

if ($statement) {
    $userData = $statement->fetchAll(PDO::FETCH_ASSOC);
    $prenom = $userData[0]["prenom"];
    $nom = $userData[0]["nom"];
    $username = $userData[0]["pseudo"];
    $email = $userData[0]["email"];


    if (!empty($_POST)) {
        $newUsername = $_POST["pseudo"];
        $newEmail = $_POST["email"];
        $newPrenom = $_POST["prenom"];
        $newNom = $_POST["nom"];

        //Requête sql pour update DB
        $sql2 = "UPDATE `utilisateurs` SET `pseudo`='$newUsername', `email`='$newEmail', `nom`='$newNom', `prenom`='$newPrenom' WHERE `user_id`= '$user_id'";

        $result = $conn->query($sql2);


        /* header("Location: /profil.php"); */
    }
}





?>



<!-- Form html -->
<div id="containerProfil">
    <div id="styleProfil">
        <h1 id="titreProfil">Profile of <?= $pseudo ?></h1>
        <div id="formulaireProfil">
            <form method="post">
                <div class="elForm">
                    <label for="prenom">Firstname</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
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
                    <button class="btn btn-outline my-2 my-sm-0 mx-2" style="color: red;" type="submit" name="submit" id="submit">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// Inclure le footer
include "footer.php";
?>