<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        $to      = "22am1a3122@svrec.ac.in";  // Replace with your actual email
        $subject = "New Contact Form Submission";

        $body = "You have received a new message from your website contact form.\n\n" .
                "Name: $name\n" .
                "Email: $email\n" .
                "Phone: $phone\n" .
                "Message:\n$message";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Sorry, something went wrong. Please try again later.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
} else {
    echo "Invalid request.";
}
?>
