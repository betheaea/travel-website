<!--POST CONTACT FORM TO DATABASE-->

<?php

//Declare database
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

//Declare how required inputs will be inserted into SQL statement
$stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");

//Execute SQL statement for processing into the dabatase using 'post' method from contact.php
$stmt->execute([$_POST['name'], $_POST['email'], $_POST['message']]);
header("Location: ../webpages/contact.php?success=1");

?>