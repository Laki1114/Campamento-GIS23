<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details Form</title>
    <link rel="stylesheet" href="glm_css_files/customer_details_form.css">
    <style>
        /* Add custom CSS styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #d6d4cb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            height: 580px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"] {
            display: block;
           width: 20%; 
            padding: 10px;
            border: none;
            background-color: #003D25;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
            margin-left: 130px;
        }

        button[type="submit"]:hover {
            background-color: #003D25;
        }
        .title{
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="title">
<h3>Customer Details</h3>
</div>
<div class="container">
    <form method="post" enctype="multipart/form-data" action="booking_process2.php">
        <div class="form-group">
            <label for="customer-name">Name</label>
            <input type="text" id="customer-name" name="customer_name" placeholder="John More Doe" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="abc@gmail.com" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="012-3456789" required>
        </div>

        <div class="form-group">
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="NIC" placeholder="012345678912/012345678v" required>
        </div>

        

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Submit the form using AJAX
        fetch('booking_process2.php', {
            method: 'POST',
            body: new FormData(document.getElementById('bookingForm'))
        })
        .then(response => {
            if (response.ok) {
                // Redirect to payment.php upon successful submission
                window.location.href = 'glm_payment.php';
            } else {
                console.error('Error occurred while submitting the form');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>


</body>
</html>
