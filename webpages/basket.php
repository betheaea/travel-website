<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<h2>Your Basket</h2>

<!--Include BasketItem.php to add required class-->
<?php include "../processes/BasketItem.php";

//Function to prepare response for each different type of data that could be passed into the basket
//Allow for the different datatypes/columns used across the offers, hotels, and flights tables
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

//Connect database and capture basket session
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');
$basket = $_SESSION['basket'] ?? [];

//State empty basket if no added items
if (empty($basket)) {
  echo "<p>Your basket is empty.</p>";

} else {
  //Display empty by default so this can be updated as items are added
  $total = 0;
  echo "<ul>";

  foreach ($basket as $item) { 
    $basketItem = json_decode($item);
    //Run only for 'offer' data to ensure data is passed without error
    if ($basketItem->type === 'offer'){
      //Run function declared at the start of the file
      $offer = GetOfferByID($pdo, $basketItem->id);
      //Amend price to include the price set for the associated item ID
      $total += $offer['price'];
      //Display offers in basket
      echo "<strong>PACKAGE: </strong> {$offer['title']} - ({$offer['type']}), {$offer['destination']}, £{$offer['price']}
      <br>[{$offer['start_date']} to {$offer['end_date']}] ~ <a href='remove_from_basket.php?id={$offer['id']}&type=offer'>Remove</a></li><br><br>";

    //Repeat the above for other item types
    } else if ($basketItem->type === "hotel"){
      $hotel = GetHotelByID($pdo, $basketItem->id);
      $total += $hotel['price'];
      //Display hotels in basket
      echo "<strong>HOTEL: </strong> {$hotel['name']} - ({$hotel['company']}), {$hotel['country']}, £{$hotel['price']}
      <br>[{$hotel['start_date']} to {$hotel['end_date']}] ~ <a href='remove_from_basket.php?id={$hotel['id']}&type=hotel'>Remove</a></li><br><br>";

    } else if ($basketItem->type === "flight"){
      $flight = GetFlightByID($pdo, $basketItem->id);
      $total += $flight['price'];
      //Display flights in basket
      echo "<strong>FLIGHT: </strong> {$flight['name']} - ({$flight['company']}), {$flight['country']}, £{$flight['price']}
      <br>[{$flight['start_date']} to {$flight['end_date']}] ~ <a href='../processes/remove_from_basket.php?id={$flight['id']}&type=flight'>Remove</a></li><br><br>";
    }
  }

  echo "</ul>";
  echo "<p><strong>Total:</strong> £{$total}</p>";
  //Confirm booking for logged in users
  if (!empty($_SESSION['user'])) {
    echo '<form method="post" action="../processes/book.php"><button type="submit">Confirm Booking</button></form>';
  } else {
    //Require login for anonymous users
    echo "<p><a href='login.php'>Log in</a> to confirm booking.</p>";
  }
}

?>

<!--Include the footer.php file to apply the footer content-->
<?php 

include 'footer.php'; 

?>
