<!--ALLOW OFFERS, HOTELS, AND FLIGHTS TO BE REMOVED FROM BASKET-->


<?php session_start();

include "BasketItem.php";

//Get ID and type (package, flight, hotel) of selected item to remove from basket
$id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? null;

//Ensure valid session, item ID, and associated type are in place to prevent errors
if ($id && $type && isset($_SESSION['basket'])) {
  $_SESSION['basket'] = array_filter(
    $_SESSION['basket'], function($v) use ($id, $type) {
    //decode data encoded in add_to_basket.php
    $item = json_decode($v);
    return $item->id !== $id || $item->type !== $type;
  });
}

//Keep user on Basket page when removing from basket
header("Location: ../webpages/basket.php");

?>
