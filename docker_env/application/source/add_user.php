<?php 
/* 
1. Créer le formulaire
2. Une fois inscrit, rediriger l'utilisateur vers sa page de profil 
    
*/
// on verifie si le formulaire a été envoyé
if(!empty($_POST)) {
    // var_dump($_POST);
    // Le formulaire a été envoyé
    // On verifie que TOUS les champs requis sont remplis
    if(isset($_POST["email"], $_POST["mot_de_passe"])
        && !empty($_POST["email"]) && !empty($_POST["mot_de_passe"])
    ){
        // Le formulaire est complet
        // Récupérer les données et les protéger (pour éviter le XSS)
        $prenom = strip_tags(($_POST["prenom"]));
        $nom = strip_tags(($_POST["nom"]));
        $email = strip_tags(($_POST["email"])); // strip_tags enlève les balises HTML et PHP d'une chaine de caractères

        // Vérifier que l'email renseigné est bien un email
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          die("L'adresse email est incorrecte");  
        }

        // Hasher le mot de passe : le transformer en chaine de caractères qui n'est pas déchiffrable
        $pass = password_hash($_POST["mot_de_passe"], PASSWORD_ARGON2ID);
        /*
        die($pass); // pour voir à quoi ressemble le mdp crypté
        */

        // Ajouter ici d'autres contrôles si besoin (double email, double mot de passe, ...)

        // enregistrer en base de données
        require_once "server_connection.php";

        $sql = "INSERT INTO `utilisateur`(`prenom`, `nom`, `email`, `mot_de_passe`) VALUES (:prenom, :nom, :email, '$pass')";

        // préparer la requête
        $query = $db->prepare($sql);
        // créer des bindValue -> connecter des variables PHP à leur paramètre SQL
        $query->bindValue(":prenom", $_POST["prenom"], PDO::PARAM_STR);
        $query->bindValue(":nom", $_POST["nom"], PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        // Connecter l'utilisateur 

    }else{
        die("Le formulaire est incomplet");
    }


}


?>

<h1>Inscription</h1>

<form method="post">
    <div>
        <label for="prénom">Votre prénom</label>
        <input type="text" name="prenom" id="prenom">
    </div>
    <div>
        <label for="nom">Votre nom</label>
        <input type="text" name="nom" id="nom">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe">
    </div>
    <button type="submit">Je m'inscris !</button>

</form>

