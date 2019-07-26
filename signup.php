<?php session_start(); ?>
<?php include('connect.php'); ?>
<?php
  if (isset($_POST['signup']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')";

if ($con->query($sql) === TRUE) {
    header('location:login.php');
    $_SESSION["success_message"] = "Signup Sucessfull...Login in with your new credentials.";

    
} else {
    $database_error = "Error: ". $con->error;
}
    }
  ?>



<!DOCTYPE html>
<html>

    <head>
        <title>Log in</title>

        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/custom.css" />
    </head>

    <body>
          <div class="container">
      <div class="col-md-4 col-md-offset-4">
      <div class=" login-panel panel panel-info">

        <div class="panel-heading">
          <div class="text-center">Sign up</div>
      </div>
       <div class="panel-body">
      <form method="post" action="#">
      <div class="form-group">
      <label>Enter your new username</label>
      <input type="text" name="username" class="form-control" />
    <span class = "text-danger"></span>
      </div>
      <div class="form-group">
      <label>Enter your new password</label>
      <input type="password" name="password" class="form-control" />
      <span class = "text-danger"></span>
      </div>
      <div class="form-group">
      <input type="submit" name="signup" value = "Sign up" class="btn btn-lg btn-warning btn-block" /><br>Already a Member? <a href="login.php">Sign in</a><br>
      <div class = "text-danger"><?php echo $database_error; ?></div>
      <div class = "text-danger"></div>
       
      </div>
    </form>
  </div>
  </div>
</div>
</div>
    </body>

</html>
