<?php include ("server_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Search Bar Using PDO</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-8">
            <form method="GET
            " action="search.php">
				<div class="form-inline">
					<input type="text" class="form-control" name="keyword" placeholder="Search here..." required="required"/>
					<button class="btn btn-success" name="search">Search</button>
				</div>
			</form>
            
            <?php
	if($_GET['keyword']){ ?>
	<table class="table table-bordered">
			<?php
				$keyword = $_GET['keyword'];
				$query = $conn->prepare("SELECT * FROM tutolink WHERE auteur = '$keyword'");
                $query->execute();
				while($row = $query->fetch()){
			?>
			<tr>
				<td><?php echo $row['lien']?></td>
            </tr>
        <?php
			}
		?>
<?php		
	}
?>



	