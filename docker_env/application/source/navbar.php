<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" style="color: red;" href="index.php">CODEFLIX</a>
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
        </div>
    </nav>
</header>