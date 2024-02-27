<?php 

    if(isset($_POST['submit']))
    {
       $Name = $_POST['name'];
       $Email = $_POST['email'];
       $Messege = $_POST['subject'];

       if(empty($Name) || empty($Email) || empty($Messege) )
       {
           header('location:contactus.php?error');
       }
       else
       {
           $to = "nimeshalakshani1114@gmail.com";

           if(mail($to,$Messege,$Email))
           {
               header("location:contactus.php?success");
           }
       }
    }
    else
    {
        header("location:contactus.php");
    }
?>