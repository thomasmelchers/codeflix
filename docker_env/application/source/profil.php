<?php
// session start au tout début
session_start();

// Inclure le header
include "header.php";

// Inclure la navbar
include "navbar.php";
?>

<link rel="stylesheet" href="./css/addUser.css">
<!-- <link rel="stylesheet" href="./css/add_user.css"> -->

<!-- Form html -->
        <h1>Profil de <?= $_SESSION["utilisateur"]["pseudo"] ?></h1>
        <div class="formulaire">
            <form method="post">
                <div>
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="<?= $_SESSION["utilisateur"]["prenom"] ?>" >
                </div>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="<?= $_SESSION["utilisateur"]["nom"] ?>">
                </div>
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="<?= $_SESSION["utilisateur"]["pseudo"] ?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="<?= $_SESSION["utilisateur"]["email"] ?>">
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="<?= $_SESSION["utilisateur"]["password"] ?>">
                </div>
                <button class="btn" type="submit" name="submit" id="submit">Mettre à jour</button>
            </form>
        </div>
<?php
// Inclure le footer
include "footer.php";
?>