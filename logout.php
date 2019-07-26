<?php include('connect.php'); ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
mysqli_close($con);
header('location:index.php');
?>
</body>
</html>