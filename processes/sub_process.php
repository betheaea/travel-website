<!--POST SUBSCRIPTION FORM TO DATABASE-->

<?php
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

//Declare how required inputs will be inserted into SQL statement
$stmt = $pdo->prepare("INSERT INTO subscriptions (email) VALUES (?)");

//Execute SQL statement for processing into the dabatase using 'post' method from contact.php
$stmt->execute([$_POST['email']]);
header("Location: ../webpages/thankyousub.php?success=1");
?>