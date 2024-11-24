<?php
include('../includes/db.php');

// Add user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Edit user
if (isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete user
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Maintenance</title>
</head>

<body>
    <h1>User Maintenance</h1>

    <!-- Add user form -->
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="email" name="email" placeholder="Email"><br>
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit" name="add_user">Add User</button>
    </form>

    <h2>Existing Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
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