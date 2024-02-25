<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  
}

/* Style tab links */
.tablink {
  background-color: #bfcc7c;
  
  float: left;
  outline: 2px;
  cursor: pointer;
  width: 15%;
 color: #327028;
  padding: 10px 28px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 14px;
  border: 2px solid #327028;
}

.tablink:hover {
  background-color: white;
  
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 10px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.contain::after {
  content: "";
  clear: both;
  display: table;
}

.contain img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.contain img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}


#All {background-color: #BFCC7C;}
#New {background-color: #BFCC7C;}
#Posted {background-color: #BFCC7C;}
#Rejected {background-color: #BFCC7C;}
</style>
</head>
<body>


<div class="container">
            <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>


        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>




<div class="details2">
<div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Manage Advertisment</h2>
                        
                    </div>
                    

<button class="tablink" onclick="openPage('All', this, 'white')">All</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('New', this, 'white')" id="defaultOpen">New</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('Posted', this, 'white')">Posted</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('Rejected', this, 'white')">Rejected</button>

<div id="All" class="tabcontent">
 <div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h5>David | 12:00 | 24/02/2024</h5>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject</button>
</span>
</div>
</div>

<div id="New" class="tabcontent">
  <div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h5>David | 12:00 | 24/02/2024</h5>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject</button>
</span>
</div>
</div>

<div id="Posted" class="tabcontent">
  <div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h5>David | 12:00 | 24/02/2024</h5>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject</button>
</span>
</div>
</div>

<div id="Rejected" class="tabcontent">
  <div class="contain">
  <img src="images/customer01.jpg" alt="Avatar" style="width:100%;">
  <h5>David | 12:00 | 24/02/2024</h5>
  <h3>THE BEST CAMPING ASSESORIES ULTIMATE CHECKLIST</h3>
  <p>Camping is one of the captivating ways to get in touch 
    with outdoor surroundings. Get top recommendations on 
    best camping essentials for a camping trip. </p>
    <p>See more....</p>
  <span class="time-right">
    <button class="btn" > Post </button> 
  <button class="btn active" > Reject</button>
</span>
</div>
</div>
</div></div>
</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 