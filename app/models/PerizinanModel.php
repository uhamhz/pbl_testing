<?php

class PerizinanModel
{
    private $db;



    public function getAllDataPerizinan()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM perizinan";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        // Mengambil semua data perizinan
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            // Mengambil nama santri berdasarkan user_id
            $user_id = $row['user_id'];
            $stmt_user = "SELECT nama_lengkap FROM users WHERE id = ?";
            $query_user = sqlsrv_prepare($this->db->conn, $stmt_user, array(&$user_id));
            $result_user = sqlsrv_execute($query_user);

            // Memeriksa apakah query berhasil
            if ($result_user === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            // Mengambil hasil nama santri
            $user_row = sqlsrv_fetch_array($query_user, SQLSRV_FETCH_ASSOC);
            $row['nama_lengkap'] = $user_row ? $user_row['nama_lengkap'] : 'Nama tidak ditemukan';

            // Menambahkan data perizinan ke array $data
            $data[] = $row;
        }

        return $data;
    }


    public function getPerizinanByEmail($email)
    {
        // Membuat koneksi database
        $this->db = new Connection;

        // Menyiapkan query untuk mengambil perizinan berdasarkan user_id
        $stmt = "SELECT id FROM users WHERE email = ?";
        $params = array($email);
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Debugging jika query gagal
        }

        // Ambil user_id berdasarkan email
        $user = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Jika tidak ada user ditemukan, return data kosong
        if (!$user) {
            return [];
        }

        $user_id = $user['id']; // Ambil user_id yang ditemukan

        // Query untuk mengambil perizinan berdasarkan user_id
        $stmt = "SELECT * FROM perizinan WHERE user_id = ?";
        $params = array($user_id);
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Debugging jika query gagal
        }

        $data = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row; // Menambahkan setiap baris data ke dalam array
        }

        return $data; // Mengembalikan data yang berhasil diambil
    }




    public function getJumlahIzinPending()
    {
        $this->db = new Connection;
        $stmt = "SELECT COUNT(*) AS jumlah FROM perizinan WHERE status = 'Pending'";
        $result = sqlsrv_query($this->db->conn, $stmt);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        return $row['jumlah'];
    }

    public function getJumlahIzinPendingByEmail($email)
    {
        // Inisialisasi koneksi database
        $this->db = new Connection;

        // Query untuk menghitung jumlah izin dengan status Pending berdasarkan email
        $stmt = "SELECT COUNT(*) AS jumlah FROM perizinan WHERE status = 'Pending' AND user_id = (SELECT id FROM users WHERE email = ?)";
        $params = array($email);

        // Eksekusi query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Cek jika query berhasil
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
        }

        // Ambil hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Kembalikan jumlah izin Pending
        return $row['jumlah'];
    }

    public function deletePerizinan($id_perizinan)
    {
        $this->db = new Connection;

        // Query untuk menghapus perizinan berdasarkan ID
        $stmt = "DELETE FROM perizinan WHERE id = ?";
        $params = [$id_perizinan];  // Pastikan parameter id yang benar sudah dikirim

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        if (!$result) {
            // Jika query gagal, tampilkan error
            $errors = sqlsrv_errors();
            echo "Error: " . print_r($errors, true);
            return false;
        }

        return true; // Penghapusan berhasil
    }
}
