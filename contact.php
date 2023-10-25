<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST['message'];

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please provide a valid email address.";
    } else {
        // Send confirmation email
        $to = "santosh352y@gmail.com"; // Updated with your actual email address
        $subject = "Contact Form Submission from Your Website";
        $message_body = "Name: $name\n"
                     . "Email: $email\n"
                     . "Message:\n$message";

        $headers = "From: $email";

        if (mail($to, $subject, $message_body, $headers)) {
            echo "Form submitted successfully. You will receive a confirmation email.";
            echo '<script>setTimeout(function() { window.location.href = "index.html"; }, 5000);</script>'; // Redirect to index.html after 5 seconds
        } else {
            echo "Error sending email. Please try again later.";
        }
    }
}
?>
