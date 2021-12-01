<?php
session_start();
/* var_dump($_SESSION); */
$user_session = session_id();
/* echo '<pre>' ;
var_dump($_SESSION);
echo '</pre>' ; */
$user_id = $_SESSION['utilisateur']['user_id'];
/* $user_firstname = $_SESSION['utilisateur']['prenom'];
$user_name = $_SESSION['utilisateur']['nom']; */
/* echo $user_id . '<br>'; */
/* echo $user_firstname;
echo $user_name . '<br>'; */


include_once('server_connection.php');

/* RECUPERER LES VIDEOS */
    $videos = ("SELECT * FROM `tutolink`");
    $query = $conn->query($videos);
    $video = $query->fetchAll();

    $tuto;
    $id = $tuto;
    $n = $id - 1 ;

    $video_id = $video[$n]['video_id'];
    $video_show = $video[$n]['lien'];
    $video_titre = $video[$n]['titre'];

/* AJOUTER LES COMMENTAIRES A LA TABLE */

if(isset($_POST['submit_comment'])){
    if((isset($_POST['comment'])) && (!empty($_POST['comment']))){
        $comment = htmlspecialchars($_POST['comment']);
        $sql = "INSERT INTO `comments`(`comment_id`, `user_id`, `video_id`, `comment`) VALUES (NULL,'$user_id','$video_id','$comment')";
        $requete = $conn->query($sql);
        /* var_dump ($requete); */
    }
    else{
        $error = "You forgot to type your comment";
    }
}
if (isset($error)){
    echo "Error" . $error;
}

/* AFFICHAGES DES COMMENTAIRES & JOINTURE AVEC LA SESSION DE L'UTILISATEUR EN FONCTION DE LA VIDEO */

$sql = "SELECT `utilisateurs`.`prenom`, `utilisateurs`.`nom`, `comments`.`comment`, `comments`.`date`, `comments`.`video_id` FROM `comments`, `utilisateurs`, `tutolink` WHERE `utilisateurs`.`user_id` = `comments`.`user_id` AND `tutolink`.`video_id` = `comments`.`video_id` ORDER BY `comments`.`date` DESC";
$requete = $conn->query($sql);
$coms = $requete->fetchAll();

/* echo '<pre>';
print_r($coms); 
foreach($coms as $com){
    if($com['video_id'] === $video_id){
        echo $com['prenom'] . " " . $com['nom'] . '<br>';
        echo $com['video_id'] . '<br>';
        echo $com['comment'] . '<br>';
        echo '<br>';
    }
}
echo '</pre>'; */
?>

<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS -->
<link rel="stylesheet" href="./css/comment.css">

<?php /* include('header.php'); 
include('navbar.php') */?>


<div class="row justify-content-center bm" >
    <div class="col-12 col-md-10 col-lg-8 modal-content">
        <div class="close2">+</div>
        <h2><?= $video[$n]['titre']?></h2>
        <div id="tutoContainer">
            <iframe width="560" height="315" src="<?= $video[$n]['lien']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            LEAVE US A COMMENT: 
                        </button>
                    </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body justify-content-center">
                        <form action="" method="POST">
                            <!-- <label for="user">username</label>
                            <input type="text" name="user"> <br> -->
                            <!-- <textarea  placeholder="Leave us your feelings about this recording." rows="
                            8" cols="75"></textarea><br> -->
                            <div class="form-floating">
                                <textarea name="comment" class="form-control" placeholder="Leave us your feelings about this recording." id="floatingTextarea2" style="height: 100px"></textarea>
                                <label name="comment" for="floatingTextarea2"></label>
                            </div>
                            <br>
                            <input type="submit" name="submit_comment" value="Add my comment">
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ALL THE COMMENTS ABOUT THIS RECORDING:
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php 
                        foreach($coms as $com) :
                        if($com['video_id'] === $video_id) ?>
                        <div class="containerAccordion">
                            <div class="commentDiv">
                                <div class="commentInfo">
                                    <p>Author : <?= $com['prenom'] . " " . $com['nom'] ; ?></p>
                                    <p>Publish at <?= $com['date'] ; ?> </p>
                                    <p>video id : <?= $com['video_id'] ;?> </p>
                                </div>
                                <div class="comment">
                                    <p> <?= $com['comment'] ;?></p>
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

<?php /* include('footer.php');  */?>
<!-- script bundle for bootstrap -->
<script src="./js/comment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
