<?php

$selectedEmails = array('user1@example.com', 'user2@example.com');

$senderEmail = 'your_email@example.com';

$subject = 'Your Subject';

$message = 'This is the content of your email.';

$headers = 'From: ' . $senderEmail . "\r\n" .
    'Reply-To: ' . $senderEmail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

foreach ($selectedEmails as $toEmail) {
    mail($toEmail, $subject, $message, $headers);
}

function retrieveEmailsFromDatabase() {
    
    return array('user3@example.com', 'user4@example.com');
}
?>
