<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  width: 100%;
  padding: 0 20px;
  background-color: #BFCC7C;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 10px;
  padding: 10px;
  margin: 10px 0;
}


.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}



.time-right {
  float: right;
  color: #aaa;
}


body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}


/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  color: white;
  background-color: #327028;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
  color:black;
}

.btn.active {
  background-color: red;
  color: white;
}

.btn.active:hover {
  background-color: black;
  color: white;
}

  
</style>
</head>
<body>

<h2>Notificaiton</h2>

<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:00</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  
  <span class="time-right">
    <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
</span>
</div>



<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:02</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  <span class="time-right">
  <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
  </span>
</div>

<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:00</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  
  <span class="time-right">
    <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
</span>
</div>



<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:02</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  <span class="time-right">
  <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
  </span>
</div>

<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:00</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  
  <span class="time-right">
    <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
</span>
</div>



<div class="container">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h4>David | 11:02</h4>
  <p>NotificationNotific  ationNotificati onNotif icationNotificationNotificationNotification </p>
  <span class="time-right">
  <button class="btn" > View </button> 
  <button class="btn active" > Delete </button>
  </span>
</div>




</body>
</html>