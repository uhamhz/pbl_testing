<?php 
require_once 'Model/UserModel.php';

class AuthController 
{
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                echo "All fields are required.";
                return;
            }

            $userModel = new UserModel();
            $result = $userModel->register($email, $password);

            if ($result === true) {
                echo "Registration successful!";
            } else {
                echo $result; // Display error message
                }
            }
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                echo "All fields are required.";
                return;
            }

            $userModel = new UserModel();
            $user = $userModel->login($email, $password);

            if ($user) {
                // Set user session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                echo "Login successful! Redirecting...";
                if ($user['role']=='admin') {
                    header("Location: /dashboard/admin"); // Redirect to the dashboard
                } else if ($user['role']=='santri') {
                    header("Location: /dashboard/santri"); // Redirect to the dashboard
                }
                
                exit;
            } else {
                echo "Invalid email or password.";
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login"); // Redirect to login page
        exit;
}
    
}
