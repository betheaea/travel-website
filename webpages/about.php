<!--Include the header.php file to apply the header content-->
<?php include 'header.php'; ?>

<h2>About Us</h2>
    <p>We are B&B Travel Agents.</p>
    <p>We are strong believers in personalised holidays that are accessible and affordable.</p>
    <p>Please have a search through our available offers, and reach out through our contact form if you have any feedback, queries, or requests.</p>
    <p>We look forward to having you join us on holiday soon!</p>

<!--Backlog items-->
<h3>Coming soon...</h3>
    <p>Watch this space...we will be introducing some more exciting features soon! <br> These include, but are not limited to:</p>
    <ul class="backlog">
        <li>+ Native payment service through our website</li>
        <li>+ The ability to 'like' offers to view and track them via your account</li>
        <li>+ Multi-language support</li>
        <li>+ Further reward schemes for frequent flyers</li>
    </ul>

    <!--SUBSCRIPTION FORM-->
<!--Post form to contact_process file for processing-->
<form method="post" action="../processes/sub_process.php">
    <h5>Be the first to hear about it!</h5>

<!--Display key input requirements for form-->
  <input type="email" name="email" placeholder="Email" required>

<!--Send form (continued on contact_process.php)-->
  <button type="submit">Submit</button>
</form>

<!--Include the footer.php file to apply the footer content-->
<?php include 'footer.php'; ?>