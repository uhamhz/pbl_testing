<?php

class PerizinanModel
{
    private $db;

    public function getAllDataPerizinan()
    {
        $this->db = new Connection;
        $stmt = "EXEC GetAllDataPerizinan"; // Memanggil stored procedure
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        // Mengambil hasil data
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getPerizinanByEmail($email)
    {
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetPerizinanByEmail @Email = ?";
        $params = array($email);

        // Menjalankan query
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

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC GetJumlahIzinPending";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Debugging jika query gagal
        }

        // Ambil data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Mengembalikan jumlah perizinan pending
        return $row['jumlah'];
    }

    public function getJumlahIzinPendingByEmail($email)
    {
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure dengan email sebagai parameter
        $stmt = "EXEC GetJumlahIzinPendingByEmail @Email = ?";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, array($email));

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Debugging jika query gagal
        }

        // Ambil data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Mengembalikan jumlah perizinan pending
        return $row['jumlah'];
    }

    public function deletePerizinan($id_perizinan)
    {
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure
        $stmt = "EXEC DeletePerizinan @IdPerizinan = ?";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, array($id_perizinan));

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            // Menampilkan error jika query gagal
            $errors = sqlsrv_errors();
            echo "Error: " . print_r($errors, true);
            return false;
        }

        return true; // Jika berhasil menghapus data
    }

    public function tambahDataPerizinan($data)
    {
        $this->db = new Connection;

        // Menyiapkan query untuk memanggil stored procedure InsertPerizinan
        $stmt = "EXEC InsertPerizinan @UserId = ?, @TanggalIzin = ?, @TanggalKembali = ?, @JenisIzin = ?, @Alasan = ?, @Status = ?";

        // Menjalankan query dengan parameter yang sesuai
        $params = [
            $data['user_id'],
            $data['tanggal_izin'],
            $data['tanggal_kembali'],
            $data['jenis_izin'],
            $data['alasan'],
            $data['status']
        ];

        // Menjalankan stored procedure
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if ($result === false) {
            // Menampilkan error jika query gagal
            die('Error executing query: ' . print_r(sqlsrv_errors(), true));
        }

        return true; // Jika berhasil menambahkan data
    }

    public function updateStatusPerizinan($data, $id)
    {
        // Membuat koneksi database jika belum ada
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }

        // Menyiapkan query untuk memanggil stored procedure UpdateStatusPerizinan
        $stmt = "EXEC UpdateStatusPerizinan @Status = ?, @Id = ?";

        // Parameter untuk stored procedure
        $params = [
            $data['status'],  // Status yang baru
            $id               // ID perizinan yang akan diperbarui
        ];

        // Eksekusi stored procedure
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Cek apakah query berhasil
        if ($result === false) {
            // Tampilkan error database jika query gagal
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true));
            return false;
        }

        // Jika berhasil, return true
        return true;
    }

}
