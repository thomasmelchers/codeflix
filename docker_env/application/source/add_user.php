<?php
/* 
1. Créer le formulaire
2. Une fois inscrit, rediriger l'utilisateur vers sa page de profil 
*/
// On démarre la session PHP
session_start();
// Pour empêcher d'aller sur la page inscription si déjà connecté : 
if (isset($_SESSION["utilisateur"])){
    header("Location: profil.php");
    exit;
}

// on verifie si le formulaire a été envoyé
if (!empty($_POST)) {
    // var_dump($_POST);
    // Le formulaire a été envoyé
    // On verifie que TOUS les champs requis sont remplis
    if (
        isset($_POST["prenom"], $_POST["nom"], $_POST["pseudo"], $_POST["email"], $_POST["password"])
        && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"])
    ) {
        // Le formulaire est complet
        // Récupérer les données et les protéger (pour éviter le XSS) 
        $_SESSION["error"] = []; // créer un espace erreur dans la session

        $prenom = strip_tags(($_POST["prenom"])); // strip_tags enlève les balises HTML et PHP d'une chaine de caractères
        $nom = strip_tags(($_POST["nom"]));
        $pseudo = strip_tags(($_POST["pseudo"]));
        if (strlen($pseudo) < 5) {
            $_SESSION["error"][] = "Le pseudo est trop court";
        }
        $email = strip_tags(($_POST["email"]));


        // Vérifier que l'email renseigné est bien un email
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"][] = "L'adresse email est incorrecte";
        }

        if ($_SESSION["error"] === []) {


            // Hasher le mot de passe : le transformer en chaine de caractères qui n'est pas déchiffrable
            $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
            /*
        die($pass); // pour voir à quoi ressemble le mdp crypté
        */

            // Ajouter ici d'autres contrôles si besoin (double email, double mot de passe, force du mot de passe, ...)

            // enregistrer en base de données
            require_once "server_connection.php";

            $sql = "INSERT INTO `utilisateurs`(`prenom`, `nom`, `pseudo`, `email`, `password`) VALUES (:prenom, :nom, :pseudo, :email, '$pass')";

            // préparer la requête
            $query = $db->prepare($sql);
            // créer des bindValue -> connecter des variables PHP à leur paramètre SQL
            $query->bindValue(":prenom", $_POST["prenom"], PDO::PARAM_STR);
            $query->bindValue(":nom", $_POST["nom"], PDO::PARAM_STR);
            $query->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

            $query->execute();
        }

        // Récupérer l'id du nouvel utilisateur
        $id = $db->lastInsertId();


        // Connecter l'utilisateur 
        

        // On stocke dans $_SESSION les informations de l'utilisateur
        $_SESSION["utilisateur"] = [
            "id" => $id,
            "pseudo" => $pseudo,
            "email" => $_POST["email"],
            //"roles" => ["ROLE_USER"]
        ];

        // On peut rediriger vers la page de profil
       header("Location: profil.php");

    } else {
        $_SESSION["error"] = ["Le formulaire est incomplet"];
    }
}
?>

<h1>Inscription</h1>
<?php
// Pour afficher les erreurs 
if (isset($_SESSION["error"])) {
    foreach ($_SESSION["error"] as $message) {
        ?>
    <p><?= $message ?></p>
        <?php
    }
    // Une fois qu'une erreur a été affichée, il faut l'effacer
    unset($_SESSION["error"]);
}
?>

<!-- Form html -->
<form method="post">
    <div>
        <label for="prenom">Votre prénom</label>
        <input type="text" name="prenom" id="prenom">
    </div>
    <div>
        <label for="nom">Votre nom</label>
        <input type="text" name="nom" id="nom">
    </div>
    <div>
        <label for="pseudo">Votre pseudo</label>
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