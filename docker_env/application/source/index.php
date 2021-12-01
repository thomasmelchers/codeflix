<?php
session_start();
// if (!isset($_SESSION["utilisateur"])){
//     header("Location: login.php");
//     exit;
// }
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
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
		</div>
		<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left">‹</a>
		<a href="javascript::" class="arrow arrow-right">›</a>
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
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
		</div>
	<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left">‹</a>
		<a href="javascript::" class="arrow arrow-right">›</a>
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
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
		</div>
		<?php } ?>
	</div>
	<div class="slider-btn">
		<a href="javascript::" class="arrow arrow-left">‹</a>
		<a href="javascript::" class="arrow arrow-right">›</a>
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
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien'])?>></iframe>
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
include('footer.php');
?>