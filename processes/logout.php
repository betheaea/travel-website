<!--DESTROY LOGGED IN SESSION-->

<!--Call for active session before destroying to prevent failure-->
<?php session_start(); session_destroy(); 

//Move logged out user back to login page
header("Location: ../webpages/login.php"); 

?>