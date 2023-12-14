<?php

    $servername = "sql313.infinityfree.com";
    $db_username = "if0_35607719";
    $db_password = "UXgEiV314ah2aCZ";
    $dbname = "if0_35607719_users";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection Unsuccessful");
    }

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];
    $emailInput = $_POST['email'];

    $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $usernameInput, $emailInput, $passwordHash);

    if ($stmt->execute() === TRUE) {
        $redirect_url = "main.html";
	header("Location: " . $redirect_url);
	exit();
    } else {
        echo "Error creating account. Please try again later.";
    }

    $stmt->close();
    $conn->close();

?>