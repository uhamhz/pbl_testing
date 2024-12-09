<?php
class MataPelajaranModel
{
    private $db;

    public function getJadwalWithPelajaranAndUstadz()
    {
        // Membuka koneksi database
        $this->db = new Connection();

        // Query untuk memanggil stored procedure GetJadwalWithPelajaranAndUstadz
        $stmt = "EXEC GetJadwalWithPelajaranAndUstadz";

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
        // Membuka koneksi database
        $this->db = new Connection;

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_InsertJadwal ?, ?, ?, ?";

        // Parameter yang dikirimkan ke stored procedure
        $params = [
            $data['id_pelajaran'],  // id_pelajaran
            $data['id_user'],        // id_user
            $data['waktu'],          // waktu
            $data['hari']            // hari
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil
        if (!$result) {
            die(print_r(sqlsrv_errors(), true));  // Menampilkan error jika query gagal
        }

        // Jika berhasil, tidak perlu return, atau bisa mengembalikan true jika perlu
        return true;
    }

    public function getMataPelajaran()
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_GetMataPelajaran";

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt);

        // Memeriksa apakah query berhasil
        if (!$result) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
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

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_TambahMataPelajaran @nama_pelajaran = ?";

        // Menyiapkan parameter yang akan diikat ke query
        $params = [
            $data['nama_pelajaran'],
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil
        if (!$result) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
        }

        // Jika berhasil, tidak ada nilai yang dikembalikan (langsung selesai)
    }

    public function editDataMataPelajaran($id, $nama_pelajaran)
    {
        // Membuka koneksi database
        $this->db = new Connection();

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_EditMataPelajaran @IdPelajaran = ?, @NamaPelajaran = ?";

        // Menyiapkan parameter yang akan dikirim ke stored procedure
        $params = [
            $id,               // ID pelajaran yang akan diupdate
            $nama_pelajaran    // Nama pelajaran yang baru
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if (!$result) {
            // Menampilkan error jika query gagal
            die(print_r(sqlsrv_errors(), true));
        }

        return true;  // Mengembalikan true jika berhasil
    }

    public function hapusDataMataPelajaran($id)
    {
        // Membuka koneksi database
        $this->db = new Connection();

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_HapusMataPelajaran @IdPelajaran = ?";

        // Menyiapkan parameter untuk mengirimkan ID pelajaran yang akan dihapus
        $params = [
            $id  // ID pelajaran yang akan dihapus
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if (!$result) {
            // Menampilkan error jika query gagal
            die(print_r(sqlsrv_errors(), true));
        }

        return true;  // Mengembalikan true jika berhasil menghapus
    }

    public function editDataJadwal($id_jadwal, $id_pelajaran, $id_user, $waktu, $hari)
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_EditJadwal @IdJadwal = ?, @IdPelajaran = ?, @IdUser = ?, @Waktu = ?, @Hari = ?";

        // Menyiapkan parameter untuk mengirimkan data ke stored procedure
        $params = [
            $id_jadwal,   // ID jadwal yang akan diupdate
            $id_pelajaran,  // ID pelajaran yang baru
            $id_user,       // ID user yang baru
            $waktu,         // Waktu yang baru
            $hari,          // Hari yang baru
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil dijalankan
        if (!$result) {
            // Menampilkan error jika query gagal
            die(print_r(sqlsrv_errors(), true));
        }

        return true;  // Mengembalikan true jika berhasil mengupdate jadwal
    }

    public function hapusDataJadwal($id_jadwal)
    {
        // Membuka koneksi database
        $this->db = new Connection;

        // Query untuk memanggil stored procedure
        $stmt = "EXEC sp_HapusJadwal @IdJadwal = ?";

        // Menyiapkan parameter untuk stored procedure
        $params = [
            $id_jadwal,  // ID jadwal yang akan dihapus
        ];

        // Menjalankan query
        $result = sqlsrv_query($this->db->conn, $stmt, $params);

        // Memeriksa apakah query berhasil
        if (!$result) {
            // Menampilkan error jika query gagal
            die(print_r(sqlsrv_errors(), true));
        }

        return true;  // Mengembalikan true jika berhasil menghapus jadwal
    }
}
