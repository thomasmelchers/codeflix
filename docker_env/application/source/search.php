<?php 
include ('server_connection.php');
include('header.php');
include('navbar.php');
?>

<<<<<<< HEAD

=======
>>>>>>> 38a08a19b714f8e8ab192e76d876fbf0b69818eb
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
<<<<<<< HEAD
			<tr>
				<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
			</tr>
        
		<?php
=======
			<tr style="text-align:center;">
			
			<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
				</tr>
        <?php
>>>>>>> 38a08a19b714f8e8ab192e76d876fbf0b69818eb
			}
		?>
<?php		
	}
?>
<?php 
	include('footer.php'); 
?>




	