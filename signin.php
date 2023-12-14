<?php

$servername = "sql313.infinityfree.com";
$db_username = "if0_35607719";
$db_password = "UXgEiV314ah2aCZ";
$dbname = "if0_35607719_users";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection Unsuccessful");
}

$usernameOrEmail = $_POST['usernameOrEmail'];
$passwordInput = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? OR email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    if (password_verify($passwordInput, $hashedPassword)) {
        
        echo "Authentication successful. Welcome, " . $row['username'];
    } else {
        
        echo "Authentication failed. Incorrect password.";
    }
} else {
    
    echo "Authentication failed. User not found.";
}

$stmt->close();
$conn->close();
?>