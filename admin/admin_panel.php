<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Manage Advertisement </title>

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
  padding: 50px 70px;
  height: 100%;
}

.tab{
    padding: 20px 70px;
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


.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  color: white;
  background-color: #327028;
  cursor: pointer;
  border-radius: 10px;
  float: right;
}

.btn-active {
  background-color: red;
  color: white;
  border: none;
  outline: none;
  padding: 12px 16px;
  cursor: pointer;
  border-radius: 10px;
  float: right;
}



#All {background-color: #BFCC7C;}
#New {background-color: #BFCC7C;}
#Accepted {background-color: #BFCC7C;}
#Rejected {background-color: #BFCC7C;}


        .card {
            padding: 20px;
            margin-bottom: 10px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 10px;
            overflow: hidden;
            
        }
        .card-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .card-description {
            margin-bottom: 5px;
        }
        .card-category {
            color: #666;
            margin-bottom: 5px;
        }
        .card-status {
            font-weight: bold;
        }
        .card-actions {
            margin-top: 10px;
        }
        .card-actions button {
            margin-right: 5px;
            cursor: pointer;
        }
        .card-images img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="cardHeader">
    <br><br><br>
    <h2><center>Manage Advertisment</center></h2>
    </div>


    
    <div class=tab>

<button class="tablink" onclick="openPage('', this, 'white')"><a href="admin.php">Go back</a></button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('All', this, 'white')">All</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('New', this, 'white')" id="defaultOpen">New</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('Accepted', this, 'white')">Accepted</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="tablink" onclick="openPage('Rejected', this, 'white')">Rejected</button>

</div>

  

    <div id="All"  class="tabcontent">
    
        <?php
        include 'db.php';

        $sql = "SELECT * FROM advertisements ORDER BY created_at DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-category'>" . $row['created_at'] . "</div>";
                echo "<div class='card-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "<div class='card-title'>" . $row['title'] . "</div>";
                echo "<div class='card-description'>" . $row['description'] . "</div>";
                echo "<div class='card-status'>" . $row['status'] . "</div>";
                echo "<div class='card-actions'>";
                
                // Display accept and reject buttons if status is pending
                if ($row['status'] == 'pending') {
                    echo "<form action='admin_actions.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button class='btn' type='submit' name='action' value='accept'>Accept</button>";
                    echo "<button class='btn-active' type='submit' name='action' value='reject'>Reject</button>";
                    echo "</form>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div>No advertisements found</div>";
        }

        $conn->close();
        ?>
    </div>






    <div id="New"  class="tabcontent">
    
        <?php
        include 'db.php';

        $sql = "SELECT * FROM advertisements WHERE status = 'pending' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-category'>" . $row['created_at'] . "</div>";
                echo "<div class='card-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "<div class='card-title'>" . $row['title'] . "</div>";
                echo "<div class='card-description'>" . $row['description'] . "</div>";
                echo "<div class='card-status'>" . $row['status'] . "</div>";
                echo "<div class='card-actions'>";
                
                // Display accept and reject buttons if status is pending
                if ($row['status'] == 'pending') {
                    echo "<form action='admin_actions.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button class='btn' type='submit' name='action' value='accept'>Accept</button>";
                    echo "<button class='btn-active' type='submit' name='action' value='reject'>Reject</button>";
                    echo "</form>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div>No advertisements found</div>";
        }

        $conn->close();
        ?>
    </div>






    <div id="Accepted"  class="tabcontent">
    
        <?php
        include 'db.php';

        $sql = "SELECT * FROM advertisements WHERE status = 'accepted' ORDER BY created_at DESC";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-category'>" . $row['created_at'] . "</div>";
                echo "<div class='card-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "<div class='card-title'>" . $row['title'] . "</div>";
                echo "<div class='card-description'>" . $row['description'] . "</div>";
                
                echo "<div class='card-status'>" . $row['status'] . "</div>";
                echo "<div class='card-actions'>";
                
                // Display accept and reject buttons if status is pending
                if ($row['status'] == 'pending') {
                    echo "<form action='admin_actions.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button class='btn' type='submit' name='action' value='accept'>Accept</button>";
                    echo "<button class='btn-active' type='submit' name='action' value='reject'>Reject</button>";
                    echo "</form>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div>No advertisements found</div>";
        }

        $conn->close();
        ?>
    </div>





    <div id="Rejected"  class="tabcontent">
    
        <?php
        include 'db.php';

        $sql = "SELECT * FROM advertisements WHERE status = 'rejected' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-category'>" . $row['created_at'] . "</div>";
                echo "<div class='card-images'>";
                // Display images if available
                $images = explode(",", $row['images']);
                foreach ($images as $image) {
                    echo "<img src='uploads/" . $image . "' alt='Image'>";
                }
                echo "</div>";
                echo "<div class='card-title'>" . $row['title'] . "</div>";
                echo "<div class='card-description'>" . $row['description'] . "</div>";
               
                echo "<div class='card-status'>" . $row['status'] . "</div>";
                echo "<div class='card-actions'>";
                
                // Display accept and reject buttons if status is pending
                if ($row['status'] == 'pending') {
                    echo "<form action='admin_actions.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='action' value='accept'>Accept</button>";
                    echo "<button type='submit' name='action' value='reject'>Reject</button>";
                    echo "</form>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div>No advertisements found</div>";
        }

        $conn->close();
        ?>
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
