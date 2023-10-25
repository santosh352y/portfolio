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
        // Send confirmation email to you
        $to = "santosh352y@gmail.com"; // Updated with your actual email address
        $subject = "Contact Form Submission from Your Website";
        $message_body = "Name: $name\n"
                     . "Email: $email\n"
                     . "Message:\n$message";

        $headers = "From: $email";

        // Send confirmation email to the sender
        $sender_subject = "Confirmation of Your Form Submission";
        $sender_message = "Dear $name,\n\nThank you for submitting the form. We have received your message and will get back to you soon.\n\nSincerely, YadavG.com";

        // Send emails
        if (mail($to, $subject, $message_body, $headers) && mail($email, $sender_subject, $sender_message)) {
            echo "Form submitted successfully. You will receive a confirmation email.";
            echo '<p>Redirecting to homepage in <span id="countdown">5</span> seconds.</p>';
            echo '<button id="redirectButton" onclick="window.location.href = \'index.html\';">Go to Homepage</button>';

            echo '<script>
                var countdown = 5;
                var countdownElement = document.getElementById("countdown");
                var redirectButton = document.getElementById("redirectButton");

                function updateCountdown() {
                    countdown--;
                    countdownElement.innerText = countdown;
                    if (countdown <= 0) {
                        window.location.href = "index.html";
                    }
                }

                var countdownInterval = setInterval(updateCountdown, 1000);
            </script>';
        } else {
            echo "Error sending email. Please try again later.";
        }
    }
}
?>
