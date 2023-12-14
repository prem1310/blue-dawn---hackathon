<?php
// This is a basic example for user authentication, replace this with proper authentication logic
$validUsername = 'demo@example.com'; // Replace with your valid username
$validPassword = 'password123'; // Replace with your valid password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    if ($username === $validUsername && $password === $validPassword) {
        // Authentication successful, redirect or perform actions here
        echo '<script>alert("Authentication successful!"); window.location.replace("dashboard.html");</script>';
        // Replace 'dashboard.html' with the actual destination after successful authentication
    } else {
        // Authentication failed, show error message or redirect to login again
        echo '<script>alert("Invalid credentials!"); window.location.replace("index.html");</script>';
        // Redirect back to the login page
    }
}
?>
