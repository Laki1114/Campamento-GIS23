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

    



    <form action="submit_contact.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name.." required>
        
        <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Your E-mail.." name="email" required>

        <label for="messege">Messege</label>
        <textarea id="messege" name="messege" placeholder="Your Messege" style="height:100px" required></textarea>
        
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>