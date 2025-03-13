<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);
    $marketing = isset($_POST["marketing"]) ? "Agreed" : "Not Agreed";

    // Your actual email
    $to = "codingprograms@outlook.com"; 
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $first_name $last_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Message:\n$message\n";
    $email_body .= "Marketing Consent: $marketing\n";

    // Send Email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    echo "Invalid request.";
}
?>
