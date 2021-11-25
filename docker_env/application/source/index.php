<?php
include('server_connection.php');

$sql = "SELECT * FROM `tutolink`";
		$requete = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="description">
	<script src="https://kit.fontawesome.com/8e9298d105.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="style.css">
	<title>Codeflix - Accueil</title>
<body style="background-color: black;">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
				<a class="navbar-brand" style="color: red;" href="#">CODEFLIX</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="#" style="color: white;">Tutos <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" style="color: white;" href="#">Documentation</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Langage
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#">HTML</a>
								<a class="dropdown-item" href="#">CSS</a>
								<a class="dropdown-item" href="#">JavaScript</a>
								<a class="dropdown-item" href="#">PHP</a>
							</div>
						</li>
					</ul>
				</div>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search"" aria-label="Search">
						<button class="btn my-2 my-sm-0" type="submit" style="color: red;">Search</button>
						<button class="btn ml-2" type="submit" style="color: red;">Profil</button>
				</form>
				</div>
		</nav>
		</header>
	
	<h1 style="color: red;">NodeJs</h1>
	<div class="container" id="slider1">
		<div class="slider">
		<?php while($row = $requete->fetch(PDO::FETCH_ASSOC)) : ?>
			<div class="slider-item">
				<iframe width="300px" src=<?php echo htmlspecialchars($row['lien']); ?>></iframe>
			</div>
		<?php endwhile; ?>
		</div>
		<div class="slider-btn">
				<a href="javascript::" class="arrow arrow-left">‹</a>
				<a href="javascript::" class="arrow arrow-right">›</a>
		</div>
	</div>

	<!-- FOOTER -->

	<?php include('footer.php'); ?>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<?php require_once "script.php";?>
</html>
