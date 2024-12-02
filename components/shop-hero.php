<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("shop-style.php"); ?>
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

    .product,
    .product2,
    .product3 {
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

    /* Smaller images for the carousel */
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
                <div class="product" data-bs-toggle="modal" data-bs-target="#productModal1">
                    <div class="product-title">
                        <h1>Product Title 1</h1>
                    </div>
                    <div class="product-description">
                        <p>This is a product description.</p>
                    </div>
                    <div class="product-image">
                        <img src="assets/images/CompanyLogo/logo.png" alt="Product">
                    </div>
                </div>
                <div class="product2" data-bs-toggle="modal" data-bs-target="#productModal2">
                    <div class="product-title">
                        <h1>Product Title 2</h1>
                    </div>
                    <div class="product-description">
                        <p>This is a product description.</p>
                    </div>
                    <div class="product-image">
                        <img src="assets/images/CompanyLogo/logo.png" alt="Product">
                    </div>
                </div>
                <div class="product3" data-bs-toggle="modal" data-bs-target="#productModal3">
                    <div class="product-title">
                        <h1>Product Title 3</h1>
                    </div>
                    <div class="product-description">
                        <p>This is a product description.</p>
                    </div>
                    <div class="product-image">
                        <img src="assets/images/CompanyLogo/logo.png" alt="Product">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Product Modals -->

    <!-- Product 1 Modal -->
    <div class="modal fade" id="productModal1" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel1">Product Title 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="productCarousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets\images\Hero\Hero.png" class="d-block w-100" alt="Product Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/Roses/Rose1.png" class="d-block w-100" alt="Product Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/CompanyLogo/logo.png" class="d-block w-100"
                                    alt="Product Image 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="product-description">
                        <p>This is a detailed product description for Product 1.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 2 Modal -->
    <div class="modal fade" id="productModal2" tabindex="-1" aria-labelledby="productModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel2">Product Title 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="productCarousel2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/Roses/productrose1.png" class="d-block w-100"
                                    alt="Product Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/Roses/Rose1.png" class="d-block w-100" alt="Product Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/CompanyLogo/logo.png" class="d-block w-100"
                                    alt="Product Image 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel2"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel2"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="product-description">
                        <p>This is a detailed product description for Product 2.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 3 Modal -->
    <div class="modal fade" id="productModal3" tabindex="-1" aria-labelledby="productModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel3">Product Title 3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="productCarousel3" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/Roses/productrose1.png" class="d-block w-100"
                                    alt="Product Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/Roses/Rose1.png" class="d-block w-100" alt="Product Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/CompanyLogo/logo.png" class="d-block w-100"
                                    alt="Product Image 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel3"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel3"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="product-description">
                        <p>This is a detailed product description for Product 3.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>