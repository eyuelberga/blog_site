<?php session_start(); ?>
<?php include('connect.php'); ?>
<?php
  if (isset($_POST['login']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $query    = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' and password = '$password'");
            
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
      
      if ($num_row > 0){
            $_SESSION["username"]=$row['username'];
            header('location:blog_admin.php');
          
        }
      else
        {
          $error='Invalid Username and Password Combination';
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
      <div class=" login-panel panel panel-success">

        <div class="panel-heading">
          <div class="text-center">Please Login</div>
          <b class="text-success"><?php echo $_SESSION["success_message"];?></b>
      </div>
       <div class="panel-body">
      <form method="post" action="#">
      <div class="form-group">
      <label>Enter Username</label>
      <input type="text" name="username" class="form-control" />
    <span class = "text-danger"></span>
      </div>
      <div class="form-group">
      <label>Enter Password</label>
      <input type="password" name="password" class="form-control" />
      <span class = "text-danger"></span>
      </div>
      <div class="form-group">
      <input type="submit" name="login" value = "Login" class="btn btn-lg btn-success btn-block" /><br>Not a Member? <a href="signup.php">Sign up</a><br>
      <div class = "text-danger"><?php echo $database_error; ?></div>
      <div class = "text-danger"><?php if(isset($_SESSION["error"])){
       echo $_SESSION["error"]; session_unset(); session_destroy();} ?></div>
      
      <span class = "text-danger"><?php echo $error; ?></span>
       
      </div>
    </form>
  </div>
  </div>
</div>
</div>
    </body>

</html>
