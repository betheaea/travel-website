<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<h2>Contact Us</h2>

<!--CONTACT FORM-->
<!--Post form to contact_process file for processing-->
<form method="post" action="../processes/contact_process.php">

<!--Display key input requirements for form-->
  <input name="name" placeholder="Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <textarea name="message" placeholder="Message" required></textarea>

<!--Send form (continued on contact_process.php)-->
  <button type="submit">Send</button>
</form>

<!--Include the footer.php file to apply the footer content-->
<?php include 'footer.php'; ?>