<?php
session_start();
include('./includes/db.php');  

if (isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $email = $conn->real_escape_string($email);
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}

if (isset($_POST['signup'])) {
    $name = $_POST['signupName'];
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Email is already taken.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            $success = "Registration successful! You can log in now.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

$cartItems = [];
if ($user) {
    $sql = "SELECT p.name, c.quantity, p.price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    $cartItems = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$favorites = [];
if ($user) {
    $sql = "SELECT p.name FROM favorites f JOIN products p ON f.product_id = p.id WHERE f.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    $favorites = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="assets/images/CompanyLogo/logo.png" alt="Company Logo" class="navbar-brand" style="width: 200px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between w-100" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                </ul>
                <?php if ($user): ?>
                <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a>
                <?php else: ?>
                <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="cartModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shopping Cart</h5>
                </div>
                <div class="modal-body">
                    <?php if (empty($cartItems)): ?>
                    <p>Your cart is empty.</p>
                    <?php else: ?>
                    <ul>
                        <?php foreach ($cartItems as $item): ?>
                        <li><?= htmlspecialchars($item['name']) ?> - <?= $item['quantity'] ?> x
                            $<?= number_format($item['price'], 2) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="favoritesModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Favorites</h5>
                </div>
                <div class="modal-body">
                    <?php if (empty($favorites)): ?>
                    <p>Your favorites list is empty.</p>
                    <?php else: ?>
                    <ul>
                        <?php foreach ($favorites as $item): ?>
                        <li><?= htmlspecialchars($item['name']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="loginEmail" class="form-control" placeholder="Email" required>
                        <input type="password" name="loginPassword" class="form-control mt-2" placeholder="Password"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="signupName" class="form-control" placeholder="Name" required>
                        <input type="email" name="signupEmail" class="form-control mt-2" placeholder="Email" required>
                        <input type="password" name="signupPassword" class="form-control mt-2" placeholder="Password"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profileModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile</h5>
                </div>
                <div class="modal-body">
                    <?php if ($user): ?>
                    <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Joined on:</strong> <?= htmlspecialchars($user['created_at'] ?? 'N/A') ?></p>
                    <p><strong>Favorites:</strong> <?= count($favorites) ?> items</p>
                    <form action="logout.php" method="POST">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    <?php else: ?>
                    <p>You are not logged in.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>