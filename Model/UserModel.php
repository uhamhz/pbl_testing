<?php
require_once 'Model/BaseModel.php';
class UserModel extends BaseModel
{
    public function register($email, $password)
    {
        try {
            // Check if the email is already in use
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->fetchColumn() > 0) {
                return "Email is already registered.";
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $stmt = $this->db->prepare("
                INSERT INTO users (email, password, role)
                VALUES (:email, :password, :role)
            ");
            $defaultRole = 'santri';
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':role', $defaultRole, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            // Check if the email exists in the database
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch();

            // Verify the password
            if ($user && password_verify($password, $user['password'])) {
                return $user; // Return user data if authentication succeeds
            }

            return false; // Invalid credentials
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

}
