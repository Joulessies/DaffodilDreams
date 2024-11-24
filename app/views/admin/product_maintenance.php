<?php
include('../includes/db.php');

// Add product
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

    $sql = "INSERT INTO products (name, price, description, image) VALUES ('$name', '$price', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Edit product
if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

    $sql = "UPDATE products SET name='$name', price='$price', description='$description', image='$image' WHERE id=$product_id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete product
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id=$product_id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Maintenance</title>
</head>

<body>
    <h1>Product Maintenance</h1>

    <!-- Add Product Form -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="file" name="image"><br>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <h2>Existing Products</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><img src="../images/<?php echo $row['image']; ?>" width="50" /></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>