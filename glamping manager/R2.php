<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register site1</title>
    <link rel="stylesheet" href="glm_css_files/RR2.css">
</head>
<body>
    
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
                           
                        <form method="post" enctype="multipart/form-data" action="add_site.php">
                           <div class="form-group">
                                <label for="SiteName">Site Name</label>
                                <input type="text" class="form-control" name="site_name" id="site_name" placeholder="Site Name">
                           </div>
                           <div class="form-group">
                                <label for="sitedescription">Site Description</label>
                                <textarea class="form-control" name="site_description" rows="3"></textarea>
                           </div>
                           <div class="form-group">
                                <label for="sitecategory">Site Category</label>
                                <select class="form-control" id="site_category" name="site_category">
                                    <option value="Wildglamping">Wild Glamping Site</option>
                                    <option value="Beachglamping">Beach Glamping Site</option>
                                    <option value="Treehouse">Tree House</option>
                                    <option value="Luxurysite">Luxury Site</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="siteprice">Price (1 night , 2 adults)</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="siteimage">Site Image</label>
                                <input type="file" name="site_image" id="site-image">
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
</body>
</html>
