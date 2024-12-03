<?php
include("includes\db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"] ? password_hash($_POST["password"], PASSWORD_DEFAULT) : null;

    if ($password) {
        $query = "UPDATE users SET NAME = '$name', email = '$email', PASSWORD = '$password' WHERE id = $id";
    } else {
        $query = "UPDATE users SET NAME = '$name', email = '$email' WHERE id = $id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: user_maintenance.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>