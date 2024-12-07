<?php

class TagihanModel
{
    private $db;

    public function getAllDataTagihan()
    {
        $this->db = new Connection;

        // Mengambil data tagihan dan nama santri dari tabel users, dengan kolom nama_lengkap
        $stmt = "
            SELECT t.id_tagihan, u.nama_lengkap AS nama_santri, t.jenis_tagihan, t.jumlah, t.jatuh_tempo, t.status, t.bukti_pembayaran
            FROM tagihan t
            JOIN users u ON t.id_users = u.id
        ";

        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        // Ambil setiap baris data hasil query
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getTagihanByEmail($email)
    {
        $this->db = new Connection;

        // Mengambil data tagihan dan nama santri dari tabel users, dengan kolom nama_lengkap
        $stmt = "
            SELECT t.id_tagihan, u.nama_lengkap AS nama_santri, t.jenis_tagihan, t.jumlah, t.jatuh_tempo, t.status, t.bukti_pembayaran
            FROM tagihan t
            JOIN users u ON t.id_users = u.id
            WHERE u.email = ?
        ";

        $params = [$email];

        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        // Ambil setiap baris data hasil query
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getJumlahTagihanPending()
    {
        $this->db = new Connection;

        // Mengambil jumlah tagihan dengan status 'Pending'
        $stmt = "
        SELECT COUNT(*) AS jumlah FROM tagihan WHERE status = 'belum lunas'
    ";

        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Ambil satu baris data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Jika ada hasil, kembalikan jumlahnya
        return ($row && $row['jumlah'] > 0) ? $row['jumlah'] : 0;
    }


    public function getTotalTagihanPending()
    {
        $this->db = new Connection;

        // Mengambil total jumlah tagihan dengan status 'Pending'
        $stmt = "
            SELECT SUM(jumlah) AS total FROM tagihan WHERE status = 'belum lunas'
        ";

        $result = sqlsrv_query($this->db->conn, $stmt);

        // Cek jika query gagal
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Ambil satu baris data hasil query
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // Jika ada hasil, kembalikan totalnya
        return ($row && $row['total'] > 0) ? $row['total'] : 0;
    }

    public function deleteTagihan($id_tagihan)
    {
        $this->db = new Connection;
        $stmt = "DELETE FROM tagihan WHERE id_tagihan = ?";
        $params = [$id_tagihan];
        $result = sqlsrv_query($this->db->conn, $stmt, $params);
        return $result;
    }

    public function tambahTagihan($data)
    {
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();
        }

        $query = "INSERT INTO tagihan (id_users, jenis_tagihan, jumlah, jatuh_tempo, status, bukti_pembayaran) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $params = [
            $data['id_users'],
            $data['jenis_tagihan'],
            $data['jumlah'],
            $data['jatuh_tempo'],
            $data['status'],
            $data['bukti_pembayaran']
        ];

        try {
            $stmt = sqlsrv_query($this->db->conn, $query, $params);

            if ($stmt === false) {
                $errors = sqlsrv_errors();
                throw new Exception("Database error: " . print_r($errors, true));
            }

            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function tambahDataBuktiPembayaran($data, $id)
    {
        // Pastikan koneksi database valid
        if (!$this->db || !$this->db->conn) {
            $this->db = new Connection();  // Inisialisasi koneksi jika belum ada
        }

        // Menyusun query untuk update bukti pembayaran
        $query = "UPDATE tagihan SET bukti_pembayaran = ? WHERE id_tagihan = ?";

        // Parameter yang akan diikatkan ke query
        $params = [
            $data['bukti_pembayaran'], // Path bukti pembayaran
            $id                         // ID tagihan
        ];

        try {
            // Menjalankan query dengan sqlsrv_query
            $stmt = sqlsrv_query($this->db->conn, $query, $params);

            if ($stmt === false) {
                // Jika query gagal, tampilkan error
                $errors = sqlsrv_errors();
                throw new Exception("Database error: " . print_r($errors, true));
            }

            // Jika berhasil, kembalikan true
            return true;
        } catch (Exception $e) {
            // Tangani error dan catat di log
            error_log($e->getMessage());
            return false;
        }
    }

    public function updateStatusTagihan($data)
    {
        $this->db = new Connection;

        // Query untuk memperbarui status tagihan berdasarkan id_tagihan
        $stmt = "
        UPDATE tagihan
        SET status = ?
        WHERE id_tagihan = ?
        ";

        error_log("Query yang dijalankan: " . $stmt);

        // Bind parameter dan jalankan query
        $query = sqlsrv_query($this->db->conn, $stmt, array(
            $data['status'],  // Status baru
            $data['id_tagihan'] // ID tagihan yang ingin diperbarui
        ));

        if ($query === false) {
            // Jika query gagal, log error
            error_log('Gagal mengubah status tagihan: ' . print_r(sqlsrv_errors(), true));
            return false;
        }

        // Log bahwa status tagihan berhasil diperbarui
        error_log("Status tagihan dengan ID " . $data['id_tagihan'] . " berhasil diperbarui.");

        

        return true;  // Jika berhasil
    }

}