<?php
class UserModel
{
    private $db;

    public function getAllDataUser()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAdminData()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users WHERE role = 'admin'";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getSantriData()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users WHERE role = 'santri'";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }


    public function getUserData($email)
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users where email = '$email'";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users WHERE email = ? AND password = ?";
        $params = [$email, $password];

        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        if ($result === false) {
            return false;
        }

        $user = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $user ? $user : false;
    }
}
?>