<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<h2>Account Page</h2>

<!--CHECK FOR USER SESSION-->
<?php

function GetOfferByID($pdo, $id){
  $stmt = $pdo->prepare("SELECT * FROM offers WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

function GetHotelByID($pdo, $id){
  $stmt = $pdo->prepare("SELECT * FROM hotels WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

function GetFlightByID($pdo, $id){
  $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

if (!empty($_SESSION['user'])) {
  echo "<p>Welcome, " . $_SESSION['user'] . "!</p>";

  //Connect database
  $pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');
  //Prepare SQL statement for user data
  $stmt = $pdo->prepare("SELECT id FROM users WHERE name = ?");
  //Execute SQl statement for user data
  $stmt->execute([$_SESSION['user']]);
  //Fetch current executed row for user data
  $user = $stmt->fetch();
}

//was just $user - note in case of future errors
if (!empty($_SESSION['user'])) {
    $stmt = $pdo->prepare("SELECT type, item_id, booked_at FROM bookings WHERE user_id = ? ORDER BY booked_at desc");
    $stmt->execute([$user['id']]);
    $bookings = $stmt->fetchAll();

    //Display fetched bookings
    if ($bookings) {
      echo "<h3>Your Bookings</h3><ul>";
      echo "<h4>Listed from oldest to newest.</h4>";
      foreach ($bookings as $bookingItem) { 

        //Checks if item passed is for the 'offer' type
        if ($bookingItem['type'] === 'offer'){
          $offer = GetOfferByID($pdo, $bookingItem['item_id']);
          //Display offers in account
          echo "<strong>PACKAGE: </strong> {$offer['title']} - ({$offer['type']}), {$offer['destination']}
          <br>[{$offer['start_date']} to {$offer['end_date']}]<br><br>";

        } else if ($bookingItem['type'] === "hotel"){
          $hotel = GetHotelByID($pdo, $bookingItem['item_id']);
          //Display hotels in account
          echo "<strong>HOTEL: </strong> {$hotel['name']} - ({$hotel['company']}), {$hotel['country']}
          <br>[{$hotel['start_date']} to {$hotel['end_date']}]<br><br>";

        } else if ($bookingItem['type'] === "flight"){
          $flight = GetFlightByID($pdo, $bookingItem['item_id']);
          //Display flights in account
          echo  "<strong>FLIGHT: </strong> {$flight['name']} - ({$flight['company']}), {$flight['country']}
         <br>[{$flight['start_date']} to {$flight['end_date']}]<br><br>";
        }
      }   
      echo "</ul>";

    //State if no bookings found
    } else {
      echo "<p>No bookings yet.</p>";
    } 
  //Require login if no user session detected
  } else {
  echo "<p>Please log in to view your account.</p>";
}


?>

<!--Include the footer.php file to apply the footer content-->
<?php include 'footer.php'; ?>