<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cab Booking Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(g.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 60px;
            border: 1px solid rgba(205, 194, 138, 0.8);
            background-color: rgba(205, 194, 138, 0.8);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            margin-left:10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 80%;
            padding: 15px;
            margin: 5px ;
            margin-left: 10px;
            border: none;
            border-bottom: 1px solid #060a06;
            border-radius: 3px;
            background-color: rgba(205, 194, 138, 0.8);
        }
        input[type="date"],
        input[type="time"],
        select {
            padding: 10px;
            margin: 5px 0;
            margin-left: 10px;
            border: none;
            border-bottom: 1px solid #060a06;
            border-radius: 3px;
            background-color: rgba(205, 194, 138, 0.8);
        }
        input[type="submit"] {
            background-color: rgba(51, 82, 51, 0.8) ;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
           
        }
        option,
        select {
            width: 85%;
            padding: 15px;
            margin: 5px ;
            margin-left: 10px;
            border: none;
            border-bottom: 1px solid #060a06;
            border-radius: 3px;
            background-color: rgba(205, 194, 138, 0.8);
        }
        .sub{
            justify-content: flex-end;
            margin-left: 500px;
        }
        i {
            margin-left: 12px;
        }
        input[type="submit"]:hover {
            background-color:rgba(116, 149, 116, 0.8);
        }
        /* Icon Styles */
        .fa {
            margin-right: 20px;
        }
        .form-group {
            display: flex;
            margin-top: 10px;

        }

        .form-group input[type="date"],
        .form-group input[type="date"] {
            flex: 1;
        }
        .form-group label[for="name"],
        .form-group label[for="email"] {
            flex: 1;
        }
        .form-group label[for="pickup-location"],
        .form-group label[for="dropoff-location"] {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book your guide</h2>
        <form action="submit_booking.php" method="POST">
            <div class="form-group">
           
            <input type="text" id="name" name="name" placeholder="Name" required>

            <input type="email" id="email" name="email" placeholder="E-mail" required>
        </div>
        <div class="form-group">
            <input type="tel" id="phone" name="phone" placeholder="Phone" required>

            <select name="way" id="way" placeholder="Choose">
                <option value="One-way">One-way</option>
                <option value="Round-trip">Round-trip</option>
            </select>

        </div>
        <Div class="form-group">
           
            <input type="text" id="pickup-location" name="pickup_location" placeholder="Location" required>
            <label for="time"> Time:</label>
            <input type="time" id="time" name="time" required>
           

        </Div>
            <div class="form-group">
                
            <input type="date" id="date" name="date" placeholder="Check-in" required>
        
            <input type="date" id="date" name="date" placeholder="Check-out" required>
            </div>
              
            <input type="text" id="Additional info" name="additional_info" placeholder="Additional information(requests)" required>
           <br>
            <input id="checkbox" type="checkbox" />
            <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
            <br>
            <div class="sub">
            <input type="submit" value="Book Cab"></div>
        </form>
    </div>
</body>
</html>
