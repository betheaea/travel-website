<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<h2>Packages</h2>

<p>
  Choose from a selection of our unique travel packages.
  <br>
  Costs are inclusive of all flights, hotels, activities, food, drink, insurance, and rentals.
</p>

<!--FILTERED SEARCH-->
<!--Get data entered from users and return matching offers-->
<form method="get" action="offers.php">

<!--Create drop-down boxes for filter options-->
<div class="formdisplay">
  <label>Destination:</label>
  <select name="destination">
    <option value="">-- All --</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Japan">Japan</option>
    <option value="France">France</option>
    <option value="Costa Rica">Costa Rica</option>
  </select>
</div>

<div class="formdisplay">
  <label>Type:</label>
  <select name="type">
    <option value="">-- All --</option>
    <option value="Adventure">Adventure</option>
    <option value="Relaxation">Relaxation</option>
    <option value="City Break">City Break</option>
    <option value="Honeymoon & Couples">Honeymoon & Couples</option>
  </select>
</div>

<div class="formdisplay">
  <label>Max Price:</label>
  <input type="number" name="max_price" step="0.01">
</div>

<div class="formdisplay">
  <label>From Date:</label>
  <input type="date" name="start_date">
</div>

<div class="formdisplay">
  <label>To Date:</label>
  <input type="date" name="end_date">
</div>

<!--Allow users to submit filtered choices-->
  <button type="submit">Filter</button>
</form>

<ul>

<?php

//CONNECT DATABASE
//pdo variable for the database
$pdo = new PDO('mysql:host=localhost;dbname=travel_website', 'root', '');

//where variable for creating array of executable filters for the database
$where = [];

//param variable for processing passed in parameters
$param = [];

//ASSIGN PARAMETERS FROM FORM INPUTS
//Use the $_GET superglobal to process data from 'get' method above
if (!empty($_GET['destination'])) {
  $where[] = 'destination = ?';
  $param[] = $_GET['destination'];
}

if (!empty($_GET['type'])) {
  $where[] = 'type = ?';
  $param[] = $_GET['type'];
}

if (!empty($_GET['max_price'])) {
  $where[] = 'price <= ?';
  $param[] = $_GET['max_price'];
}

if (!empty($_GET['start_date'])) {
  $where[] = 'start_date >= ?';
  $param[] = $_GET['start_date'];
}

if (!empty($_GET['end_date'])) {
  $where[] = 'end_date <= ?';
  $param[] = $_GET['end_date'];
}

//Grab matching data from the database and combine it into a string using $where
$sql = "SELECT * FROM offers" . ($where ? " WHERE " . implode(" AND ", $where) : "");

//Create prepared statements
$stmt = $pdo->prepare($sql);

//Attach given parameters to the statements
$stmt->execute($param);

//Post statements into the HTML as a string so users can view their options
foreach ($stmt as $offer) {
  echo 
  "<li><strong>{$offer['title']}</strong>, {$offer['type']}</li>
   <p>
    {$offer['description']}
    <br>
    {$offer['destination']} 
    <br>
    <strong>Cost: </strong>£{$offer['price']} 
    <br>
    <strong>Available: </strong> {$offer['start_date']} to 
    {$offer['end_date']} 
    <br><br>
    <a href='../processes/add_to_basket.php?id={$offer['id']}&type=offer'>Add to Basket</a></li><br>
   </p>";
}

?>

</ul>

<!--Include the footer.php file to apply the footer content-->
<?php include 'footer.php'; ?>
