<?php
class Santri extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "santri") {
                $data['users'] = $this->model("UserModel")->getUserData($_SESSION['email']);
                $data['jadwal'] = $this->model("MataPelajaranModel")->getJadwalWithPelajaranAndUstadz();
                $data['izin'] = $this->model("PerizinanModel")->getPerizinanByEmail($_SESSION['email']);
                $data['tagihan'] = $this->model("TagihanModel")->getTagihanByEmail($_SESSION['email']);
                $data['jumlahIzin'] = $this->model("PerizinanModel")->getJumlahIzinPendingByEmail($_SESSION['email']);
                $this->view('santri/dashboardSantri', $data);
            } else if ($role == "pengurus") {
                header("location:http://localhost/public/Pengurus");
            } else if ($role == "admin") {
                header("location:http://localhost/public/Admin");
            }
        } else {
            header("location:http://localhost/public");
        }
    }

    public function hapusPerizinan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                // Ambil id yang dikirimkan
                $id_perizinan = $_POST['id'];

                // Panggil model untuk menghapus perizinan
                $perizinanModel = $this->model('PerizinanModel');
                $result = $perizinanModel->deletePerizinan($id_perizinan);

                if ($result) {
                    // Redirect ke halaman perizinan setelah berhasil menghapus
                    header('Location: ' . BASEURL . '/Santri');
                    exit;
                } else {
                    // Tampilkan pesan jika penghapusan gagal
                    echo "Penghapusan data perizinan gagal.";
                }
            }
        }
    }

    public function tambahPerizinan()
    {
        $data = [
            'user_id' => $_POST['user_id'],
            'tanggal_izin' => $_POST['tanggal_izin'],
            'tanggal_kembali' => $_POST['tanggal_kembali'],
            'jenis_izin' => $_POST['jenis_izin'],
            'alasan' => $_POST['alasan'],
            'status' => 'pending'
        ];

        // Log data untuk memastikan data yang dikirim
        error_log(print_r($data, true));

        if ($this->model('PerizinanModel')->tambahDataPerizinan($data)) {
            // Berhasil
            error_log('Perizinan berhasil ditambahkan: ' . $data['tanggal_izin']);
            header('Location: ' . BASEURL . '/santri');
            exit;
        } else {
            // Gagal
            error_log('Gagal menambah perizinan: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal menambah perizinan";
            header('Location: ' . BASEURL . '/santri');
            exit;
        }
    }

    public function edit()
    {
        // Validasi input
        // if (empty($_POST['email']) || empty($_POST['password'])) {
        //     $_SESSION['error'] = "Email dan password wajib diisi";
        //     header('Location: ' . BASEURL . '/Santri/#santri');
        //     exit;
        // }
        $data = [
            'email' => $_POST['email'],
            'nama_lengkap' => $_POST['nama_lengkap'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'role' => $_POST['role'], //
            'password' => $_POST['password'],
        ];
        // Di controller
        if ($this->model('UserModel')->editDataUser($data, $_POST['id'])) {
            // Berhasil
            error_log('User berhasil diubah: ' . $data['email']);
            header('Location: ' . BASEURL . '/santri');
            exit;
        } else {
            // Gagal
            error_log('Gagal mengubah user: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal mengubah user";
            header('Location: ' . BASEURL . '/santri');
            exit;
        }
    }
}
?>