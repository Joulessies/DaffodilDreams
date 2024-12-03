<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Get the product details to delete the image file
    $sql = "SELECT image FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Delete the image file from the server
    if ($product) {
        $image_path = $product['image'];
        if (file_exists($image_path)) {
            unlink($image_path); // Remove the file
        }
    }

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Product deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting the product.</div>";
    }
}

$conn->close();
?>