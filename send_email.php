<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set the recipient email address (your email address)
    $to = "Danielasiamah2003@gmail.com";

    // Set the email subject
    $subject = "Contact Form Submission from $name";

    // Set the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    // Compose the email message
    $email_message = "Name: $name<br>";
    $email_message .= "Email: $email<br>";
    $email_message .= "Message: $message<br>";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo json_encode(array("status" => "success", "message" => "Email sent successfully."));
    } else {
        // Failed to send email
        echo json_encode(array("status" => "error", "message" => "Failed to send email."));
    }
} else {
    // Invalid request method
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
