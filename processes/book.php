<!--BOOKING PROCESS FEATURE-->

<!--Include required class-->
<?php include "BasketItem.php";

session_start();

//Require user login before booking if no session set
if (!isset($_SESSION['user'])) {

  //Move user to login.php to start session and allow booking
  header("Location: ../webpages/login.php");
  exit;
}

//Connect database
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

// Prepare statement for user data to fetch from database
$stmt = $pdo->prepare("SELECT id FROM users WHERE name = ?");
$stmt->execute([$_SESSION['user']]);

//Fetch user data from the database (for later offer ID association)
$user = $stmt->fetch();

//Confirm session and basket value
if ($user && !empty($_SESSION['basket'])) {
  foreach ($_SESSION['basket'] as $item) {
    $basketItem = json_decode($item);
    //Prepare and execute statement into SQL database to associate user booking with ID
    $insert = $pdo->prepare("INSERT INTO bookings (user_id, item_id, type) VALUES (?, ?, ?)");
    $insert->execute([$user['id'], $basketItem->id, $basketItem->type]);
  }

  //Remove basket items after booking
  unset($_SESSION['basket']);
}
//Move user back to account.php to see confirm/view completed booking
header("Location: ../webpages/account.php");

?>