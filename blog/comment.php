<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="comment.css">
</head>
<body>

<h2>Comments</h2>

<div class="container">
  <img src="../Lakshani/images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David</h4>
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>



<div class="container">
  <img src="../Lakshani/images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David</h4>
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div>





<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>