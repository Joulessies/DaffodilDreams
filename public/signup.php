<?php
include("./config/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if ($password !== $confirm_password) {
        // Handle password mismatch
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: /signup.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email or username already exists.";
        exit();
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            
            $_SESSION['success'] = "Signup successful! You can now log in.";
            header("Location: /login.php");
        } else {
            // Handle error
            $_SESSION['error'] = "An error occurred. Please try again.";
            header("Location: /signup.php");
        }
    }
}
?>