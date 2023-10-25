<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST['message'];

    // Send confirmation email
    $to = $email;
    $subject = "Form YadavG.com";
    $message_body = "Thank you for submitting the form!\n\n"
                 . "Name: $name\n"
                 . "Message: $message\n"  // Changed $contact to $message
                 . "Email: $email\n";
    $headers = "From: yadavg.com";  // Replace with your actual email address

    // Check if the email was sent successfully
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Form submitted successfully. You will receive a confirmation email.";
    } else {
        echo "Error sending email. Please try again later.";
    }
}
?>
