<?php
session_start();
include('../database/linklinkz.php');
if(!isset($_SESSION['customerid'])){
    
header('location:index.php');
}else{
 $pid = $_GET['pid']; 
 $cid = $_GET['cid'];
 

    $delWishlist = "DELETE FROM wishlist WHERE pid='$pid' AND uid='$cid'";   
	if(mysqli_query($conn, $delWishlist)){
        header('location:show-wishlist.php');

    }
 









}

?>