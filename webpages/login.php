<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<div class="access">
  <h2>Login</h2>

  <!--DETECT AND REPORT LOGIN DETAILS ERROR-->

  <!--'login_error' set in login_process.php-->
  <?php if (!empty($_SESSION['login_error'])): ?>
    <p style="color: red;">
      <!--Display error if user does not exist, close session-->
      <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
    </p>
  <?php endif; ?>

  <!--LOGIN TO ACCOUNT-->

  <!--Post input to login_process.php for database processing-->
  <form method="post" action="../processes/login_process.php">
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
  </form>
</div>

<div class="access">
  <h2>Register</h2>

  <!--REGISTER FOR AN ACCOUNT-->

  <!--Post input to register_process.php for database processing-->
  <form method="post" action="../processes/register_process.php">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Register</button>
  </form>
</div>

  <!--Include the footer.php file to apply the footer content-->
  <?php include 'footer.php'; ?>