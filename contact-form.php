<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Recipient email address
    $to = "tripleupdigital@gmail.com"; 
    $subject = "$subject";

    // Email headers
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Email body
    $body = "You have received a new message from the contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Phone: $phone\n\n".
            "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $name. Your message has been sent!";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
}
?>
