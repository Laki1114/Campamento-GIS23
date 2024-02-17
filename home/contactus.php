<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/homestyle.css">
<link rel="stylesheet" href="../css/contactus.css">

</head>
<body>

<?php include 'headerIn.php'; ?>

<div class="container">
  <div style="text-align:center">
    <br><br><br><br><br><br><br>
    <h2>Contact Us</h2>
    <p> leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="../resource/knuckels.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>