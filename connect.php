<?php
$con = mysqli_connect("localhost","root","abc123","blog");

//check connection
if(mysqli_connect_errno()){
  $database_error = "Failed to Connect to MySQL";
}
?>