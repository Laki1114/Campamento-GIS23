<?php
require("functionUser.php");

$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$phoneNo=$_POST["phoneNo"];
$nicNo=$_POST["nicNo"];
$email=$_POST["email"];
$psw=$_POST["psw"];




save_user($firstName,$lastName,$gender,$phoneNo,$nicNo,$email,$psw);

?>










