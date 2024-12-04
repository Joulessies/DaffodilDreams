 <?php
session_start();
include('./includes/db.php');  

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $email = $conn->real_escape_string($email);  // Sanitize input to prevent SQL injection

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);  // Bind the email parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {  // Verify the hashed password
            $_SESSION['user'] = $user;  // Store user data in the session
            header("Location: index.php");  // Redirect to the homepage
            exit();  // Stop further script execution
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}

// Handle sign-up
if (isset($_POST['signup'])) {
    $name = $_POST['signupName'];
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $name = $conn->real_escape_string($name);  // Sanitize input
    $email = $conn->real_escape_string($email);  // Sanitize input
    $password = $conn->real_escape_string($password);  // Sanitize input

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Email is already taken.";
    } else {
        // Hash the password before saving it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            $success = "Registration successful! You can log in now.";
        } else {
            $error = "Error: " . $conn->error;  // Show error if insertion fails
        }
    }
}

// Get the logged-in user data (if available)
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// Get cart items for display
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net /npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </head>

 <body>

     <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
         <strong>Success!</strong> You have successfully signed in.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container">
             <img src="assets/images/CompanyLogo/logo.png" alt="Company Logo" class="navbar-brand"
                 style="width: 200px; z-index: 1;">
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                 aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse d-flex justify-content-between w-100" id="navbarNav">
                 <div class="mx-auto">
                     <ul class="navbar-nav">
                         <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                         <li class="nav-item"><a class="nav-link" href="shop.php"><span
                                     class="highlight">Shop</span></a>
                         </li>
                         <li class="nav-item"><a class="nav-link" href="#">Staff</a></li>
                         <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                                 data-bs-target="#signupModal">Sign Up</a></li>
                         <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                                 data-bs-target="#loginModal">Login</a></li>
                     </ul>
                 </div>

                 <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="modal"
                     data-bs-target="#searchModal">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                         <path
                             d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                     </svg>
                 </button>

                 <div class="nav-icons d-flex align-items-center">
                     <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="modal"
                         data-bs-target="#profileModal" id="profileButton">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-person-fill" viewBox="0 0 16 16">
                             <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                         </svg>
                     </button>

                     <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="modal"
                         data-bs-target="#favoritesModal">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-heart" viewBox="0 0 16 16">
                             <path
                                 d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                         </svg>
                     </button>

                     <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="modal"
                         data-bs-target="#cartModal">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-cart" viewBox="0 0 16 16">
                             <path
                                 d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                         </svg>
                     </button>
                 </div>
             </div>
         </div>
     </nav>

     <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body" id="modalCartContent">
                     <?php if (empty($cartItems)): ?>
                     <p>Your cart is empty.</p>
                     <?php else: ?>
                     <ul class="list-group">
                         <?php foreach ($cartItems as $item): ?>
                         <li class="list-group-item">Product ID: <?= htmlspecialchars($item); ?></li>
                         <?php endforeach; ?>
                     </ul>
                     <?php endif; ?>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Proceed to Checkout</button>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body" id="modalCartContent">
                     <p>Your cart is empty.</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Proceed to Checkout</button>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="favoritesModal" tabindex="-1" aria-labelledby="favoritesModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="favoritesModalLabel">Favorites</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body" id="modalFavoritesContent">
                     <p>Your favorites list is empty.</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>

     <!-- Login Modal -->
     <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="loginModalLabel">Login</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                         <div class="mb-3">
                             <label for="loginEmail" class="form-label">Email address</label>
                             <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                         </div>
                         <div class="mb-3">
                             <label for="loginPassword" class="form-label">Password</label>
                             <input type="password" class="form-control" id="loginPassword" name="loginPassword"
                                 required>
                         </div>
                         <button type="submit" class="btn btn-primary" name="login">Login</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <!-- Sign Up Modal -->
     <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                         <div class="mb-3">
                             <label for="signupName" class="form-label">Full Name</label>
                             <input type="text" class="form-control" id="signupName" name="signupName" required>
                         </div>
                         <div class="mb-3">
                             <label for="signupEmail" class="form-label">Email address</label>
                             <input type="email" class="form-control" id="signupEmail" name="signupEmail" required>
                         </div>
                         <div class="mb-3">
                             <label for="signupPassword" class="form-label">Password</label>
                             <input type="password" class="form-control" id="signupPassword" name="signupPassword"
                                 required>
                         </div>
                         <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <!-- Profile Modal -->
     <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <?php if ($user): ?>
                     <p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                     <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                     <form action="logout.php" method="POST">
                         <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                     </form>
                     <?php else: ?>
                     <p>Please log in to view your profile.</p>
                     <?php endif; ?>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>


     <!-- Search Modal -->
     <div id="search-modal" class="modal">
         <div class="modal-content">
             <span id="close-modal" class="close">&times;</span>
             <form action="search.php" method="GET">
                 <input type="text" name="query" placeholder="Search..." class="search-input" />
                 <button type="submit" class="search-btn">Search</button>
             </form>
         </div>
     </div>

     <script src="assets\js\navbar.js"></script>

 </body>

 </html>