<?php
include("includes\db.php");

$id = intval($_GET["id"]);
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User not found.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
    body {
        background-color: black;
        color: white;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Edit User</h1>
        <form action="edit_user_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['NAME']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="text-muted">Leave blank to keep the current password.</small>
            </div>
            <button type="submit" class="btn btn-success">Update User</button>
        </form>
    </div>
</body>

</html>