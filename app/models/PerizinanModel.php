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


}