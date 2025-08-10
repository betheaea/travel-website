<!--LOGIN PROCESS-->

<?php
//Start session to set cookie
session_start();

//Connect database
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

//Collect data from user 'post' input in login.php file
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

//Prepare and execute statement for finding 'post' data in the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, md5($password)]);

//Fetch data for logged in user
$user = $stmt->fetch();

//Ensure all details match
if ($user) {
  $_SESSION['user'] = $user['name'];

  //When confirmed move to account.php landing page
  header("Location: ../webpages/account.php");

} else {
  //If not matched show login error
  $_SESSION['login_error'] = "Invalid email or password.";

  //Keep user on login page if login fails
  header("Location: ../webpages/login.php");
}

?>