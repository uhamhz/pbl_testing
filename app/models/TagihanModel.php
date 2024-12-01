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



}