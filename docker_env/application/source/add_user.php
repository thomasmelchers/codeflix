<?php
/* 
1. Créer le formulaire
2. Une fois inscrit, rediriger l'utilisateur vers sa page de profil 
*/
// On démarre la session PHP
/* session_start(); */
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
            $query = $conn->prepare($sql);
            // créer des bindValue -> connecter des variables PHP à leur paramètre SQL
            $query->bindValue(":prenom", $_POST["prenom"], PDO::PARAM_STR);
            $query->bindValue(":nom", $_POST["nom"], PDO::PARAM_STR);
            $query->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

            $query->execute();
        }

        // Récupérer l'id du nouvel utilisateur
        $id = $conn->lastInsertId();


        // Connecter l'utilisateur 
        

        // On stocke dans $_SESSION les informations de l'utilisateur
        $_SESSION["utilisateur"] = [
            "id" => $id,
            "prenom" => $prenom,
            "nom" => $nom,
            "pseudo" => $pseudo,
            "email" => $_POST["email"],
            //"roles" => ["ROLE_USER"]
        ];

        // On peut rediriger vers la page de profil
       header("Location: index.php");

    } else {
        $_SESSION["error"] = ["Le formulaire est incomplet"];
    }
}

// inclure header
/* include "header.php"; */

// inclure navbar
/* include "navbar.php"; */
?>


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

<link rel="stylesheet" href="./css/addUser.css">
<!-- <link rel="stylesheet" href="./css/add_user.css"> -->

<!-- Form html -->
<div class="popUpForm">
    <div class="contenu">
        <div class="close1">+</div>
        <h1>Registration</h1>
        <div class="formulaire">
            <form method="post">
                <div class="elementForm">
                    <label for="prenom">Firstname</label>
                    <input type="text" name="prenom" placeholder="Aaron" id="prenom">
                </div>
                <div class="elementForm">
                    <label for="nom">Lastname</label>
                    <input type="text" name="nom" placeholder="Swartz" id="nom">
                </div>
                <div class="elementForm">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" placeholder="Swartzy" id="pseudo">
                </div>
                <div class="elementForm">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="aaron.swartz@gmail.com" id="email">
                </div>
                <div class="elementForm">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="elementForm">
                    <button class="buttonUser" type="submit" name="submit" id="submit">Subscription</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./js/add_user.js"></script>
<?php
// Inclure le footer
/* include "footer.php"; */
?>