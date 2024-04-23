<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer details form</title>
    <link rel="stylesheet" href="glm_css_files/customer_details_form.css">
</head>
<body>


<form method="post"   enctype="multipart/form-data"  action="booking_process2.php">
<div class="col-50">
           
        
            <label for="cus_name">Name</label>
            <input type="text" id="customer-name" name="customer_name" placeholder="John More Doe">
            <label for="email">email</label>
            <input type="text" id="email" name="email" placeholder="abc@gmail.com">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="012-3456789">
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="NIC" placeholder="012345678912/012345678v">
            <label for="room">No. of Rooms</label>
                                <select class="form-control" id="num_of_rooms" name="num_of_rooms">
                                    <option>1</option>
                                    <option>2</option>
                                    
                                </select>
            
            
            
          
        </div>
        <br>
        <hr><br>
        <button type="submit" name='submit'   onClick="validate(this)"     class="btn btn-primary">Submit</button>
      </form>
        

</body>
</html>