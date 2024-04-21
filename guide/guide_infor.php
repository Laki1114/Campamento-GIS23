<?php  'config.php'; ?>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Guide </title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/Guide/info.css">
   <style>
    body{
        font-family: 'Trebuchet MS', sans-serif;
    }
    .driver .d p{
        font-size: 40px;
        margin-left: 30px;
        color: #1a360e;
    }
    .d-img img{
        margin-left:100px;
        width: 1100px;
        height: 450px;
        border-radius: 5px;
        border: 5px solid white;
    }
   .des{
    margin-top: 20px;
    margin-left: 100px;
   }
   
   .experience-grid {
    margin-left: 50px;
    display: flex;
    overflow-x: auto; /* Enable horizontal scrolling */
    overflow-y: hidden; /* Hide vertical scrollbar */
    white-space: nowrap; /* Prevent images from wrapping */
}

.experience-item {

    flex: 0 0 auto; /* Don't grow or shrink */
    margin-right: 10px; /* Adjust margin between images */
    display: inline-block; /* Display items in a row */
}

.experience-item img {
    max-width: 400px; /* Set maximum width for images */
    height: auto; /* Maintain aspect ratio */
    border: 2px solid #222; /* Add border with a color */
    border-radius: 5px; /* Add rounded corners */
    padding: 5px; /* Add padding to the border */
}

.button {
  background-color: black;
  border: none;
  color: white;
  padding: 15px 90px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-left: 400px;
  border-radius: 7px;
}
table {
  border-collapse: collapse;
  width: 30%;
  margin-left: 800px;
}
th{
    text-align: right; 
    background-color: #022d0b; 
    padding: 10px;
    color: white;
}
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid black;
}
   </style>
</head>

<body>
 <!------sites----
 <div id="sidebar">
 
            include("sidebar_d.php");
           
        </div> -->

<!-- ========================= Main ==================== -->
<?php 
require 'config.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve driver details from the database
    $sql = "SELECT * FROM guide WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   
    $languageArray = unserialize($row['language']);
       if (is_array($languageArray)) {
        // Implode the language array
        $languages = implode(", ", $languageArray);
        
        // Output other details and H
        // Output other HTML elements as needed
  
       }else{}

    echo '<div class="topbar">';
    echo  '<div class="toggle">';
    echo  '<ion-icon name="menu-outline"></ion-icon>';
    echo   '</div>';

    echo  '<div class="search">';
    echo  '<label>';
    echo   '<input type="text" id="searchInput"  placeholder="Search here">';    
    echo   '<ion-icon name="search-outline"></ion-icon>';
    echo '</label>';
    echo '</div>';
    echo '</div>';                            

    echo  '<div class="driver">';
    echo  '<div class="d">';
    echo   '<br>';
    echo '<p>Explore with  '. $row['firstname'] .':</p>';
    echo '</div>';
    echo '<br>';
    echo '<div class="d-img">';
    echo   '<img src="' . $row['picture'] . '" alt="pic">';
    echo    '<div class="des">';
    echo '<h2>Hello I am '. $row['firstname'] .', Travel with me!</h2>';
    echo '<br><p>I speak:  ' . $languages . ' </p>';
    echo '<br><p>'. $row['qualification'] .'</p>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Book Guide</th>';
    echo '<th></th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Half Day</td>';
    echo '<td>Rs. 1500</td>';
  
    echo '</tr>';
    echo '<tr>';
    echo '<td>Full day</td>';
    echo '<td>Rs. 2500</td>';

    echo '</tr>';
    echo '</table>';
   

    echo '<br>';
    echo '<a href="booking_process.php?id='.$row['id'].'" class="button">Book</a> <br> <br>';

    echo '<br>';
    echo '<h2>Experience</h2><br>';
    echo '<p>';
    echo ''. $row['experience'] .'<br><br><br>';

   echo '</div>';
   
   echo '</div>';
   echo  '</div>';

  
   $sqll = "SELECT * FROM exp_images WHERE guide_id = $id";

   // Execute the query
   $reslt = mysqli_query($con, $sqll);

   // Check if there are any images
   if (mysqli_num_rows($reslt) > 0) {
       // Loop through each row to fetch images
       echo '<div class="experience-grid">';
       while ($ro = mysqli_fetch_assoc($reslt)) {
           // Display each image and edit button
           
           echo "<div class='experience-item'>";
           echo "<img src='experience/" . $ro['file_name'] . "' alt='Experience'>";
           echo "</div>";
        
       }    echo "</div>";
   } else {
       // If no images found, display a message
       echo "<div>No images found for this user.</div>";
   }
          
   echo '</div>';
                
   echo '</div>';
   echo '</div>';

  }
}else {
        echo "Guide not found.";
    }

    ?>    
</body>
</html>   