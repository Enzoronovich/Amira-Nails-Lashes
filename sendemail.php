<?php
require 'vendor/autoload.php'; // Include the Mailchimp library

use MailchimpMarketing\ApiClient;

// Initialize the Mailchimp API client
$mailchimp = new ApiClient();
$mailchimp->setConfig([
    'apiKey' => 'md-XxA5WQmXZNpq727CfOBi8A',
    'server' => 'https://us22.admin.mailchimp.com', // e.g., us5
]);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $recipient_email = $_POST['recipient_email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    try {
        // Prepare the email data
        $data = [
            'messages' => [
                [
                    'from_email' => 'your_email@example.com', // Sender's email
                    'subject' => $subject,
                    'html' => $body,
                    'to' => [
                        [
                            'email' => $recipient_email, // Recipient's email
                            'type' => 'to'
                        ]
                    ]
                ]
            ]
        ];

        // Send the email
        $response = $mailchimp->messages->send($data);

        // Check if the email was sent successfully
        if ($response['total_accepted_recipients'] > 0) {
            echo "<p>Email sent successfully!</p>";
        } else {
            echo "<p>Failed to send email.</p>";
        }
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}
?>
