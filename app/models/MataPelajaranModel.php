<?php
class MataPelajaranModel
{
    public function getJadwalWithPelajaranAndUstadz()
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query SQL untuk mengambil data jadwal dengan nama pelajaran dan nama ustadz
        $stmt = "
            SELECT 
                j.id_jadwal, 
                j.id_pelajaran, 
                j.id_user, 
                j.waktu, 
                j.hari, 
                mp.nama_pelajaran, 
                u.nama_lengkap
            FROM 
                jadwal j
            LEFT JOIN 
                users u ON j.id_user = u.id
            LEFT JOIN 
                mata_pelajaran mp ON j.id_pelajaran = mp.id_pelajaran
        ";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);
        
        // Memeriksa apakah query berhasil
        if (!$result) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Menyiapkan array untuk menyimpan data
        $data = [];
        
        // Mengambil hasil query dan menyimpannya dalam array
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Mengembalikan data
        return $data;
    }
}
