<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Page</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="glm_css_files/confirm.css">

     
</head>
<body>
<div class="status">
  <div class="number">
    <button>3</button>
  </div>
  <div class="text">
    Confirmation
  </div>
</div>

    <div class="container">
        <div class="title">
             <h1>Summary</h1>
        </div>
       <div class="text">
       Site Name: <span style="color: #999;">Galoya Glamping Site</span><br>
       Room Type: <span style="color: #999;">Double</span><br>
       Check-In Date: <span style="color: #999;">22/10/2024</span><br>
       Check-Out Date: <span style="color: #999;">24/10/2024</span><br>
       No. of Rooms: <span style="color: #999;">02</span><br>
       Price: <span style="color: #999;">Rs.15000.00</span><br><br>
       </div>
       
       <div class="but">
    <button id="openPopup">Confirm</button>
  </div>      
  
    <!-- Popup details Form -->
    <div id="popup" class="popup">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Primary Customer Details</h2><br>
        <form>
          <label for="username">Title:</label>
           <select id="input-group" >
                            
             <option value="">Mr.</option>
             <option value="">Mrs.</option>
             <option value="">Ms.</option>
             <option value="">Miss.</option>
           </select>       
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" style="width:300px"><br><br>
              
         
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" style="width:400px"><br><br>
          
          <input type="radio" id="NIC" name="fav_language" value="NIC">
          <label for="html">NIC</label>
          <input type="radio" id="Passport" name="fav_language" value="Passport">
          <label for="css">Passport</label>
          <input type="text" id="nic" name="nic" style="width:300px"><br><br>
          
          <label for="password">Mobile No:</label>
          <input type="tel" id="phone" placeholder=" 07x-xxxxxxx"><br><br>
          
          
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  

    

 </div>

 


<script>
  
  var modal = document.getElementById('popup');

  var btn = document.getElementById("openPopup");

  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }
 
  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

 
   



</script>
</body>
</html>
