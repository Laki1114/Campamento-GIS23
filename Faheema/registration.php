<?php
include 'config.php';
 
if(isset($_POST['regstr'])){
	$b=$_POST['bname'];
	$n=$_POST['number'];
	$nm=$_POST['name'];
	$ni=$_POST['nic'];
	$p=$_POST['tp'];
	$ema=$_POST['email'];
	$ps=$_POST['pass1'];
	$psw=$_POST['pass2'];

	if ($ps != $psw) {
		echo "<script> alert(' Please enter same passwords ') </script>";
	}

 
  $password = md5($ps);

  $i="insert into glamping_manager(bname, number, name, nic, phone,email, password) values('$b','$n','$nm','$ni','$p','$ema','$password')";
  if(mysqli_query($con, $i)){
	$msg = "Account created";
	header("Location: registration.php?warning=" . urlencode($msg));
	exit();
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
        <style>
*{
    margin: 0;
    padding: 0;
}

body{
    background-image: url(images/bg5.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

}

div.main{
    width: 400px;
    margin: 50px auto 50px auto;
}

h2{
    text-align: center;
    font-size: 30px;
    padding: 20px;
    font-family: sans-serif;
    color: #12bb37;
}

div.register{
    background-color: rgba(6, 6, 6, 0.5);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px soid rgb(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgb(0,0,0,0.3);
    color: #BFCC7C;
}

form#register{
    margin: 10px;
}

p{
    font-family: sans-serif;
    font-size: 14px;
    margin-top: 10px;
    margin-bottom: 10px;
    
}

input{
    width:365px;
    border: 1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow: inset 1px 1px 5px rgb(0,0,0,0.3);
}

input.submit{
    text-align: center;
}

input.submit{
    
    width: 380px;
    padding: 7px;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 600;
    border-radius: 3px;
    background-color: #003C25;
    color: #BFCC7C;
    cursor: pointer;
    border: 1px solid rgb(255,255,255,0.3);
    box-shadow: 1px 1px 1px rgb(0,0,0,0.3);


}
    
    
    
          
</style>

    </head>
    <body>
        <div class="main">

            <div class="register">

                <h2>Registration Form</h2>
                <form id="register" method="post">

                <p>Name of the Business:</p>
                <input type="text" name="bname" placeholder="Enter Your business name">

                <p>Business Registration Number:</p>
                <input type="text" name="number" placeholder="Enter business registration number">

                <p>Name of owner or manager</p>
                <input type="text" name="name" placeholder="Enter your name">

                <p>NIC:</p>
                <input type="text" name="nic" placeholder="Enter your NIC number">

                <p>WhatsApp Number:</p>
                <input type="text" name="tp" placeholder="Enter whatsapp number of the company">

                <p>E-mail:</p>
                <input type="email" name="email" placeholder="Enter email address of the company">

                <p>Password:</p>
                <input type="password" name="pass1" placeholder="Enter password"><br><br>
                <input type="password" name="pass2" placeholder="Confirm password"><br><br>

                <input type="submit"  name="regstr" value="Register" class="submit">
               

                </form>
            </div>
        </div>

        
        


































    </body>
</html>