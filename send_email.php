<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST['name']));
    $email = strip_tags(trim($_POST['email']));
    $message = strip_tags(trim($_POST['message']));

    // Validate form data (important!)
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error-message">Please fill in all fields correctly.</div>';
        exit;
    }

    $to = "your_email@example.com"; // Replace with your email address
    $subject = "Website Contact Form Submission from " . $name;
    $body = "Name: " . $name . "\nEmail: " . $email . "\n\nMessage:\n" . $message;
    $headers = "From: " . $email;

    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="success-message">Thank you for your message!</div>';
    } else {
        echo '<div class="error-message">Oops! Something went wrong. Please try again later.</div>';
    }
} else {
    // Handle cases where the form isn't submitted via POST
    echo '<div class="error-message">There was a problem with your submission.</div>';
}
?>