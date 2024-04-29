<?php 
session_start();
include('../database/linklinkz.php');?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/blog/postblog.css">
    <title>Your Blog Writing Page</title>
</head>
<body>
    <form name="user" method="post" action="intermediateBlog.php" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="container">
        <h1>Blog Writing Section</h1>
        <label for="shortTitle" ><b>Title in Short </b></label><br>
        <input type="text" placeholder="Use a maximum of 4 words" name="shortTitle" id="firstName" required><br>

        <label for="birthday">Posting Date</label><br>
        <input type="date" id="date" name="postDate" required><br>

        <label for="productcategory">Product Category</label>
                                <select class="form-control" id="productcategory" name="productcategory" required>
                                    <option value="" selected disabled>---SELECT CATEGORY---</option>
                                    <?php
                                    $sql = "SELECT * FROM blogCategory";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                                    }
                                    ?>
                                </select>
        
        <label for="subject">Description in short</label><br>
        <textarea id="subject" name="subjectShort" placeholder="This is the summary displayed to give an idea to the viewer about the content" style="height:150px;width:100%" required></textarea><br>

        <label for="subject">Detailed Description1 </label><br>
        <textarea id="subject" name="LongDescription1" placeholder="Write Your Description" style="height:400px;width:100%"></textarea><br>
        
        <label for="subject">Detailed Description2 </label><br>
        <textarea id="subject" name="LongDescription2" placeholder="Write Your Description" style="height:400px;width:100%"></textarea><br>
        <label for="subject">Detailed Description3 </label><br>
        <textarea id="subject" name="LongDescription3" placeholder="Write Your Description" style="height:400px;width:100%"></textarea><br>
        <label for="subject">Detailed Description4 </label><br>
        <textarea id="subject" name="LongDescription4" placeholder="Write Your Description" style="height:400px;width:100%"></textarea><br>

        <label for="image">Upload Images(Max 6 Images)</label><br>
        <input type="file" name="image1" accept="image/*"><br>
        <input type="file" name="image2" accept="image/*"><br>
        <input type="file" name="image3" accept="image/*"><br>
        <input type="file" name="image4" accept="image/*"><br>
        <input type="file" name="image5" accept="image/*"><br>
        <input type="file" name="image6" accept="image/*"><br>
        <input type="submit" name="submit" value="Submit">
    </div>
    </form>
    <script>

function validateForm() {
    // Get the value of the date input field
    var dateString = document.getElementById("postDate").value;

    // Parse the date string into a Date object using a standardized format
    var inputDate = parseDateString(dateString);

    // Get today's date
    var today = new Date();
    
    // Set hours, minutes, seconds, and milliseconds to 0 for comparison
    inputDate.setHours(0, 0, 0, 0);
    today.setHours(0, 0, 0, 0);

    // Compare the input date with today's date
    if (inputDate.getTime() !== today.getTime()) {
        alert("Please choose today's date.");
        return false;
    }
    return true;
}

// Function to parse date string into a Date object with a standardized format
function parseDateString(dateString) {
    // Split the date string into components (assuming it's in the format YYYY-MM-DD)
    var components = dateString.split('-');

    // Create a new Date object using the components
    var year = parseInt(components[0]);
    var month = parseInt(components[1]) - 1; // Months are 0-indexed in JavaScript
    var day = parseInt(components[2]);

    return new Date(year, month, day);
}



        </script>
</body>
</html>
