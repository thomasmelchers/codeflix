<?php
include('server_connection.php');
include('header.php');

?>

<body>
<?php include('navbar.php'); ?>

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
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php require_once "script.php";?>
	
</html>