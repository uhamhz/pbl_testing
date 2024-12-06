<?php
class MataPelajaranModel
{
    private $db;

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

    public function tambahDataJadwal($data)
    {
        // Pastikan hari sudah dalam format kapital
        $data['hari'] = ucfirst(strtolower($data['hari'])); // Sama seperti sebelumnya, formatkan menjadi kapital

        // Membuka koneksi database
        $this->db = new Connection;

        // Query SQL untuk menambahkan data jadwal
        $stmt = "
        INSERT INTO jadwal (id_pelajaran, id_user, waktu, hari)
        VALUES (?, ?, ?, ?)
    ";

        // Ubah menjadi array numerik
        $params = [
            $data['id_pelajaran'],  // id_pelajaran
            $data['id_user'],        // id_user
            $data['waktu'],          // waktu
            $data['hari']            // hari
        ];

        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        if (!$result) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function getMataPelajaran()
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query SQL untuk mengambil data mata pelajaran
        $stmt = "SELECT * FROM mata_pelajaran";

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

    public function tambahDataMataPelajaran($data)
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query SQL untuk menambahkan data mata pelajaran
        $stmt = "INSERT INTO mata_pelajaran (nama_pelajaran) VALUES (?)";

        // Ubah menjadi array numerik
        $params = [
            $data['nama_pelajaran'],
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil
        if (!$result) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

}
