<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>place_upload</title>
    <link rel="stylesheet" href="glm_css_files/place_upload.css">
</head>
<body>
<nav>
      <span  class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>
</nav>
  


<div class="container1">
  <div class="step active" id="step1">
    <div class="question"><h2>What is the name of the place?</h2></div>
    <input type="text" id="nameInput" size="75">
    <button onclick="nextStep()">Next</button>
  </div>
</div>

<!-- Separate Notes Section -->
<div class="notes-container">
  <h2></h2>
  <p class="notes">
    <ul>
        <li>Enter your place name as you registered in government. </li>
    </ul>
  </p>  
</div>


<div class="step" id="step2">
  <h2>Step 2: Where is the place you're listing?</h2>
  <label>Address:</label><input type="text" id="addressInput"><br><br>
  <label>Postal Code:</label><input type="text" id="postalcode"><br><br>
  <label>City:</label><input type="text" id="city"><br><br>
  <button onclick="nextStep()">Next</button>
</div>




<script src="glm_js_files/place_upload.js"></script>
  
</body>
</html>