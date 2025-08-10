<!--Detect current session - if none, start new session to avoid errors-->
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!DOCTYPE html>

<html>

<head>
  <!--Viewport added for accessibility on different screens-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CSS stylesheet linked for styling-->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!--Icon stylesheet linked for minimised navbar-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--Javascript file linked for client-side functions-->
  <script src="../assets/JS/scripts.js"></script>
</head>

<body>
  <div class="header">
    <nav class="resnav" id="myResnav">
      <!--Navbar for menu accessibility-->
      <a href="index.php">B&B Travel</a>
      <a href="offers.php">Packages</a>
      <a href="flights.php">Flights</a>
      <a href="hotels.php">Hotels</a>
      <a href="destinations.php">Destinations</a>
      <a href="about.php">About Us</a>
      <a href="contact.php">Contact Us</a>
      <a href="account.php">Account</a>
      <a href="basket.php">
        <!--Adjust basket count based on offers added this session-->
        Basket<?php
          if (!empty($_SESSION['basket'])) {
            echo " (" . count($_SESSION['basket']) . ")";
          }
        ?>
      </a>

      <!--If user session present show 'logout' page-->
      <?php if (!empty($_SESSION['user'])): ?>
        <a href="../processes/logout.php">Logout</a>

      <!--If no user session present show 'login' page-->
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>

      <!--Show navbar icon if smaller screen size is used-->
      <a href="javascript:void(0);" class="icon" onclick="navIcon()">
        <i class="fa fa-bars"></i>
      </a>
      
    </nav>
  </div>
