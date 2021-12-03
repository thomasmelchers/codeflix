<?php
session_start();
/* var_dump($_SESSION); */
$user_session = session_id();
/* echo $user_sesion ;

echo $user_id . "<br>"; */
/* $user_firstname = $_SESSION['utilisateur']['prenom'];
$user_name = $_SESSION['utilisateur']['nom']; */
/* echo $user_id . '<br>'; */
/* echo $user_firstname;
echo $user_name . '<br>'; */


include_once('server_connection.php');

/* RECUPERER LES VIDEOS */

    /* echo "vidId = " . $_GET["vidId"]; */

    $id = $_GET['vidId'];

    /* echo $n; */

    $videos = ("SELECT * FROM `tutolink` WHERE `video_id` =:video_id ");
    $query = $conn->prepare($videos);
    $query->bindValue(":video_id", $id, PDO::PARAM_INT);
    $query->execute();
    $video = $query->fetchAll();

   /*  echo '<pre>' ;
    var_dump($video);
    echo '</pre>' ; */

    $video_id = $video[0]['video_id'];
    $video_show = $video[0]['lien'];
    $video_titre = $video[0]['titre'];


/* AJOUTER LES COMMENTAIRES A LA TABLE */

/* echo '<pre>' ;
var_dump($_SESSION);
echo '</pre>' ; */
$user_id = $_SESSION['utilisateur']['id'];

if(isset($_POST['submit_comment'])){
    if((isset($_POST['comment'])) && (!empty($_POST['comment']))){
        $comment = htmlspecialchars($_POST['comment']);
        $sql = "INSERT INTO `comments`(`comment_id`, `user_id`, `video_id`, `comment`) VALUES (NULL, :user_id, :video_id, :comment)";
        $query = $conn->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":video_id", $id, PDO::PARAM_INT);
        $query->bindValue(":comment", $comment, PDO::PARAM_STR);
        $query->execute();
    }
    else{
        $error = "You forgot to type your comment";
    }
}
if (isset($error)){
    echo "Error" . $error;
}

/* AFFICHAGES DES COMMENTAIRES & JOINTURE AVEC LA SESSION DE L'UTILISATEUR EN FONCTION DE LA VIDEO */

$sql = "SELECT `utilisateurs`.`prenom`, `utilisateurs`.`nom`, `comments`.`comment`, `comments`.`date`, `comments`.`video_id` FROM `comments`, `utilisateurs`, `tutolink` WHERE `utilisateurs`.`user_id` = `comments`.`user_id` AND `tutolink`.`video_id` = `comments`.`video_id` ANd `comments`.`video_id` = $id ORDER BY `comments`.`date` DESC";
$requete = $conn->query($sql);
$coms = $requete->fetchAll();
?>

<!-- CSS Bootstrap -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 --><!-- CSS -->

<?php include('header.php'); 
include('navbar.php')?>

<div class="container">
<div class="row justify-content-center" >
    <div class="col-12 col-md-10 col-lg-8 commentStyle mt-5 mb-3">
        <div class="close"> <a href="./home.php" id="lienIndex">+</a> </div>
        <h2 id="titreVideo"><?= $video[0]['titre']?></h2>
        <h3 id="titreAuteur"><?= $video[0]['auteur']?></h3>
        
        <div id="videoContainer">
            <iframe width="650" height="365" src="<?= $video[0]['lien']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        <div class="accordion" id="accordionExample">
            <div class="accordion-item" class="accItem">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed collapseStyle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            LEAVE US A COMMENT: 
                        </button>
                    </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body justify-content-center">
                        <form action="" method="POST">
                            <div class="form-floating">
                                <textarea name="comment" class="form-control" placeholder="Leave us your feelings about this recording." id="floatingTextarea2" style="height: 100px"></textarea>
                                <label name="comment" for="floatingTextarea2"></label>
                            </div>
                            <br>
                            <div id="buttonComment">
                                <input class="btn btn-outline my-2 my-sm-0 mx-2" style="color: red;" type="submit" name="submit_comment" value="Add my comment" id="submit">
                            </div>
                            <!-- <input type="submit" name="submit_comment" value="Add my comment"> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item" class="accItem">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed collapseStyle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo ">
                        ALL THE COMMENTS ABOUT THIS RECORDING:
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php 

                         /* echo '<pre>' ;
                            var_dump($coms);
                            echo '</pre>' ; */
                        foreach($coms as $com) :
                        if($com['video_id'] === $id) ?>
                        <div class="containerAccordion">
                            <div class="commentDiv">
                                <div id="commentInfo">
                                    <p class="titreComment">Author: <?= $com['prenom'] . " " . $com['nom'] ; ?> </p>
                                    <p class="titreComment">Publish at <?= $com['date'] ; ?> </p>
                                </div>
                                <div >
                                    <p class="comment"> <?= $com['comment'] ;?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>
<!-- script bundle for bootstrap -->
<script src="./js/comment.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 -->