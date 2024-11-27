<?php 
class UserModel{
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
}
?>