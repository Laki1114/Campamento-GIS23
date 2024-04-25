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
  padding: 5px 28px;
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





    .view-button {
        position: relative;
        padding: 5px 10px;
        background: #327028;
        text-decoration: none;
        color: white;
        border-radius: 6px;
    }
    .view-button:hover {
        background: white;
        color: #327028;
    }

    .remove-button {
        position: relative;
        padding: 5px 10px;
        background: red;
        text-decoration: none;
        color: white;
        border-radius: 6px;
    }

    .remove-button:hover {
        background: white;
        color: red;
    }

    .filterSelect {
    position: relative;
    padding: 5px 10px;
    background: #ffffff;
    text-decoration: none;
    color: #327028;
    border-radius: 6px;
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
                        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search here">
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
<!--==========filter by gender=================-->
<select id="genderFilter" class="filterSelect" onchange="filterByGender(this.value)">
    <option value="">Filter by Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>



            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 >User Details</h2>
                    </div>

                    <table id="userTable">
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
                        <tr>
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
                                            echo '<button class="view-button" onclick="viewUser(' . $row["UserId"] . ')">View</button>';
                                            echo '<button class="remove-button" onclick="removeUser(' . $row["UserId"] . ')">Remove</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>
                                </tr>
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
                                            echo '<button class="view-button" onclick="viewGlamp(' . $row["glm_id"] . ')">View</button>';
                                            echo '<button class="remove-button" onclick="removeGlamp(' . $row["glm_id"] . ')">Remove</button>';
                                            echo '</td>';
                                            // Add more columns as needed
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="8">No users found</td></tr>';
                                    }
                                ?>

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
                                    <td>Action</td>
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
                                            echo '<button class="view-button" onclick="viewGuide(' . $row["id"] . ')">View</button>';
                                            echo '<button class="remove-button" onclick="removeGuide(' . $row["id"] . ')">Remove</button>';
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
                                            echo '<button class="view-button" onclick="viewDriver(' . $row["d_id"] . ')">View</button>';
                                            echo '<button class="remove-button" onclick="removeDriver(' . $row["d_id"] . ')">Remove</button>';
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
                                            echo '<button class="view-button" onclick="viewSupplier(' . $row["SupplierId"] . ')">View</button>';
                                            echo '<button class="remove-button"onclick="removeSupplier(' . $row["SupplierId"] . ')">Remove</button>';
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
    function viewGlamp(glm_id) {
       // Define the URL for fetching user details based on userId
        var userDetailsUrl = 'get_user_details.php?glm_id=' + glm_id;

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
function removeGlamp(glm_id) {
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
    xhttp.open("GET", "remove_user.php?glm_id=" + glm_id, true);
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


//search users=========================================================================

// Function to search users based on input and table ID
function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementsByTagName("table");

    // Loop through all tables
    for (var j = 0; j < table.length; j++) {
        tr = table[j].getElementsByTagName("tr");
        // Loop through all table rows, and hide those that don't match the search query
        for (i = 0; i < tr.length; i++) {
            var visible = false; // flag to determine if the row should be visible
            td = tr[i].getElementsByTagName("td");
            for (var k = 0; k < td.length; k++) {
                var cell = td[k];
                if (cell) {
                    txtValue = cell.textContent || cell.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        visible = true;
                        break; // break the inner loop if match found
                    }
                }
            }
            if (visible) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



</script>






</body>
</html> 

