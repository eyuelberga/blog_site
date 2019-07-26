<?php include('connect.php'); ?>
<?php
$query = mysqli_query($con, "SELECT * FROM blogs");
$blog_stack = array();
while($row = mysqli_fetch_assoc($query)) {
    //values from db
    $title = $row['title'];
    $body = $row['body'];
    $username = $row['username'];
    $date_added = $row['date_added'];

    $blog_row = "<div class='panel panel-default'>
                        <div class='panel-heading'><h2>$title</h2><h4 class='text-muted'>Written By: $username</h4></div>
                        <div class='panel-body'>$body</div>
                         <div class='panel-footer'><span><p class='text-muted'>Date Added: $date_added</p></span></div>
                      </div>
";
    array_push($blog_stack,$blog_row); 

}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Blogs</title>

        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet"  type="text/css" href ="public/vendor/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet"  type="text/css" href ="public/vendor/bootstrap/css/custom.css" />
    </head>
    <body>
      <div id="wrapper">

              <!-- Navigation -->
              <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                  <div class="navbar-header">
                    <h3>Blogs</h3>
                  </div>
                  <!-- /.navbar-header -->
                  <div class="navbar-default sidebar" role="navigation">
                      <div class="sidebar-nav navbar-collapse">
                          <ul class="nav" id="side-menu">
                              <li>
                                  <a href="login.php"><i class="fa fa-sign-in fa-fw"></i>Sign in</a>
                              </li>



                       </ul>

                  </div>
              </div>
                  <!-- /.navbar-static-side -->
              </nav>
              <div id="page-wrapper">
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header">Blog Posts</h1>
                          <div class = "text-danger"><?php echo $database_error; ?></div>
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>

                  <?php
        for($x = count($blog_stack); $x > -1; $x--){
          echo $blog_stack[$x];
        }
                  ?>

                  </div>
        </div>
          <!-- /#wrapper --> 
  </body>

</html>
