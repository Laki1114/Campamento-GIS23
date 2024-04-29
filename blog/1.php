<?php 
session_start();
include('../database/linklinkz.php');
//$IdentityNo = $_GET['id'];
$IdentityNo = '20';
// Check if file is uploaded
if(isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'])) {
	$name = $_FILES['productimage']['name'];
	$size = $_FILES['productimage']['size'];
	$type = $_FILES['productimage']['type'];
	$tmp_name = $_FILES['productimage']['tmp_name']; 
	$max_size = 10000000;
	$extension = pathinfo($name, PATHINFO_EXTENSION); 
	
	// Check file extension and size
	if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size <= $max_size) {
		$location = "uploads/";
		$filePath = $location . $name;

		// Move uploaded file to destination
		if(move_uploaded_file($tmp_name, $filePath)) {
			$sql2 = "UPDATE user SET FirstName = '$firstName',LastName = '$lastName',Gender = '$gender', PhoneNo = '$phoneNo' ,thumb='$filePath' WHERE Email= '$email'" ;
			
			$res = mysqli_query($conn, $sql2);
			if($res) {
				$message = 'Saved Successfully with image';
				header("Location: ../user/profileUSer.php?user=" . $_SESSION['customer'] . "&userid=" . $_SESSION['customerid']);
			} else {
				$message = "Failed to Create Product";
				echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}
		} else {
			$message = "Failed to Upload File";
		}
	} else {
		$message = "Only JPG files are allowed and should be less than 10MB";
	}
} else {
	// If no image uploaded, update other product details
	/*$sql_update = "UPDATE user SET FirstName = '$firstName',LastName = '$lastName',Gender = '$gender', PhoneNo = '$phoneNo'  WHERE Email= '$email'" ;
	if (mysqli_query($conn, $sql_update)) {
		$message = 'Saved Successfully without image';

		header("Location: ../user/profileUSer.php?user=" . $_SESSION['customer'] . "&userid=" . $_SESSION['customerid']);
	} else {
		echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
	}
*/}

$sql = "SELECT * FROM blog WHERE blogID= $IdentityNo";//change Email='email' or Email='$email'
$result = mysqli_query($linkz,$sql);

while ($row = mysqli_fetch_assoc($result)){

  $BlogID=$row["blogID"];
}
    if(isset($row['Image1']) && !empty($row['Image1'])):?>
    <img src="uploads/<?php echo $row['Image1']; ?>" alt="" height='150' width='150'><br>
    <a href="delproduImg.php?id=<?php echo $row['blogID'];?>">Delete Image</a><br>
<?php else: ?>
    <div class="form-group">
        <label for="productimage1">Product Image</label>
        <input type="file" name="productimage1" id="productimage">
        <p class="help-block">Only jpg/png are allowed.</p>
    </div>
<?php endif; ?>
  