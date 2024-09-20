<?php
  // Replace with your actual receiving email address
  $receiving_email_address = 'patilswapnil5090@gmail.com';

  // Get POST data from the form
  $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
  $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
  $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
  $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

  // Validate input data
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'All fields are required.';
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email format.';
    exit;
  }

  // Create the email content
  $email_subject = 'Contact Form Submission: ' . $subject;
  $email_body = "You have received a new message from the contact form.\n\n";
  $email_body .= "Name: $name\n";
  $email_body .= "Email: $email\n";
  $email_body .= "Message:\n$message\n";

  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Send the email
  $mail_sent = mail($receiving_email_address, $email_subject, $email_body, $headers);

  if ($mail_sent) {
    echo 'Your message has been sent successfully.';
  } else {
    echo 'There was a problem sending your message. Please try again later.';
  }
?>
error_log("Mail sent: " . ($mail_sent ? "Success" : "Failure"));
