<?php


require_once '../models/User.php';

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function showSignupForm() {
        include '../views/signup.php'; 
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['signup_username'];
            $email = $_POST['signup_email'];
            $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);

            $user = new User($this->db);

            
            if ($user->emailExists($email)) {
                echo "Email already exists!";
                return;
            }

            // Create the user
            if ($user->create($username, $email, $password)) {
                echo "Signup successful!";
                header("Location: /index.php");
                exit();
            } else {
                echo "Signup failed!";
            }
        }
    }
}
?>