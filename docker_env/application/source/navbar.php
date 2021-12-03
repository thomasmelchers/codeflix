<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<?php if (!isset($_SESSION["utilisateur"])) :?>
  <a class="navbar-brand" style="color: red;" href="index.php">
    <?php else :?>
  <a class="navbar-brand" style="color: red;" href="home.php">
       <?php endif;?> CodeFlix</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (isset($_SESSION["utilisateur"])) : ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color: white;" href="#">Tutos <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
            Langage
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="search.php?keyword=HTML&search=">HTML</a>
            <a class="dropdown-item" href="search.php?keyword=CSS&search=">CSS</a>
            <a class="dropdown-item" href="search.php?keyword=JavaScript&search=">JavaScript</a>
            <a class="dropdown-item" href="search.php?keyword=PHP&search=">PHP</a>
          </div>
        </li>
      </ul>
    <?php endif; ?>
    <form method="GET" action="search.php">
      <div class="form-inline">

        <?php if (!isset($_SESSION["utilisateur"])) : ?>
          <button class="btn btn-outline my-2 my-sm-0 mx-2 login" style="color: red;"><a href="login.php"> Login</a> </button>
          <button class="btn btn-outline my-2 my-sm-0 addUser" style="color: red;"><a href="add_user.php"> Register </a></button>
        <?php else : ?>
          <input type="text" class="form-control mx-2" name="keyword" placeholder="Search here..." required="required" />
          <button class="btn btn" name="search" style="color:red;">Search</button>
          <button class="btn btn-outline my-2 my-sm-0 mx-2" type="submit" style="color: red;"> <a href="user_log_out.php"> Logout</a></button>
          <button class="btn btn-outline my-2 my-sm-0 mx-2" type="submit" style="color: red;"> <a href="profil.php"> Profil</a></button>
        <?php endif; ?>
      </div>
    </form>
    <?php //include"login.php" ; 
    ?>
    <?php //include"add_user.php" ; 
    ?>
  </div>
</nav>