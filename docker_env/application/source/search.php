<?php 
include ('server_connection.php');
include('header.php');
include('navbar.php');
?>


<?php
    if($_GET['keyword']){ ?>
				<?php

					$keyword = $_GET['keyword'];
					$query = $conn->prepare("SELECT * FROM tutolink WHERE auteur = '$keyword' OR langage = '$keyword' OR titre = '$keyword'");
					$query->execute();
					?>
					
		<div class="row container-fluid">
			<div class="col-12 md-10 lg-8 justify-content-center">	
				<div class="row justify-content-center">
					<div class="col-10 md-8 lg-8 justify-content-center">
						<h1><?= $keyword ?></h1>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-10 md-8 lg-8 d-flex flex-wrap justify-content-center"> 
						<?php
						while($row = $query->fetch()){
						?> 
						<div class="card styleCard m-2" style="width: 18rem;">
							<div class="su-youtube su-responsive-media-yes p-1 pt-1"><iframe class="video" width="277px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe></div>
							<div class="card-body text-center">
								<h5 class="card-title" style="color: darkgoldenrod;"><?php echo htmlspecialchars($row['titre']); ?></h5>
								<p class="card-text"><?php echo htmlspecialchars($row['auteur']); ?></p>
								<a href="comments.php" class="btn btn-danger">Let's learn some <?php echo htmlspecialchars($row['langage']); ?></a>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
<?php        
    }
?>
<?php 
    include('footer.php'); 
?>

