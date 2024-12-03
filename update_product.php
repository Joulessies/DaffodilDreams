<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image_path = $product['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array(strtolower($image_extension), $valid_extensions)) {
            $new_image_name = uniqid("img_", true) . "." . $image_extension;
            $image_path = "uploads/" . $new_image_name;
            move_uploaded_file($image_tmp_name, $image_path);

            // Remove old image file if it exists
            if (file_exists($product['image'])) {
                unlink($product['image']);
            }
        }
    }

    $sql = "UPDATE products SET title = ?, description = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $title, $description, $price, $image_path, $product_id);

    if ($stmt->execute()) {
        // Redirect to create_product.php after update
        header('Location: create_product.php');
        exit(); // Make sure to exit after header redirect
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-4">Update Product</h1>

        <div class="form-container">
            <h3>Update Product Details</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="<?php echo $product['title']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"
                        required><?php echo $product['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price"
                        value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Upload New Image (optional)</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <p><strong>Current Image:</strong> <img src="<?php echo $product['image']; ?>" alt="Product Image"
                            width="50"></p>
                </div>
                <button type="submit" class="btn btn-custom">Update Product</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>