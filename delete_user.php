<?php
include("includes/db.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Check if the user exists
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Delete the user
        $delete_query = "DELETE FROM users WHERE id = '$user_id'";
        if (mysqli_query($conn, $delete_query)) {
            // Redirect to user maintenance page with success message
            header("Location: user_maintenance.php?status=deleted");
            exit();
        } else {
            // Error deleting user
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        // User not found
        echo "User not found!";
    }
} else {
    // No user ID provided
    echo "No user ID provided!";
}
?>