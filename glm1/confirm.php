<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort booking form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
      /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --green: #003D25;
  --white: #fff;
  --yellow: #BFCC7C;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 75vh;
  overflow-x: hidden;
  background: var(--yellow);
}

.container {
  position: relative;
  width: 800px;
  height: 350px;
  background-color: #fff;
  border-radius: 20px;
  margin-top: 50px;
}

.title{
 
 text-align: left;
 padding: 10px;
 color: #003D25;
 
}






.status {
    display: flex;
  }

  .number {
    margin-top: 15px;
    margin-left: 10px;
  }

  .number button {
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background-color: #003D25;
    color: white;
    font-size: 30px;
    font-weight: 900;
    overflow: hidden;
  }
  .text{
    font-size: 20px;
    font-weight: bold;
    margin-left: 10px;
    margin-top: 25px;
    color: #555;
  
  }
  
  .but button{
    border: none;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 0;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #003D25;
    color: white;
    font-size: 20px;
    font-weight: 900;
    overflow: hidden;
    justify-content: center;

    position: absolute;
    top: 85%;
    right: 5%;
    transform: translateY(-50%);   
  }

  .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* Popup styling */
.popup {
  display: none;
  position: fixed;
  z-index: 1;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 80%;
  max-width: 750px;
  background-color: #fefefe;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.popup-content {
  text-align: center;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
}

.container2 {
  position: relative;
  width: 800px;
  height: 150px;
  background-color: #fff;
  border-radius: 20px;
  margin-top: 100px;
  margin-left: 340px;
}

.title{
 
 text-align: left;
 padding: 10px;
 font-size: 20px;
 
}



</style>
</head>
<body>
<div class="status">
  <div class="number">
    <button>3</button>
  </div>
  <div class="text">
    Confirmation & Payment
  </div>
</div>

    <div class="container">
        <div class="title">
             <h1>Summary</h1>
        </div>
       <div class="text">
       Site Name:<br>
       Room Type:<br>
       Check-In Date:<br>
       Check-Out Date:<br>
       No. of Rooms:<br>
       Price:<br><br>
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

 <div class="container2">
 <div class="title">
             <h3>Payment Method</h3>
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
