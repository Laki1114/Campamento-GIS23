<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "campamento");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $camp_site_name = $_POST['camp_site_name'];
    $camp_site_description = $_POST['camp_site_description'];
    $camp_site_image = $_FILES['camp_site_image']['name']; // Handle file upload
    

    // Insert data into camping_sites table
    $sql = "INSERT INTO camping_sites (camp_site_name, camp_site_description,  camp_site_image) 
                 VALUES ('$camp_site_name', '$camp_site_description', '$camp_site_image')";

    if (mysqli_query($conn, $sql)) {
        // Handle file upload if needed
        move_uploaded_file($_FILES['camp_site_image']['tmp_name'], 'uploads/' . $_FILES['camp_site_image']['name']);
        echo "Camping site added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
