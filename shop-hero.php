<?php
include('./includes/db.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .shop-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        text-align: center;
        padding-top: 20px;
    }

    .shop-background {
        background-color: bisque;
        padding: 20px;
        width: 1300px;
        height: 800px;
        border-radius: 20px;
        border: 1px solid black;
    }

    .products-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
        cursor: pointer;
    }

    .product {
        background-color: aliceblue;
        padding: 10px;
    }

    .product-title h1,
    .product-description p {
        font-size: 14px;
        margin: 0;
    }

    .product-title {
        padding: 5px;
    }

    .product-description {
        padding: 5px;
    }

    .product-image {
        padding: 5px;
    }

    .product-image img {
        max-width: 150px;
        height: auto;
    }

    #productCarousel img {
        max-width: 300px;
        height: auto;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="shop-container">
        <section class="shop-background">
            <div class="products-grid">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imagePath = "uploads/" . $row['image'];
                        echo '
                        <div class="product" data-bs-toggle="modal" data-bs-target="#productModal' . $row['id'] . '">
                            <div class="product-title">
                                <h1>' . $row['title'] . '</h1>
                            </div>
                            <div class="product-description">
                                <p>' . substr($row['description'], 0, 100) . '...</p>
                            </div>
                            <div class="product-image">
                                <img src="' . $imagePath . '" alt="Product">
                                <p>Image Path: ' . $imagePath . '</p> <!-- Debugging line -->
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<p>No products available.</p>';
                }
                ?>
            </div>
        </section>
    </div>

    <?php
    $result->data_seek(0);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = "uploads/" . $row['image'];
            echo '
            <div class="modal fade" id="productModal' . $row['id'] . '" tabindex="-1" aria-labelledby="productModalLabel' . $row['id'] . '" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel' . $row['id'] . '">' . $row['title'] . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="productCarousel' . $row['id'] . '" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="' . $imagePath . '" class="d-block w-100" alt="Product Image">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel' . $row['id'] . '" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel' . $row['id'] . '" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <p>' . $row['description'] . '</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>