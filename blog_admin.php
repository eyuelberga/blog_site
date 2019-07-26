
<?php include('connect.php');
session_start();

if(!isset($_SESSION["username"])){
  $_SESSION["error"] = "You must be Logged in !";
  header('location:login.php');
}


$session_username = $_SESSION["username"];
$query = mysqli_query($con, "SELECT * FROM blogs WHERE username='$session_username'");
$admin_blog_stack = array();
while($row = mysqli_fetch_assoc($query)) {
    //values from db
    $title = $row['title'];
    $body = $row['body'];
    $username = $row['username'];
    $date_added = $row['date_added'];
    $id = $row['id'];

    $blog_row = "<div class='panel panel-default'>
                        <div class='panel-heading'><h2>$title</h2><h4 class='text-muted'>Written By: $username</h4></div>
                        <div class='panel-body'>$body</div>
                         <div class='panel-footer'>
                         <form method='post' action='?id=$id'>
                         <div class= col-lg-12'>
      <span><p class='text-muted col-lg-6'>Date Added: $date_added</p></span>
      <input type='submit' name='delete' value = 'Delete' class='btn btn-sm btn-danger ' /></form>
      
      </div>



                         </div>
                      </div>
";
    array_push($admin_blog_stack,$blog_row); 

}
?>

<?php

if (isset($_POST['post_blog'])){

  $title = $_POST['title'];
  $body = $_POST['body'];

  $sql = "INSERT INTO `blogs`(`title`, `body`, `username`) VALUES ('$title','$body','$session_username')";

if ($con->query($sql) === TRUE) {
    header('location:blog_admin.php');
    $_SESSION["success_message"] = '['.$session_username.']'." Latest Action: ".$title. " has been posted successfully!";

    
} else {
    $database_error = "Error: " . $sql . "<br>" . $con->error;
}
}





?>
<?php
if(isset($_GET["id"])){
$delete_query = mysqli_query($con, "DELETE FROM blogs WHERE id='{$_GET['id']}'");
if($delete_query){
  header('location:blog_admin.php');
 $_SESSION["success_message"] = '['.$session_username.']'." Latest Action: blog has been deleted successfully!";
}
else{
$database_error = "Error: Item not deleted ";
}
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Blog Admin</title>

        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet"  type="text/css" href ="public/vendor/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/custom.css" />
    </head>
    <body>
      <div id="wrapper">

              <!-- Navigation -->
              <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                  <div class="navbar-header">
                    <h3><?php echo $session_username?>'s Blog</h3>
                  </div>
                  <!-- /.navbar-header -->
                  <div class="navbar-default sidebar" role="navigation">
                      <div class="sidebar-nav navbar-collapse">
                          <ul class="nav" id="side-menu">
                              <li>
                                  <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                              </li>



                       </ul>

                  </div>
              </div>
                  <!-- /.navbar-static-side -->
              </nav>
              <div id="page-wrapper">
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header">Blog managment for <?php echo $session_username;?></h1>
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <div class = "text-danger"><?php echo $database_error; ?></div>
                  <span class = "text-success  "><?php echo $_SESSION["success_message"];?></span>
                  </div>
<div class="row">
  <h3 class="text-center page-header col-lg-12">Add a new Blog Post</h3>
  <form method="post">
    
    <div class="form-group col-lg-6">
      <label>Title</label>
      <input type="text" name="title" class="form-control" />
    </div>

    <div class="form-group col-lg-12">
  <label for="body">Body:</label>
  <textarea  name="body" class="form-control" rows="15" id="body"></textarea>
</div>
<div class="form-group col-lg-12">
      <input type="submit" name="post_blog" value = "Post" class="btn btn-lg btn-success " /></div>

  </form>
</div>


        

<div class="row">
  <h3 class="text-center page-header col-lg-12">Previous Blog Posts</h3>
<div class="col-lg-12">
  <?php
        for($x = count($admin_blog_stack); $x > -1; $x--){
          echo $admin_blog_stack[$x];
        }
                  ?></div>
         </div>

                  </div>
        </div>
          <!-- /#wrapper --> 
          <script type="text/javascript" src="public/vendor/jquery/jquery.min.js">
          </script>
          <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.js">
            
          </script>
  </body>

</html>
