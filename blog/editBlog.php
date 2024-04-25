<?php 
session_start();
include('../database/linklinkz.php');

$IdentityNo = $_GET['id'];



$sql = "SELECT * FROM blog WHERE blogID= $IdentityNo";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){
  $BlogID=$row["blogID"];
  
  //$Image=$row["Image1"];

  $shortTitle = $row["shortTitle"];
  $postDate = $row["postDate"];
  $subjectShort = $row["subjectShort"];
  $productcategory = $row['cat_id'];
  $LongDescription1 = $row["LongDescription1"];
  $LongDescription2 = $row["LongDescription2"];
  $LongDescription3 = $row["LongDescription3"];
  $LongDescription4 =$row["LongDescription4"];

}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/blog/postblog.css">
    <title>Your Blog Writing Page</title>
</head>
<body>
    <form name="user" method="post" action="editmediateBlog.php" enctype="multipart/form-data" onsubmit="myFunction()">
    <div class="container">
        <h1>Blog Writing Section</h1>
        <label for="shortTitle"><b>Title in Short </b></label><br>
       <!-- <input type="text" placeholder="Use a maximum of 4 words" name="shortTitle" id="firstName"  required>-->
       <?php  echo  $shortTitle ?><br>

        <label for="birthday"><b>Posting Date</b></label><br>
        <!--<input type="date" id="date"  name="postDate">--><?php  echo $postDate ?><br>

        <label for="productcategory"><b>Product Category</b></label>
                                <select class="form-control" id="productcategory" name="productcategory" >
                                   
                                <option value="" disabled selected>---SELECT CATEGORY---</option>
    <option <?php if($productcategory == "1") echo "selected"; ?>>Camping sites</option>
    <option <?php if($productcategory == "2") echo "selected"; ?>>Glamping sites</option>
    <option <?php if($productcategory == "3") echo "selected"; ?>>Travel sites</option>
</select>
        
        <label for="subject">Description in short</label><br>
        <textarea id="subject" name="subjectShort"  placeholder="This is the summary displayed to give an idea to the viewer about the content"  style="height:150px;width:100%"><?php echo $subjectShort?></textarea><br>

        <label for="subject">Detailed Description1 </label><br>
        <textarea id="subject" name="LongDescription1"  placeholder="Write Your Description" style="height:400px;width:100%">
        <?php echo $LongDescription1?></textarea><br>
        
        <label for="subject">Detailed Description2 </label><br>
        <textarea id="subject" name="LongDescription2" placeholder="Write Your Description" style="height:400px;width:100%">
        <?php echo $LongDescription2?></textarea><br>
        <label for="subject">Detailed Description3 </label><br>
        <textarea id="subject" name="LongDescription3" placeholder="Write Your Description" style="height:400px;width:100%">
        <?php echo $LongDescription3?></textarea><br>
        <label for="subject">Detailed Description4 </label><br>
        <textarea id="subject" name="LongDescription4"   placeholder="Write Your Description" style="height:400px;width:100%">
        <?php echo $LongDescription4?></textarea><br>

        <label for="image">Upload Images(Max 6 Images)</label><br>
       <table>
        <tr>
        <td> 
            <?php if(isset($row['Image1']) && !empty($row['Image1'])): ?>
                                <img src="<?php echo $row['Image1']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?>
                        </td>

                            <td>
                            <?php if(isset($row['Image2']) && !empty($row['Image2'])): ?>
                                <img src="<?php echo $row['Image2']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?>
                        </td>
                        </tr>

                            <tr>
                            <td> <?php if(isset($row['Image3']) && !empty($row['Image3'])): ?>
                                <img src="<?php echo $row['Image3']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?>
                            </td>

                            <td>
                           <?php if(isset($row['Image4']) && !empty($row['Image4'])): ?>
                                <img src="<?php echo $row['Image4']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?>
                        </td>
                            </tr>

                            <tr>
                            <td>
                                 <?php if(isset($row['Image5']) && !empty($row['Image5'])): ?>
                                <img src="<?php echo $row['Image6']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?></td>
                          

                                <td> <?php if(isset($row['Image6']) && !empty($row['Image6'])): ?>
                                <img src="<?php echo $row['Image6']; ?>" alt="" height='150' width='150'><br>
                                <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="productimage">Product Image</label>
                                    <input type="file" name="productimage" id="productimage">
                                    <p class="help-block">Only jpg/png are allowed.</p>
                                </div>
                            <?php endif; ?></td>
                            </tr></table>
                            <input type="hidden" name="id" value="<?php echo $IdentityNo; ?>">

                            <input type="submit" name="submit" value="Submit">
    </div>
    
    </form>
    <script>

        function myFunction() {
          alert("The form was submitted");
        }
        </script>
</body>
</html>
