<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">

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
  width: content;
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
  padding: 100px 10px;
  height: 100%;

}

.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 20px;
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


/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  color: white;
  background-color: #327028 ;
  cursor: pointer;
  border-radius:10px;
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
  color: #;
}



#ud {background-color: #BFCC7C;}
#gmd {background-color: #BFCC7C;}
#gd {background-color: #BFCC7C;}
#dd {background-color: #BFCC7C;}
#td {background-color: #BFCC7C;}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
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

            <br><br><br>

<button class="tablink" onclick="openPage('ud', this, 'white')" id="defaultOpen">User Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('gmd', this, 'white')" >Glamping Site Manager Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('gd', this, 'white')">Guide Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('dd', this, 'white')">Driver Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('td', this, 'white')">Tool Supplier Details</button>

<div id="ud" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >User Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U003</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U004</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            
                            

                            
                        </tbody>
                    </table>
                </div>
            </div></div>

            <div id="gmd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >Glamping Site Manager Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>GM ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>GM001</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM002</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM003</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM004</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>



                            
                        </tbody>
                    </table>
                </div>
            </div>
            </div>


            <div id="gd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >Guide Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Guide ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>G001</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G002</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G003</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G004</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

                
            </div></div>




            <div id="dd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2  >Driver Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Driver ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>D001</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D002</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D003</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D004</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            

                            
                        </tbody>
                    </table>
                </div></div>

                
            </div>


            <div id="td" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2  >Tool Supplier Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Tool S. ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>T001</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>T002</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>T003</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>T004</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            

                            
                        </tbody>
                    </table>
                </div></div>

                
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
















<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">

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
  width: content;
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
  padding: 100px 10px;
  height: 100%;

}

.contain {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 20px;
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


/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  color: white;
  background-color: #327028 ;
  cursor: pointer;
  border-radius:10px;
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
  color: #;
}



#ud {background-color: #BFCC7C;}
#gmd {background-color: #BFCC7C;}
#gd {background-color: #BFCC7C;}
#dd {background-color: #BFCC7C;}
#td {background-color: #BFCC7C;}
</style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            </div>

        <!-- ========================= Main ==================== -->
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

            <br><br><br>

<button class="tablink" onclick="openPage('ud', this, 'white')" id="defaultOpen">User Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('gmd', this, 'white')" >Glamping Site Manager Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('gd', this, 'white')">Guide Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('dd', this, 'white')">Driver Details</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('td', this, 'white')">Tool Supplier Details</button>




<!-----------------------------------user ------------------------------->
<div id="ud" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >User Details</h2>
                    </div>

                    <table>
                            <thead>
                                <tr>
                                    <td>User ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Phone No</td>
                                    <td>NIC No</td>
                                    <td>Email Address</td>
                                    <td>Action</td> <!-- Column for buttons -->
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';

                                // Query to retrieve user details
                                $sql = "SELECT * FROM user";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["UserId"] . '</td>';
                                            echo '<td>' . $row["FirstName"] . '</td>';
                                            echo '<td>' . $row["LastName"] . '</td>';
                                            echo '<td>' . $row["Gender"] . '</td>';
                                            echo '<td>' . $row["PhoneNo"] . '</td>';
                                            echo '<td>' . $row["NICNo"] . '</td>';
                                            echo '<td>' . $row["Email"] . '</td>';
                                            // Add more columns as needed
                                            echo '<td>';
                                            echo '<button onclick="viewUser(' . $row["UserId"] . ')">View</button>';
                                            echo '<button onclick="removeUser(' . $row["UserId"] . ')">Remove</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>
            </div></div>

            
<!------------------------- Glamping manager ----------------------->
            <div id="gmd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >Glamping Site Manager Details</h2>
                    </div>

                    <table>
                            <thead>
                                <tr>
                                    <td>Glamping Manager ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Phone No</td>
                                    <td>NIC No</td>
                                    <td>Email Address</td>
                                    <td>Action</td>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';

                                // Query to retrieve user details
                                $sql = "SELECT * FROM glamping_manager_registration";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["glm_id"] . '</td>';
                                            echo '<td>' . $row["first_name"] . '</td>';
                                            echo '<td>' . $row["last_name"] . '</td>';
                                            echo '<td>' . $row["gender"] . '</td>';
                                            echo '<td>' . $row["phone_number"] . '</td>';
                                            echo '<td>' . $row["NIC"] . '</td>';
                                            echo '<td>' . $row["email"] . '</td>';
                                            echo '<td>';
                                            echo '<button onclick="viewGlamp(' . $row["glm_id"] . ')">View</button>';
                                            echo '<button onclick="removeGlamp(' . $row["glm_id"] . ')">Remove</button>';
                                            echo '</td>';
                                            // Add more columns as needed
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>
            </div>
            </div>



