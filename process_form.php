<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: error.html"); // Redirect to an error page if the email is not valid
        exit(); // Exit to stop further execution
    }

    // Replace with your email address
    $to = "your_email@example.com";
    $subject = "Contact Us Form Submission from $name";
    $headers = "From: $email";

    // Attempt to send the email
    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        echo "success"; // Return "success" to indicate successful submission
    } else {
        echo "error"; // Return "error" to indicate an issue with sending the email
    }
} else {
    header("Location: index.html"); // Redirect if accessed directly without form submission
}
?>