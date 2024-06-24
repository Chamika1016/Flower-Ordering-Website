<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set up email variables
    $to = "chamikalakshitha935@gmail.com";  // Replace with your email address
    $subject = "New Message from $full_name";
    $headers = "From: $email";

    // Compose email message
    $email_message = "Name: $full_name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Send email
    mail($to, $subject, $email_message, $headers);

    // You can also redirect the user to a thank you page
    header("Location: index.php");
    exit();
}
?>