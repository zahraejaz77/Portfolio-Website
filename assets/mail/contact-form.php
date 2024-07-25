<?php
// Get form data
$conName = $_POST['conName'];
$conLName = $_POST['conLName'];
$conEmail = $_POST['conEmail'];
$conPhone = $_POST['conPhone'];
$conService = $_POST['conService'];
$conMessage = $_POST['conMessage'];

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the recipient email address
$recipient = "zahraejaz77@gmail.com";

// Set the email subject
$subject = "New message from your website contact form";

// Email Header
$head = "You have a new message from your website Contact Form\n=============================";

// Build the email content
$form_content = "$head\n\n";
$form_content = "Full Name: $conName $conLName\n";
$form_content = "Email: $conEmail\n";
$form_content = "Phone: $conPhone\n";
$form_content = "Service: $conService\n";
$form_content = "Message: \n$conMessage\n";

// Build the email headers
$headers = "From: $conName <$conEmail>\r\n" .
  "Reply-To: $conEmail\r\n" .
  'X-Mailer: PHP/' . phpversion();

// Send the email
if (mail($recipient, $subject, $form_content, $headers)) {
  echo "Y";
} else {
  echo "N";
}
?>
