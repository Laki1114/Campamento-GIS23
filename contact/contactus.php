<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'campamento';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    // Validate inputs (implement your own validation)

    // Insert data into the database
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Send email to admin
        //Load Composer's autoloader
        require '../libraries/phpmailer/vendor/autoload.php';


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'campamentoservices@gmail.com';                     //SMTP username
            $mail->Password   = 'bbyk sczf xnbi adiw';                               //SMTP password
           $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
           $mail->Port       = 587;   
          
           $mail->SMTPDebug = 0;
           
            //Recipients
         $mail->setFrom('campamentoservices@gmail.com', 'Campamento');
            $mail->addAddress($email, $name);     //Add a recipient
        
           


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
          //  echo 'Message has been sent';
        } catch (Exception $e) {
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

       // echo "Message sent successfully!";


    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>






<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <input type="email" name="email" placeholder="Your Email" required><br>
    <input type="text" name="subject" placeholder="Subject" required><br>

    <textarea name="message" placeholder="Your Message" required></textarea><br>
    <input type="submit" value="Submit">
</form>
