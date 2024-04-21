<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/homestyle.css">
<link rel="stylesheet" href="../css/contactus.css">

<style>
    .error {
        color: red;
    }
</style>



</head>
<body>



<section class="about" id="contact">

<div class="flex">

   <div class="image">
      <img src="../resource/contact.jpg" alt="">
   </div>

   <div class="content">
      <h3>Contact Us</h3>
      <p?>leave us a message:</p>


      <?php 
                         $Messege = "";
                         if(isset($_GET['error']))
                         {
                             $Messege = " Please Fill in the Blanks ";
                             echo '<div class="alert alert-danger">'.$Messege.'</div>';
                         }

                         if(isset($_GET['success']))
                         {
                             $Messege = " Your Message Has Been Sent ";
                             echo '<div class="alert alert-success">'.$Messege.'</div>';
                         }
                     
                     ?>



<form id="myForm" action="https://api.web3forms.com/submit" method="POST">

  <input type="hidden" name="access_key" value="728f8076-46ae-43e1-91b3-435ab063c61b">

  <input type="hidden" name="from_name" value="Campamento">

  
     <label for="name">Name</label>
     <input type="text" id="name" name="name" placeholder="Your name..">
     
     <div id="emailError" class="error"></div>

     <label for="email"><b>Email</b></label>
 <input type="text" id="email" placeholder="Your E-mail.." name="email" required>
 

     <label for="subject">Messege</label>
     <textarea id="subject" name="subject" placeholder="Your Messege" style="height:100px"></textarea>
     
     <div id="emailError" class="error"></div>

     <div class="h-captcha" data-captcha="true"></div>


     <input type="submit" value="Submit">
   </form>
   <div id="result"></div>
   <script src="https://web3forms.com/client/script.js" async defer></script>




   <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var emailInput = document.getElementById('email');
            var emailError = document.getElementById('emailError');
            var email = emailInput.value.trim();

            // Regular expression for email validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                event.preventDefault(); // Prevent form submission
                emailError.textContent = 'Invalid email address';
                emailInput.focus();
            } else {
                emailError.textContent = '';
            }
        });
      </script>

   </div>

</div>

</section>

</body>



</html>
