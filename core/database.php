<?php

class Database
{
    private $host = 'LAPTOP-V6CM8SFG';  // Replace with your server hostname
    private $port = 1433;       // Default SQL Server port
    private $db = 'pesantren'; // Replace with your database name
    private $user = 'root'; // Replace with your username
    private $password = ''; // Replace with your password
    private $charset = 'utf8';    // Character set
    private $conn;

    public function connect()
    {
        try {
            $dsn = "sqlsrv:Server={$this->host},{$this->port};Database={$this->db};";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->conn = new PDO($dsn, $this->user, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}