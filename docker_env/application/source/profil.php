<?php
// session start au tout début
session_start();

// Inclure le header

// Inclure la navbar
?>

<h1>Profil de <?= $_SESSION["utilisateur"]["pseudo"] ?></h1>

<p>Pseudo : <?= $_SESSION["utilisateur"]["pseudo"] ?> </p>
<p>Email : <?= $_SESSION["utilisateur"]["email"] ?></p>

<?php
// Inclure le footer
?>