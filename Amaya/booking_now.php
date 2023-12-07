<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort booking form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
    *{
    margin: 0;
    padding: 0;
}
body{
    background-image: url(images/resort.jpg);
    background-position: center;
    background-size: cover;
}
#form{
    background-color: #000;
    height:400px;
    width:800px;
    margin: auto;
    margin-top: 100px;
    opacity:0.7;
}
#first-group{
    border:none;
    width:400px;
    margin-top: 38px;
    position: absolute;
}
#content{
    border: 1px solid #f0f1ee;
    margin:10px;
    margin-left: 8px;
    padding:5px;
}
#content #input-group{
    border:none;
    outline:none;
    background: transparent;
    margin-left:8px;
    width:300px;
    color:#fff;
}
::placeholder{
    color:#fff;
}
.fa{
    display:inline-block;
    color:rgb(19, 114, 19);
    border-right:1px solid #fff;
    padding:8px;
    margin-left: 8px;
}
#second-group{
    border:none;
    width:400px;
    margin-top: 55px;
    margin-left:400px;
}
#submit-btn{
    margin-top: 30px;
    margin-left: 600px;
    background: transparent;
    color:#ded468;
    width:150px;
    border:1px solid rgb(80, 155, 40);
    outline:none;
    padding:10px;
    font-size: 20px;
}

</style>





</head>
<body>
    <div class="container">
        <form class="form-group">
            <div id="form">
                <h1 class="text-white text-center">Booking Now</h1>

                <div id="first-group">

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="input-group" placeholder=" Name">
                    </div>

                    <div id="content">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="number" id="input-group" placeholder="Phone number">
                    </div>

                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="date" id="input-group" placeholder="Arrival Date">
                    </div>

                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select id="input-group" style="background-color: black;">
                            <option value="">Do you want meals?</option>
                            <option value="">Yes</option>
                            <option value="">No</option>
                            
                        </select>
                    </div>

                </div>

                <div id="second-group">

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="input-group" placeholder="NIC">
                    </div>

                    <div id="content">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input type="email" id="input-group" placeholder="Email">
                    </div>

                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="date" id="input-group" placeholder="Departure Date">
                    </div>

                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select id="input-group" style="background-color: black;">
                            <option value="">Glamping site Type</option>
                            <option value="">Single</option>
                            <option value="">Double</option>
                            <option value="">Family</option>
                        </select>
                    </div>
            
                </div>

                <button type="submit" value="Submit" id="submit-btn">Book Now</button>

            </div>
        </form>
    </div>
</body>
</html>