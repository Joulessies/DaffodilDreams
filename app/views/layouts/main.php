<?php
    include("./config/config.php");

    session_start();

    $stored_username = "admin";
    $stored_hashed_password = password_hash("password", PASSWORD_DEFAULT); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $stored_username && password_verify($password, $stored_hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: /index.php"); 
        } else {
            $_SESSION['error'] = "Invalid username or password.";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Navigation/navigation.css">
    <style>
    * {
        padding: 0;
        margin: 0;
        list-style: none;
        text-decoration: none;
    }

    nav {
        background-color: #f2f2f2;
        position: relative;
        z-index: 1;
        border-bottom: 1px solid black;
    }

    .container {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .nav-links {
        position: absolute;
        top: 0;
        left: 0;
    }

    .nav-links ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        display: flex;
        align-items: flex-start;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .form-control {
        height: 40px;
    }

    img {
        display: block;
        max-width: 300px;
        position: relative;
        top: 28px;
    }

    .right-nav-item {
        position: relative;
        left: 600px;
    }

    /* Hero */
    .hero {
        background-color: #FDD6D6;
        height: 30rem;
    }

    .carousel {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .images-counter {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        max-width: 100%;
        gap: 15px;
        height: auto;
    }

    .images-counter img {
        max-width: 13%;
        height: auto;
        border: 2px solid black;
        transition: border 0.3s ease;
    }

    .images-counter img:hover {
        border: 4px solid #000;
    }

    .ourproducts {
        background-color: azure;
        width: 100%;
        height: auto;
        padding: 20px 0;
    }

    .ourproducts h3 {
        padding: 40px;
        text-align: center;
    }

    .card {
        margin: 15px 0;
    }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="images/CompanyLogo/logo.svg" alt="Company Logo" class="navbar-brand">
            <div class="collapse navbar-collapse">
                <div class="nav-links">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="ourproducts.html">Our Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Our Staff</a></li>
                        <li class="right-nav-item"><a class="nav-link" href="#" data-toggle="modal"
                                data-target="#signupModal">Sign Up</a></li>
                        <li class="right-nav-item"><a class="nav-link" href="#" data-toggle="modal"
                                data-target="#loginModal">Login</a></li>
                    </ul>
                </div>
                <div class="mx-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" aria-label="Search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="nav-icons d-flex align-items-center" style="gap: 10px;">
                    <button class="btn btn-outline-secondary" type="button" title="Favorites" aria-label="Favorites">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                        </svg>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" title="Cart" aria-label="Cart"
                        data-toggle="modal" data-target="#cartModal">
                        <svg xmlns="http://www ```html
                            .w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero  -->
    <section class="hero">
        <div class="images-counter">
            <img src="images/Tulips/tulip1.png" class="rounded float-start" alt="tulip">
            <img src="images/Roses/Rose1.png" class="rounded float-start" alt="rose">
            <img src="images/Sunflowers/Sunflower1.png" class="rounded float-start" alt="sunflower">
            <img src="images/FlowerBouquet/Flowerbouquet1.png" class="rounded float-start" alt="bouquets">
            <img src="images/Carnations/Carnation1.png" class="rounded float-start" alt="carnation">
        </div>
    </section>

    <section class="ourproducts">
        <div>
            <h3 class="Product-Title">Our Products</h3>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/Roses/Rose5.png" class="card-img-top" alt="Product 1" id="image">
                        <div class="card-body">
                            <h5 class="card-title">Product 1</h5>
                            <p class="card-text">Description of Product 1. This is a brief overview of the
                                product.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#product1Modal">View
                                Details</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/Roses/Rose2.png" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <p class="card-text">Description of Product 2. This is a brief overview of the
                                product.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#product2Modal">View
                                Details</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/FlowerBouquet/flowerbouquet2.png" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product 3</h5>
                            <p class="card-text">Description of Product 3. This is a brief overview of the
                                product.</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#product3Modal">View
                                Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modals -->
    <!-- Product 1 Modal -->
    <div class="modal fade" id="product1Modal" tabindex ```html="-1" role="dialog" aria-labelledby="product1ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product1ModalLabel">Product 1 Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Here are the detailed specifications and features of Product 1.</p>
                    <button class="btn btn-success" id="addToCartBtn1">Add to Cart</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 2 Modal -->
    <div class="modal fade" id="product2Modal" tabindex="-1" role="dialog" aria-labelledby="product2ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product2ModalLabel">Product 2 Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Here are the detailed specifications and features of Product 2.</p>
                    <button class="btn btn-success" id="addToCartBtn2">Add to Cart</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 3 Modal -->
    <div class="modal fade" id="product3Modal" tabindex="-1" role="dialog" aria-labelledby="product3ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product3ModalLabel">Product 3 Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Here are the detailed specifications and features of Product 3.</p>
                    <button class="btn btn-success" id="addToCartBtn3">Add to Cart</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Cart Items will be displayed here -->
                    <div id="cartItemsContainer">
                        <p>Your cart is currently empty.</p>
                    </div>
                    <div id="cartTotal">
                        <p>Total: $0.00</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="checkoutBtn">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <!-- Display error message if it exists -->
                        <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="signupUsername">Username</label>
                            <input type="text" class="form-control" id="signupUsername" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="signupEmail">Email</label>
                            <input type="email" class="form-control" id="signupEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="signupPassword">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="signupConfirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="signupConfirmPassword"
                                name="confirm_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>