<?php
class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "admin") {
                $data['users'] = $this->model("UserModel")->getUserData($_SESSION['email']);
                $data['admin'] = $this->model("UserModel")->getAdminData();
                $data['santri'] = $this->model("UserModel")->getSantriData();
                $data['perizinan'] = $this->model("PerizinanModel")->getAllDataPerizinan();
                $data['jumlahSantri'] = $this->model("UserModel")->getJumlahSantri();
                $data['jumlahIzin'] = $this->model("PerizinanModel")->getJumlahIzinPending();
                $data['jumlahAdmin'] = $this->model("UserModel")->getJumlahAdmin();
                $data['jadwal'] = $this->model("MataPelajaranModel")->getJadwalWithPelajaranAndUstadz();
                $data['tagihan'] = $this->model("TagihanModel")->getAllDataTagihan();
                $data['jumlahTagihan'] = $this->model("TagihanModel")->getJumlahTagihanPending();
                $data['totalTagihan'] = $this->model("TagihanModel")->getTotalTagihanPending();
                $this->view('admin/dashboardAdmin', $data);
            } else if ($role == "pengurus") {
                header("location:http://localhost/public/Pengurus");
            } else if ($role == "santri") {
                header("location:http://localhost/public/Santri");
            }
        } else {
            header("location:http://localhost/public");
        }
    }

    public function tambah()
    {
        // Validasi input
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = "Email dan password wajib diisi";
            header('Location: ' . BASEURL . '/Admin/#admin');
            exit;
        }

        $data = [
            'email' => $_POST['email'],
            'nama_lengkap' => $_POST['nama_lengkap'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'role' => $_POST['role'], //
            'password' => $_POST['password'],
        ];

        // Di controller
        if ($this->model('UserModel')->tambahDataUsers($data)) {
            // Berhasil
            error_log('User berhasil ditambahkan: ' . $data['email']);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal menambah user: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal menambah user";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function edit()
    {
        // Validasi input
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = "Email dan password wajib diisi";
            header('Location: ' . BASEURL . '/Admin/#admin');
            exit;
        }

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
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal mengubah user: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal mengubah user";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $userModel = $this->model('UserModel');
                $userModel->deleteUser($id);
                header('Location: ' . BASEURL . '/Admin/#admin');  // Redirect ke halaman admin setelah penghapusan
                exit;
            }
        }
    }

    public function tambahTagihanSantri()
    {
        // Ensure JSON content type
        header('Content-Type: application/json');

        try {
            // Extensive error checking
            if (empty($_POST['id_users'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'ID Pengguna tidak boleh kosong'
                ]);
                exit;
            }

            // Your existing logic
            $data = [
                'id_users' => $_POST['id_users'],
                'jenis_tagihan' => $_POST['jenis_tagihan'],
                'jumlah' => $_POST['jumlah'],
                'jatuh_tempo' => $_POST['jatuh_tempo'],
                'status' => $_POST['status'],
                'bukti_pembayaran' => null // Handle file upload separately
            ];

            // File upload handling
            if (!empty($_FILES['bukti_pembayaran']['name'])) {
                // Add your file upload logic here
            }

            // Model method call
            $result = $this->model('TagihanModel')->tambahTagihan($data);

            if ($result) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Tagihan berhasil ditambahkan'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menambahkan tagihan'
                ]);
            }
            exit;

        } catch (Exception $e) {
            // Log the full error
            error_log('Error in tambahTagihanSantri: ' . $e->getMessage());

            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
            exit;
        }
    }

    public function tambahJadwal()
    {

        $data = [
            'id_pelajaran' => $_POST['id_pelajaran'],
            'id_user' => $_POST['id_user'],
            'waktu' => $_POST['waktu'],
            'hari' => $_POST['hari']
        ];

        // Di controller
        if ($this->model('MataPelajaranModel')->tambahDataJadwal($data)) {
            // Berhasil
            error_log('jadwal berhasil ditambahkan: ' . $data['hari']);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal menambah user: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal menambah jadwal";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }
}
?>