<!------------------------- Guide ----------------------->
            <div id="gd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >Guide Details</h2>
                    </div>

                    <table>
                            <thead>
                                <tr>
                                    <td>Guide ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Phone No</td>
                                    <td>NIC No</td>
                                    <td>Email Address</td>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';

                                // Query to retrieve user details
                                $sql = "SELECT * FROM guide";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["id"] . '</td>';
                                            echo '<td>' . $row["firstname"] . '</td>';
                                            echo '<td>' . $row["lastname"] . '</td>';
                                            echo '<td>' . $row["gender"] . '</td>';
                                            echo '<td>' . $row["phone"] . '</td>';
                                            echo '<td>' . $row["nic"] . '</td>';
                                            echo '<td>' . $row["email"] . '</td>';
                                            echo '<td>';
                                            echo '<button onclick="viewGuide(' . $row["id"] . ')">View</button>';
                                            echo '<button onclick="removeGuide(' . $row["id"] . ')">Remove</button>';
                                            echo '</td>';
                                            // Add more columns as needed
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="2">No users found</td></tr>';
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>

                
            </div></div>



<!------------------------- Driver ----------------------->
            <div id="dd" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2  >Driver Details</h2>
                    </div>

                    
                    <table>
                            <thead>
                                <tr>
                                    <td>Diver ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Phone No</td>
                                    <td>NIC No</td>
                                    <td>Email Address</td>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';

                                // Query to retrieve user details
                                $sql = "SELECT * FROM driver";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["d_id"] . '</td>';
                                            echo '<td>' . $row["firstname"] . '</td>';
                                            echo '<td>' . $row["lastname"] . '</td>';
                                            echo '<td>' . $row["gender"] . '</td>';
                                            echo '<td>' . $row["phone"] . '</td>';
                                            echo '<td>' . $row["nic"] . '</td>';
                                            echo '<td>' . $row["email"] . '</td>';
                                            echo '<td>';
                                            echo '<button onclick="viewDriver(' . $row["d_id"] . ')">View</button>';
                                            echo '<button onclick="removeDriver(' . $row["d_id"] . ')">Remove</button>';
                                            echo '</td>';
                                            // Add more columns as needed
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>
                            </tbody>
                    </table>
                </div></div>

                
            </div>

<!------------------------- Tool Supplier ----------------------->
            <div id="td" class="tabcontent">
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2  >Tool Supplier Details</h2>
                    </div>

                    
                    <table>
                            <thead>
                                <tr>
                                    <td>Tool Supplier ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Phone No</td>
                                    <td>NIC No</td>
                                    <td>Email Address</td>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';

                                // Query to retrieve user details
                                $sql = "SELECT * FROM supplier";
                                $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["SupplierId"] . '</td>';
                                            echo '<td>' . $row["FirstName"] . '</td>';
                                            echo '<td>' . $row["LastName"] . '</td>';
                                            echo '<td>' . $row["Gender"] . '</td>';
                                            echo '<td>' . $row["PhoneNo"] . '</td>';
                                            echo '<td>' . $row["NICNo"] . '</td>';
                                            echo '<td>' . $row["Email"] . '</td>';
                                            echo '<td>';
                                            echo '<button onclick="viewSupplier(' . $row["SupplierId"] . ')">View</button>';
                                            echo '<button onclick="removeSupplier(' . $row["SupplierId"] . ')">Remove</button>';
                                            echo '</td>';
                                            // Add more columns as needed
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>
                            </tbody>
                    </table>
                </div></div>

                
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

<script>
//user------------------------------------------------------------------------------    
    function viewUser(userId) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?UserId=' + userId;

// Open a popup window with specified dimensions
        var popupWidth = 600;
        var popupHeight = 400;
        var leftPosition = (screen.width - popupWidth) / 2;
        var topPosition = (screen.height - popupHeight) / 2;
        var popupWindow = window.open(userDetailsUrl, 'UserDetailsPopup', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + leftPosition + ',top=' + topPosition + ',resizable=yes,scrollbars=yes');

        // Focus the popup window
        if (window.focus) {
            popupWindow.focus();
        }
        }

//glamping manager ---------------------------------------------------------------------------    
    function viewGlamp(id) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?id=' + id;

// Open a popup window with specified dimensions
        var popupWidth = 600;
        var popupHeight = 400;
        var leftPosition = (screen.width - popupWidth) / 2;
        var topPosition = (screen.height - popupHeight) / 2;
        var popupWindow = window.open(userDetailsUrl, 'UserDetailsPopup', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + leftPosition + ',top=' + topPosition + ',resizable=yes,scrollbars=yes');

        // Focus the popup window
        if (window.focus) {
            popupWindow.focus();
        }
        }
    
//guide ------------------------------------------------------------------------------------------    
    function viewGuide(id) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?id=' + id;

// Open a popup window with specified dimensions
        var popupWidth = 600;
        var popupHeight = 400;
        var leftPosition = (screen.width - popupWidth) / 2;
        var topPosition = (screen.height - popupHeight) / 2;
        var popupWindow = window.open(userDetailsUrl, 'UserDetailsPopup', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + leftPosition + ',top=' + topPosition + ',resizable=yes,scrollbars=yes');

        // Focus the popup window
        if (window.focus) {
            popupWindow.focus();
        }
        }



        
