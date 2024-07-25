<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $firstName = filter_var($_POST['conName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['conLName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['conEmail'], FILTER_VALIDATE_EMAIL);
    $phone = filter_var($_POST['conPhone'], FILTER_SANITIZE_STRING);
    $service = filter_var($_POST['conService'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['conMessage'], FILTER_SANITIZE_STRING);

    // Check if any field is empty
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($service) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare the email
    $to = "zahraejaz77@gmail.com";
    $subject = "Contact Form Submission";
    $body = "Name: $firstName $lastName\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send the message.";
    }
} else {
    echo "Invalid request method.";
}
?>
