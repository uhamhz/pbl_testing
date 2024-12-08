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

    public function getJumlahAdmin()
    {
        $this->db = new Connection;
        $stmt = "SELECT COUNT(*) AS jumlah FROM users WHERE role = 'admin'";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        return $row['jumlah'];
    }

    public function getJumlahSantri()
    {
        $this->db = new Connection;
        $stmt = "SELECT COUNT(*) AS jumlah FROM users WHERE role = 'santri'";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        return $row['jumlah'];
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

    public function getUstadzData()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM users WHERE role = 'ustadz'";
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

    public function postEditUser($id, $data)
    {
        $this->db = new Connection;

        // Mengupdate hanya jika password diubah
        $stmt = "UPDATE users SET nama_lengkap = ?, email = ?, role = ?, alamat = ?, no_hp = ? WHERE id = ?";

        // Jika password diubah
        if (!empty($data['password'])) {
            $stmt = "UPDATE users SET nama_lengkap = ?, email = ?, password = ?, role = ?, alamat = ?, no_hp = ? WHERE id = ?";
            $params = [
                $data['nama_lengkap'],
                $data['email'],
                password_hash($data['password'], PASSWORD_BCRYPT), // Hash password
                $data['role'],
                $data['alamat'],
                $data['no_hp'],
                $id
            ];
        } else {
            $params = [
                $data['nama_lengkap'],
                $data['email'],
                $data['role'],
                $data['alamat'],
                $data['no_hp'],
                $id
            ];
        }

        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        if ($result === false) {
            return false;
        }

        return true;
    }

    public function deleteUser($id)
    {
        // Membuat koneksi
        $this->db = new Connection;

        // Menyiapkan query SQL dengan placeholder tanda tanya (?)
        $stmt = "DELETE FROM users WHERE id = ?";

        // Menyiapkan query dengan parameter numerik
        $query = sqlsrv_prepare($this->db->conn, $stmt, array($id));

        // Mengecek jika query gagal disiapkan
        if ($query === false) {
            return false;
        }

        // Mengeksekusi query
        $result = sqlsrv_execute($query);

        // Mengecek apakah eksekusi berhasil
        if ($result === false) {
            return false;
        }

        return true;
    }
    public function tambahDataUsers($data)
    {
        // Pastikan koneksi database
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }


        $query = "INSERT INTO users (email, nama_lengkap, alamat, no_hp, role, password) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $params = array(
            $data['email'],
            $data['nama_lengkap'],
            $data['alamat'],
            $data['no_hp'],
            $data['role'],
            $data['password']
        );

        $stmt = sqlsrv_query($this->db->conn, $query, $params);

        if ($stmt === false) {
            // Tampilkan error database untuk diagnosa
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true));
            return false;
        }

        return true;
    }

    public function editDataUser($data, $id)
    {
        // Pastikan koneksi database
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }

        // Query dasar untuk update data user
        $query = "UPDATE users 
              SET email = ?, 
                  nama_lengkap = ?, 
                  alamat = ?, 
                  no_hp = ?, 
                  role = ?,
                  picture = ?";  // Menambahkan kolom picture

        // Parameter untuk query
        $params = [
            $data['email'],
            $data['nama_lengkap'],
            $data['alamat'],
            $data['no_hp'],
            $data['role'],
            $data['picture']  // Menambahkan path gambar profil
        ];

        // Jika ada perubahan password, tambahkan ke query dan params
        if (!empty($data['password'])) {
            $query .= ", password = ?";
            $params[] = $data['password'];
        }

        // Menambahkan WHERE clause
        $query .= " WHERE id = ?";
        $params[] = $id;

        // Eksekusi query
        $stmt = sqlsrv_query($this->db->conn, $query, $params);

        // Cek apakah query berhasil
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));  // Menampilkan error jika query gagal
        }

        return true;  // Jika berhasil, return true
    }


}
?>