<?php 
include('header.php');
include('navbar.php');
?>
<body style="background-color: black;">


<h1 style="color: red; margin-top:20px;"> CodeFlix</h1>
  <p style="color: white; text-align: center;">
    Codeflix is a platform entirely dedicated to computer coding. <br> You will find tutorials, documentation, explanations, <br> EVERYTHING that will allow you to improve yourself and your skills.
  </p>
  <br>
	<h1 style="color: red;">Features : </h1>
<div class="container" id="slider2">
			<div class="slider">
			<?php
        include ('server_connection.php');
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
	<h1 style="color: red; margin-top:20px;"> About CodeFlix :  </h1>
  <p style="color: white; text-align: center;">
  We offer a completely free platform. <br> Of course, in the future, there will be a premium version <br> that will offer you much more content with some exercises after each tutorial. <br> Be patient, it will happen very soon!  </p>
  <br>

<?php 
// Inclure le footer
include "footer.php";
?>



    <?php require_once "script.php";?>  
</body>
