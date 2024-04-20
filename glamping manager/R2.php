<?php
include ('database/glm_link.php');



// Initialize the $message variable
$message = '';

if(isset($_POST['submit'])) {
    $sitename = $_POST['sitename'];
    $sitedescription = $_POST['sitedescription'];
    $sitecategory = $_POST['sitecategory'];
    $sprice = $_POST['sprice'];

    // File upload handling
    if(isset($_FILES['siteimage']) && !empty($_FILES['siteimage']['name'])) {
        $file_name = $_FILES['siteimage']['name'];
        $file_tmp = $_FILES['siteimage']['tmp_name'];
        $file_size = $_FILES['siteimage']['size'];
        $file_type = $_FILES['siteimage']['type'];

        $upload_dir = "uploads/";
        // Check if the directory doesn't exist, then create it
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Creates the directory recursively
        }
        $max_file_size = 10 * 1024 * 1024; // 10MB
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        if(in_array($file_extension, $allowed_extensions) && $file_size <= $max_file_size) {
            $new_file_name = uniqid().'.'.$file_extension;
            $destination = $upload_dir . $new_file_name;

            if(move_uploaded_file($file_tmp, $destination)) {
                $sql2 = "INSERT INTO glamping_sites (site_name, site_description, site_category, price, thumb) VALUES ('$sitename', '$sitedescription', '$sitecategory', '$sprice', '$destination')";

                if(mysqli_query($conn, $sql2)) {
                    $message = 'site added successfully with image.';
                } else {
                    $message = 'Error adding site: ' . mysqli_error($conn);
                }
            } else {
                $message = 'Failed to move uploaded file.';
            }
        } else {
            $message = 'Invalid file or file size too large.';
        }
    } else {
        $sql = "INSERT INTO glamping_sites (site_name, site_description, site_category, price) VALUES ('$sitename', '$sitedescription', '$sitecategory', '$sprice')";

        if(mysqli_query($conn, $sql)) {
            $message = '$site added successfully.';
        } else {
            $message = 'Error adding site: ' . mysqli_error($conn);
        }
    }
}
?> 


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register site1</title>
    <link rel="stylesheet" href="glm_css_files/add_site.css">
</head>

    
<nav>
      <span  class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>
  </nav>

<div class="title">
    <h1>List your glamping site on Campamento and start welcoming guests !</h1><br>
    
</div>

<div class="container">
<div class="card">
   <div class="card-header">
      Add Glamping Site
   </div>
   <div class="card-body">
            <section id="content">
               <div class="content-blog bg-white py-3">
                  <div class="container">
                            <?php if(!empty($message)): ?>
                            <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form method="post" enctype="multipart/form-data" action="addSite.php">
                           <div class="form-group">
                                <label for="SiteName">Site Name</label>
                                <input type="text" class="form-control" name="sitename" id="sitename" placeholder="Site Name">
                           </div>
                           <div class="form-group">
                                <label for="sitedescription">Site Description</label>
                                <textarea class="form-control" name="sitedescription" rows="3"></textarea>
                           </div>
                           <div class="form-group">
                                <label for="productcategory">Site Category</label>
                                <select class="form-control" id="sitecategory" name="sitecategory">
                                    <option value="Wildglamping">Wild Glamping Site</option>
                                    <option value="Beachglamping">Beach Glamping Site</option>
                                    <option value="Treehouse">Tree House</option>
                                    <option value="Luxurysite">Luxury Site</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productprice">Price (1 night , 2 adults)</label>
                                <input type="text" class="form-control" name="sprice" id="sprice" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="siteimage">Site Image</label>
                                <input type="file" name="siteimage" id="siteimage">
                                <p class="help-block">Only jpg/png are allowed.</p>
                            </div>
                            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                        </form>
                  </div>
               </div>
            </section>
   </div>
</div>

</div>


