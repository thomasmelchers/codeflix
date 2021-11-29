<?php
session_start();
if (!isset($_SESSION["utilisateur"])){
    header("Location: login.php");
    exit;
}
// Connexion à la base de données
include('server_connection.php');

// Inclure le header
include('header.php');

// Inclure la navbar
include('navbar.php'); 
?>


<h1 style="color: red;">NodeJs</h1>
<div class="container" id="slider1">
			<div class="slider">
			<?php
				$keyword = $_POST['keyword'];
				$query = $conn->prepare("SELECT * FROM `tutolink`");
				$query->execute();
				while($row = $query->fetch()){
			?>
			<div class="slider-item">
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
		</div>
		<?php } ?>
			</div>
	<div class="slider-btn">
				<a href="javascript::" class="arrow arrow-left">‹</a>
				<a href="javascript::" class="arrow arrow-right">›</a>
		</div>
	</div>
	<h1 style="color: red;">NodeJs</h1>
<div class="container" id="slider2">
			<div class="slider">
			<?php
				$query = $conn->prepare("SELECT * FROM `tutolink`");
				$query->execute();
				while($row = $query->fetch()){
			?>
			<div class="slider-item">
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
		</div>
		<?php } ?>
			</div>
	<div class="slider-btn">
				<a href="javascript::" class="arrow arrow-left">‹</a>
				<a href="javascript::" class="arrow arrow-right">›</a>
		</div>
	</div>

<?php 
// Inclure le footer
include "footer.php";
?>