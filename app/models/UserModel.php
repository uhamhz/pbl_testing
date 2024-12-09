<?php
class UserModel
{
    private $db;

    public function getAllDataUser()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetAllUsers";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Array untuk menampung hasil data
        $data = [];

        // Mengambil hasil query dan menambahkan ke array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }

    public function getAdminData()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetAdminData";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Array untuk menampung hasil data
        $data = [];

        // Mengambil hasil query dan menambahkan ke array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }

    public function getJumlahAdmin()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetJumlahAdmin";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Mengambil hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Mengembalikan jumlah admin
        return $row['jumlah'];
    }

    public function getJumlahSantri()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetJumlahSantri";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Mengambil hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Mengembalikan jumlah santri
        return $row['jumlah'];
    }

    public function getSantriData()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetSantriData";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Array untuk menampung hasil data
        $data = [];

        // Mengambil hasil query dan menambahkan ke array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }

    public function getUstadzData()
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetUstadzData";

        // Menjalankan query menggunakan sqlsrv_query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Array untuk menampung hasil data
        $data = [];

        // Mengambil hasil query dan menambahkan ke array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }

    public function getUserData($email)
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC GetUserDataByEmail @Email = ?";

        // Menyiapkan parameter untuk query
        $params = array($email);

        // Menjalankan query menggunakan sqlsrv_query dan passing parameter
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Array untuk menampung hasil data
        $data = [];

        // Mengambil hasil query dan menambahkan ke array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC GetUserByEmailAndPassword @Email = ?, @Password = ?";

        // Menyiapkan parameter untuk query
        $params = array($email, $password);

        // Menjalankan query menggunakan sqlsrv_query dan passing parameter
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa jika query berhasil
        if ($result === false) {
            return false;
        }

        // Mengambil hasil query
        $user = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Mengembalikan data pengguna atau false jika tidak ada data
        return $user ? $user : false;
    }

    public function deleteUser($id)
    {
        // Membuat koneksi ke database
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC DeleteUserById @UserId = ?";

        // Menyiapkan parameter untuk query
        $params = array($id);

        // Menjalankan query menggunakan sqlsrv_query dan passing parameter
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Mengecek jika query gagal dijalankan
        if ($result === false) {
            return false;
        }

        // Mengembalikan true jika berhasil menghapus
        return true;
    }

    public function tambahDataUsers($data)
    {
        // Pastikan koneksi database
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }

        // Menyiapkan query untuk memanggil stored procedure dengan parameter
        $query = "EXEC InsertUser @Email = ?, @NamaLengkap = ?, @Alamat = ?, @NoHp = ?, @Role = ?, @Password = ?";

        // Menyiapkan parameter untuk query
        $params = array(
            $data['email'],
            $data['nama_lengkap'],
            $data['alamat'],
            $data['no_hp'],
            $data['role'],
            $data['password']
        );

        // Menjalankan query menggunakan sqlsrv_query dan passing parameter
        $stmt = sqlsrv_query($this->db->conn, $query, $params);

        // Mengecek jika query gagal
        if ($stmt === false) {
            // Tampilkan error database untuk diagnosa
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true));
            return false;
        }

        // Mengembalikan true jika berhasil menambah data
        return true;
    }

    public function editDataUser($data, $id)
    {
        // Pastikan koneksi database
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }

        // Menyiapkan query untuk memanggil stored procedure dengan parameter
        $query = "EXEC UpdateUser 
                  @UserId = ?, 
                  @Email = ?, 
                  @NamaLengkap = ?, 
                  @Alamat = ?, 
                  @NoHp = ?, 
                  @Role = ?, 
                  @Picture = ?, 
                  @Password = ?";

        // Menyiapkan parameter untuk query
        $params = array(
            $id,                           // ID pengguna yang akan diupdate
            $data['email'],
            $data['nama_lengkap'],
            $data['alamat'],
            $data['no_hp'],
            $data['role'],
            !empty($data['picture']) ? $data['picture'] : NULL,  // Jika ada picture, kirimkan path, jika tidak, kirim NULL
            !empty($data['password']) ? $data['password'] : NULL  // Jika ada password, kirimkan password, jika tidak, kirim NULL
        );

        // Menjalankan query menggunakan sqlsrv_query dan passing parameter
        $stmt = sqlsrv_query($this->db->conn, $query, $params);

        // Mengecek jika query gagal
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));  // Menampilkan error jika query gagal
        }

        // Mengembalikan true jika berhasil mengedit data
        return true;
    }
}
?>