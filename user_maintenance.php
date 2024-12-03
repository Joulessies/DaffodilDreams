<?php
include("includes\db.php");
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: black;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">User Maintenance System</h1>

        <!-- Add User Form -->
        <form action="user_maintenance_process.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>

        <hr>

        <!-- Users List -->
        <h3 class="mt-5">Users List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['NAME']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>