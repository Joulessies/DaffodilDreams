<?php
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'create') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_error = $_FILES['image']['error'];

    $upload_directory = "uploads/";

    if ($image_error === 0) {
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array(strtolower($image_extension), $valid_extensions)) {
            $new_image_name = uniqid("img_", true) . "." . $image_extension;
            $image_path = $upload_directory . $new_image_name;

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $sql = "INSERT INTO products (title, description, price, image) 
                        VALUES ('$title', '$description', '$price', '$image_path')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>New product added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error uploading the image. Please try again.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid image type. Only JPG, JPEG, PNG, GIF allowed.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error in file upload.</div>";
    }
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
        text-align: center;
    }

    .btn-custom {
        background-color: #007bff;
        color: white;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .alert {
        margin-top: 15px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-4">File Maintenance System</h1>

        <div class="form-container">
            <h3>Create New Product</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="create">
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" required>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
                <button type="submit" class="btn btn-custom">Add Product</button>
            </form>
        </div>

        <div class="mt-5">
            <h3>View Products</h3>
            <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><img src="<?php echo $row['image']; ?>" alt="Product Image" width="50"></td>
                        <td>
                            <a href="update_product.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-warning btn-sm">Update</a>
                            <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No products found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>