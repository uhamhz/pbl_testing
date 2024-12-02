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

}