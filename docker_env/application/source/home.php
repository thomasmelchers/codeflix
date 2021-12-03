<?php
session_start();
 if (!isset($_SESSION["utilisateur"])){
    header("Location: index.php");
     exit;
}

include('server_connection.php');
include('header.php');
include('navbar.php');
?>

<h1 style="color: red; margin-top:20px;">HTML</h1>

<div class="container" id="slider1">
	<div class="slider">
		<?php
			$keyword = $_POST['keyword'];
			$query = $conn->prepare("SELECT * FROM `tutolink` WHERE langage = 'HTML'");
			$query->execute();
			while($row = $query->fetch()){

		?>
		<div class="slider-item">
			<div class="card styleCard" style="width: 18rem;">
				<div class="su-youtube su-responsive-media-yes p-1 pt-1"><iframe class="video" width="277px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe></div>
  				<div class="card-body text-center">
					<h5 class="card-title" style="color: darkgoldenrod;"><?php echo htmlspecialchars($row['titre']); ?></h5>
					<p class="card-text"><?php echo htmlspecialchars($row['auteur']); ?></p>
					<form action="comments.php" method="get">
					<button class="btn btn-danger"><a class="buttonCard" href="comments.php?vidId= <?= $row['video_id'] ; ?>">Let's learn some <?php echo htmlspecialchars($row['langage']);/*  echo $vidId ; */?></a></button>
					</form>
  				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left" style="color: darkred;">‹</a>
		<a href="javascript::" class="arrow arrow-right" style="color: darkred;">›</a>
	</div>
</div>
	
<h1 style="color: red; margin-top:20px;">CSS</h1>
<div class="container" id="slider2">
	<div class="slider">
	<?php
		$query = $conn->prepare("SELECT * FROM `tutolink` WHERE langage = 'CSS'");
		$query->execute();
		while($row = $query->fetch()){
	?>
		<div class="slider-item">
			<div class="card styleCard" style="width: 18rem;">
			<div class="su-youtube su-responsive-media-yes p-1 pt-1"><iframe class="video" width="277px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe></div>
  				<div class="card-body text-center">
					<h5 class="card-title" style="color: darkgoldenrod;"><?php echo htmlspecialchars($row['titre']); ?></h5>
					<p class="card-text"><?php echo htmlspecialchars($row['auteur']); ?></p>
					<form action="comments.php" method="get">
					<button class="btn btn-danger"><a class="buttonCard" href="comments.php?vidId= <?= $row['video_id'] ; ?>">Let's learn some <?php echo htmlspecialchars($row['langage']);?></a></button>
					</form>				
  				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left" style="color: darkred;">‹</a>
		<a href="javascript::" class="arrow arrow-right" style="color: darkred;">›</a>
	</div>
</div>
	
<h1 style="color: red; margin-top:20px;">JavaScript</h1>
<div class="container" id="slider3">
	<div class="slider">
		<?php
			$query = $conn->prepare("SELECT * FROM `tutolink` WHERE langage = 'JavaScript'");
			$query->execute();
			while($row = $query->fetch()){
		?>
		<div class="slider-item">
			<div class="card styleCard" style="width: 18rem;">
			<div class="su-youtube su-responsive-media-yes p-1 pt-1"><iframe class="video" width="277px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe></div>
  				<div class="card-body text-center">
					<h5 class="card-title" style="color: darkgoldenrod;"><?php echo htmlspecialchars($row['titre']); ?></h5>
					<p class="card-text"><?php echo htmlspecialchars($row['auteur']); ?></p>
					<form action="comments.php" method="get">
					<button class="btn btn-danger"><a class="buttonCard" href="comments.php?vidId= <?= $row['video_id'] ; ?>">Let's learn some <?php echo htmlspecialchars($row['langage']);?></a></button>
					</form>				
  				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left" style="color: darkred;">‹</a>
		<a href="javascript::" class="arrow arrow-right" style="color: darkred;">›</a>
	</div>
</div>
	
<h1 style="color: red; margin-top:20px;">PHP</h1>
<div class="container" id="slider4">
	<div class="slider">
		<?php
			$query = $conn->prepare("SELECT * FROM `tutolink` WHERE langage = 'PHP'");
			$query->execute();
			while($row = $query->fetch()){
		?>
		<div class="slider-item">
			<div class="card styleCard" style="width: 18rem;">
			<div class="su-youtube su-responsive-media-yes p-1 pt-1"><iframe class="video" width="277px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe></div>
  				<div class="card-body text-center">
					<h5 class="card-title" style="color: darkgoldenrod;"><?php echo htmlspecialchars($row['titre']); ?></h5>
					<p class="card-text"><?php echo htmlspecialchars($row['auteur']); ?></p>
					<form action="comments.php" method="get">
					<button class="btn btn-danger"><a class="buttonCard" href="comments.php?vidId= <?= $row['video_id'] ; ?>">Let's learn some <?php echo htmlspecialchars($row['langage']);?></a></button>
					</form>				
  				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left" style="color: darkred;">‹</a>
		<a href="javascript::" class="arrow arrow-right" style="color: darkred;">›</a>
	</div>
</div>

<?php 
// Inclure le footer
include('footer.php');
?>