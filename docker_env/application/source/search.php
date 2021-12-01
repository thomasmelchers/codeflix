<?php 
include ('server_connection.php');
include('header.php');
include('navbar.php');
?>


<?php
	if($_GET['keyword']){ ?>
		<table class="table table-bordered">
			<?php
				$keyword = $_GET['keyword'];
				$query = $conn->prepare("SELECT * FROM tutolink WHERE auteur = '$keyword' OR langage = '$keyword'");
                $query->execute();
				?>
				<h1><?= $keyword ?></h1>
				<?php
				while($row = $query->fetch()){
			?>
			<tr>
				<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
			</tr>
        
		<?php
			}
		?>
<?php		
	}
?>
<?php 
	include('footer.php'); 
?>




	