<?php
include("includes\db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    $query = "INSERT INTO users (NAME, email, PASSWORD) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        header("Location: user_maintenance.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>