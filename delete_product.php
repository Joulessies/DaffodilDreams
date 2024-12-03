<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product to get the image path
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Delete the image file if it exists
        if (file_exists($product['image'])) {
            unlink($product['image']);
        }

        // Delete the product from the database
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            echo "<script>alert('Product deleted successfully.'); window.location.href='create_product.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error deleting the product.'); window.location.href='create_product.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Product not found.'); window.location.href='create_product.php';</script>";
        exit();
    }
}

$conn->close();