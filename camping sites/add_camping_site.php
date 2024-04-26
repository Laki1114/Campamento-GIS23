<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register site1</title>
    <link rel="stylesheet" href="camping_css_files/add_camping_site.css">
</head>
<body>
    



<div class="container">
        <div class="card">
           <div class="card-header">
              Add Camping Site
           </div>
           <div class="card-body">
                <section id="content">
                   <div class="content-blog bg-white py-3">
                      <div class="container">
                        <form method="post" enctype="multipart/form-data" action="c_action.php">
    
                            <div class="form-group">
                                <label for="camp_site_name">Site Name</label>
                                <input type="text" class="form-control" name="camp_site_name" id="camp_site_name" placeholder="camp_Site Name">
                            </div>
                            <div class="form-group">
                                <label for="camp_site_description">Site Description</label>
                                <textarea class="form-control" name="camp_site_description" rows="3" maxlength="250"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label for="camp_siteimage">Site Image</label>
                                <input type="file" name="camp_site_image" id="camp_site_image">
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
