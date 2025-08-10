<!--ALLOW OFFERS, FLIGHTS, AND HOTELS TO BE ADDED TO BASKET-->

<?php session_start();

//Include required class
include "BasketItem.php";

$id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? null;

if ($id && $type) {
  //Encode data to prevent serialisation error
  $_SESSION['basket'][] = json_encode(new BasketItem($id, $type));
}

//Keep user on relevant page when adding to basket
//Prevent redirection and loading errors

if ($type === 'offer'){
    $_SESSION['basket_added'] = true;
    header("Location: ../webpages/offers.php");
    exit();
} else if ($type === 'flight'){
    $_SESSION['basket_added'] = true;
    header("Location: ../webpages/flights.php");
    exit();
} else if ($type === 'hotel'){
    $_SESSION['basket_added'] = true;
    header("Location: ../webpages/hotels.php");
    exit();
}

?>