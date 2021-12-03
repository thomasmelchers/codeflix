<?php
require 'maildatabase.php';
include 'mailfunctions.php';

if(isset($_POST['reset_link'])){

        $email = $_POST['email'];
        // Check if in the database
        $query = $pdo->prepare("SELECT email FROM utilisateurs where email = ?");
        $query->execute([$email]);
        $row = $query->rowCount();
    
        if($row == 1){
            // existing user, proceed with reset password
    
            // generate a random code
            $code = generateRandomString();
    
            // Formulate the link
            $link = 'href="http://localhost/reset_password.php?email='.$email.'&code='.$code.'"';
            
            $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" '.$link.' > Link </a></span>';
    
            //echo $code, $link; 
    
            $query_exist =  $pdo->prepare("SELECT * FROM reset where email = ?");
            $query_exist->execute([$email]);
            $from_reset = $query_exist->fetch();
    
            if(empty($from_reset)){
                // Save code and INSERT email in a database
                $query_insert = $pdo->prepare("INSERT INTO reset(email, code) VALUES (?, ?)");
                $query_insert->execute([$email, $code]);
            } else {
                // Already exist reseting attempt, switch to UPDATE the reset table instead
                $query_insert = $pdo->prepare("UPDATE reset SET code = ? WHERE email = ?");
                $query_insert->execute([$code, $email]);
            }
    
            // SEND EMAIL WITH THE LINK

            include 'testmail.php';

            // Notification
            $msg = '<h4 class="text-success">Please check your email (including spam) to see the password reset link.</h4>';
    
        } else {
            $error = "Email does not exist!";
        }
    
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Reset Password</title>
  </head>
  <body>
    

<!-- Log in Form & Reset -->
    <div class="container">
        <h4 class="text-center mt-5" style="color: white">Forgot your password? Input your registration email!</h4>
        <?php if(isset($msg)){echo $msg;}?>
        <?php if(isset($error)){echo $error;}?>

        <form action="check_email.php" method="post">
            <input type="text" name="email" placeholder="Your email..." class="form-control">
            <input type="submit" name="reset_link" value="Send Reset Link" class="btn btn-danger form-control mt-2">

        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>