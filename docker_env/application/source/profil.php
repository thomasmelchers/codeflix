<?php
// session start au tout début
session_start();

// Inclure le header
include "header.php";

// Inclure la navbar
include "navbar.php";
?>

<h1>Profil de <?= $_SESSION["utilisateur"]["pseudo"] ?></h1>

<form method="post">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
    </div>
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">Je m'inscris !</button>
</form>



<p>Pseudo : <?= $_SESSION["utilisateur"]["pseudo"] ?> </p>
<p>Email : <?= $_SESSION["utilisateur"]["email"] ?></p>

<?php
// Inclure le footer
include "footer.php";
?>