//driver ------------------------------------------------------------------------------------------    
function viewDriver(d_id) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?d_id=' + d_id;

// Open a popup window with specified dimensions
        var popupWidth = 600;
        var popupHeight = 400;
        var leftPosition = (screen.width - popupWidth) / 2;
        var topPosition = (screen.height - popupHeight) / 2;
        var popupWindow = window.open(userDetailsUrl, 'UserDetailsPopup', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + leftPosition + ',top=' + topPosition + ',resizable=yes,scrollbars=yes');

        // Focus the popup window
        if (window.focus) {
            popupWindow.focus();
        }
        }



    
//Tool Supplier ------------------------------------------------------------------------------------------    
function viewSupplier(SupplierId) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?SupplierId=' + SupplierId;

// Open a popup window with specified dimensions
        var popupWidth = 600;
        var popupHeight = 400;
        var leftPosition = (screen.width - popupWidth) / 2;
        var topPosition = (screen.height - popupHeight) / 2;
        var popupWindow = window.open(userDetailsUrl, 'UserDetailsPopup', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + leftPosition + ',top=' + topPosition + ',resizable=yes,scrollbars=yes');

        // Focus the popup window
        if (window.focus) {
            popupWindow.focus();
        }
        }

//-----------------------------------remove button ----------------------------------------------------------------

//user-remove---------------------------------------------------
function removeUser(UserId) {
    // Send an AJAX request to remove the user
    var xhttp = new XMLHttpRequest();

    // Define the callback function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            // Check if the request was successful (status code 200)
            if (this.status == 200) {
                // Optionally, you can reload the page or update the table after successful removal
                // Reload the page
                window.location.reload();
            } else {
                // Handle errors or display a message to the user
                console.error('Error: Unable to remove user');
            }
        }
    };

    // Open a GET request to the remove_user.php script with the UserId as a parameter
    xhttp.open("GET", "remove_user.php?UserId=" + UserId, true);
    // Send the request
    xhttp.send();
}



//glamping manager-remove---------------------------------------------------
function removeGlamp(id) {
    // Send an AJAX request to remove the user
    var xhttp = new XMLHttpRequest();

    // Define the callback function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            // Check if the request was successful (status code 200)
            if (this.status == 200) {
                // Optionally, you can reload the page or update the table after successful removal
                // Reload the page
                window.location.reload();
            } else {
                // Handle errors or display a message to the user
                console.error('Error: Unable to remove user');
            }
        }
    };

    // Open a GET request to the remove_user.php script with the UserId as a parameter
    xhttp.open("GET", "remove_user.php?id=" + id, true);
    // Send the request
    xhttp.send();
}


//guide-remove---------------------------------------------------
function removeGuide(id) {
    // Send an AJAX request to remove the user
    var xhttp = new XMLHttpRequest();

    // Define the callback function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            // Check if the request was successful (status code 200)
            if (this.status == 200) {
                // Optionally, you can reload the page or update the table after successful removal
                // Reload the page
                window.location.reload();
            } else {
                // Handle errors or display a message to the user
                console.error('Error: Unable to remove user');
            }
        }
    };

    // Open a GET request to the remove_user.php script with the UserId as a parameter
    xhttp.open("GET", "remove_user.php?id=" + id, true);
    
    // Send the request
    xhttp.send();
}



//driver-remove---------------------------------------------------
function removeDriver(d_id) {
    // Send an AJAX request to remove the user
    var xhttp = new XMLHttpRequest();

    // Define the callback function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            // Check if the request was successful (status code 200)
            if (this.status == 200) {
                // Optionally, you can reload the page or update the table after successful removal
                // Reload the page
                window.location.reload();
            } else {
                // Handle errors or display a message to the user
                console.error('Error: Unable to remove user');
            }
        }
    };

    // Open a GET request to the remove_user.php script with the UserId as a parameter
    xhttp.open("GET", "remove_user.php?d_id=" + d_id, true);
    // Send the request
    xhttp.send();
}



//Toolsupplier-remove---------------------------------------------------
function removeSupplier(SupplierId) {
    // Send an AJAX request to remove the user
    var xhttp = new XMLHttpRequest();

    // Define the callback function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            // Check if the request was successful (status code 200)
            if (this.status == 200) {
                // Optionally, you can reload the page or update the table after successful removal
                // Reload the page
                window.location.reload();
            } else {
                // Handle errors or display a message to the user
                console.error('Error: Unable to remove user');
            }
        }
    };

    // Open a GET request to the remove_user.php script with the UserId as a parameter
    xhttp.open("GET", "remove_user.php?SupplierId=" + SupplierId, true);
    // Send the request
    xhttp.send();
}


</script>


</body>
</html> 



