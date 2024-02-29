<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Format the email message
$to = 'nimeshalakshani1114@gmail.com'; // Replace with the admin's email address
$subject = 'New Contact Form Submission';
$body = "Name: $name\nEmail: $email\nMessage:\n$message";

// Send email
if (mail($to, $subject, $body)) {
    // Email sent successfully
    echo "Thank you for your message. We will get back to you soon.";
} else {
    // Failed to send email
    echo "Oops! Something went wrong. Please try again later.";
}
?>

