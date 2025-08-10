<!--REGISTRATION PROCESS-->

<?php session_start();

//Connect database
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

//Prepare statement for inserting into database
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

//Execute data from 'post' on login.php registration form defined above
$stmt->execute([$_POST['name'], $_POST['email'], md5($_POST['password'])]);

//Create session with registered details
$_SESSION['user'] = $_POST['name'];

//Move user to account.php landing page
header("Location: ../webpages/account.php");

?>