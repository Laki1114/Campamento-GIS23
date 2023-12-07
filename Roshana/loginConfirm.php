<?php
require 'linklinkz.php';

session_start();

$email = $_POST["email"];
$password = $_POST["psw"];

$sql = "SELECT * FROM admin WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["Email"] && $_POST['psw'] == $row["Password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../Lakshani/adminHome.php");
		}
		
	}
	}
}

$sql = "SELECT * FROM user WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["Email"] && $_POST['psw'] == $row["Password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:profileUser.php");
		}
		
	}
	}
}

$sql = "SELECT * FROM glampmanager WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);


if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["Email"] && $_POST['psw'] == $row["Password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../Amaya/glpro.php");
		}
		
	}
	}
}

$sql = "SELECT * FROM supplier WHERE Email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["Email"] && $_POST['psw'] == $row["Password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../Amaya/profileSupplier.php");
		}
		
	}
	}
}
$sql = "SELECT * FROM driver WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["email"] && $_POST['psw'] == $row["password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../Faheema/drvr_pro.php");
		}
		
	}
	}
}

$sql = "SELECT * FROM guide WHERE email = '$email'";
$result=mysqli_query($linkz,$sql);

if($result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
		if(isset($_POST['email']))
	{
		if($_POST['email'] == $row["email"] && $_POST['psw'] == $row["password"] )
		{
			$_SESSION['email'] = $email;
			header("Location:../Faheema/guide_pro.php");
		}
		
	}
	}
}
?>