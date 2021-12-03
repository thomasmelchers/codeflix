<?php
// session start au tout début
session_start();
$pseudo = $_SESSION["utilisateur"]["pseudo"];
$title = "profil of " . $pseudo;

// Inclure le header
include "header.php";

// Inclure la navbar
include "navbar.php";
value?>

<link rel="stylesheet" href="./css/profil.css">
<!-- <link rel="stylesheet" href="./css/add_user.css"> -->

<!-- Form html -->
<div id="containerProfil">
    <div id="styleProfil">   
        <h1 id="titreProfil">Profil of <?= $_SESSION["utilisateur"]["pseudo"] ?></h1>     
        <div id="formulaireProfil">
            <form method="post">
                <div class="elForm">
                    <label for="prenom">Firstname</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $_SESSION["utilisateur"]["prenom"] ?>" >
                </div>
                <div class="elForm">
                    <label for="nom">Lastname</label>
                    <input type="text" name="nom" id="nom" value="<?= $_SESSION["utilisateur"]["nom"] ?>">
                </div>
                <div class="elForm">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION["utilisateur"]["pseudo"] ?>">
                </div>
                <div class="elForm">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= $_SESSION["utilisateur"]["email"] ?>">
                </div>
                <div class="elForm">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?= $_SESSION["utilisateur"]["password"] ?>">
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