<?php

class TagihanModel
{
    private $db;

    public function getAllDataTagihan()
    {
        // Pastikan koneksi database
        $this->db = new Connection();

        // Query untuk memanggil stored procedure
        $stmt = "EXEC GetAllDataTagihan";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Menyiapkan array untuk menampung data
        $data = [];

        // Mengambil setiap baris hasil query
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getTagihanByEmail($email)
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure dengan parameter email
        $stmt = "EXEC GetTagihanByEmail @Email = ?";

        // Menyiapkan parameter untuk query
        $params = [$email];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Menyiapkan array untuk menampung data
        $data = [];

        // Mengambil setiap baris hasil query
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getJumlahTagihanPending()
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure
        $stmt = "EXEC GetJumlahTagihanPending";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Ambil satu baris data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Jika ada hasil, kembalikan jumlahnya
        return ($row && isset($row['jumlah'])) ? $row['jumlah'] : 0;
    }

    public function getTotalTagihanPending()
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure
        $stmt = "EXEC GetTotalTagihanPending";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Ambil satu baris data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Jika ada hasil, kembalikan totalnya
        return ($row && isset($row['total'])) ? $row['total'] : 0;
    }

    public function deleteTagihan($id_tagihan)
    {
        $this->db = new Connection;

        // Query untuk memanggil stored procedure dengan parameter id_tagihan
        $stmt = "EXEC DeleteTagihan @IdTagihan = ?";

        // Menyiapkan parameter untuk query
        $params = [$id_tagihan];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Mengecek apakah query berhasil
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Mengembalikan hasil (berhasil atau gagal)
        return $result;
    }

    public function tambahTagihan($data)
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC TambahTagihan 
                 @IdUsers = ?, 
                 @JenisTagihan = ?, 
                 @Jumlah = ?, 
                 @JatuhTempo = ?, 
                 @Status = ?, 
                 @BuktiPembayaran = ?";

        // Menyiapkan parameter untuk query
        $params = [
            $data['id_users'],
            $data['jenis_tagihan'],
            $data['jumlah'],
            $data['jatuh_tempo'],
            $data['status'],
            $data['bukti_pembayaran']
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Mengecek apakah query berhasil
        if ($result === false) {
            // Menangani error jika query gagal
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true));  // Mencatat error ke log
            return false;
        }

        // Jika berhasil, mengembalikan true
        return true;
    }

    public function tambahDataBuktiPembayaran($data, $id)
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC TambahBuktiPembayaran 
                 @IdTagihan = ?, 
                 @BuktiPembayaran = ?";

        // Menyiapkan parameter untuk query
        $params = [
            $id,                         // ID tagihan
            $data['bukti_pembayaran']    // Path bukti pembayaran
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Mengecek apakah query berhasil
        if ($result === false) {
            // Menangani error jika query gagal
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true));  // Mencatat error ke log
            return false;
        }

        // Jika berhasil, mengembalikan true
        return true;
    }

    public function updateStatusTagihan($data)
    {
        $this->db = new Connection();

        // Query untuk memanggil stored procedure dengan parameter
        $stmt = "EXEC UpdateStatusTagihan 
                 @IdTagihan = ?, 
                 @Status = ?";

        // Menyiapkan parameter untuk query
        $params = [
            $data['id_tagihan'],  // ID tagihan
            $data['status']       // Status baru
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Mengecek apakah query berhasil
        if ($result === false) {
            // Menangani error jika query gagal
            $errors = sqlsrv_errors();
            error_log('Gagal mengubah status tagihan: ' . print_r($errors, true));  // Mencatat error ke log
            return false;
        }

        // Log bahwa status tagihan berhasil diperbarui
        error_log("Status tagihan dengan ID " . $data['id_tagihan'] . " berhasil diperbarui.");

        // Jika berhasil, mengembalikan true
        return true;
    }
}