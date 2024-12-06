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
                $data['ustadz'] = $this->model("UserModel")->getUstadzData();
                $data['perizinan'] = $this->model("PerizinanModel")->getAllDataPerizinan();
                $data['jumlahSantri'] = $this->model("UserModel")->getJumlahSantri();
                $data['jumlahIzin'] = $this->model("PerizinanModel")->getJumlahIzinPending();
                $data['jumlahAdmin'] = $this->model("UserModel")->getJumlahAdmin();
                $data['jadwal'] = $this->model("MataPelajaranModel")->getJadwalWithPelajaranAndUstadz();
                $data['tagihan'] = $this->model("TagihanModel")->getAllDataTagihan();
                $data['jumlahTagihan'] = $this->model("TagihanModel")->getJumlahTagihanPending();
                $data['totalTagihan'] = $this->model("TagihanModel")->getTotalTagihanPending();
                $data['mataPelajaran'] = $this->model("MataPelajaranModel")->getMataPelajaran();

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
        if (empty($_POST['email']) || empty($_POST['nama_lengkap']) || empty($_POST['no_hp']) || empty($_POST['alamat'])) {
            $_SESSION['error'] = "Semua field wajib diisi";
            header('Location: ' . BASEURL . '/admin');
            exit;
        }

        // Menyiapkan data yang akan diupdate
        $data = [
            'email' => $_POST['email'],
            'nama_lengkap' => $_POST['nama_lengkap'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'role' => $_POST['role']
        ];

        // Jika password diberikan, simpan password sebagai string biasa (tidak di-hash)
        if (!empty($_POST['password'])) {
            $data['password'] = $_POST['password'];
        }

        // Jika password null (tidak diubah), hapus dari data untuk update
        if (empty($data['password'])) {
            unset($data['password']);
        }

        // Cek apakah data berhasil diperbarui
        $userModel = $this->model('UserModel');

        try {
            if ($userModel->editDataUser($data, $_POST['id'])) {
                // Berhasil memperbarui data user
                $_SESSION['success'] = "Data berhasil diperbarui.";
                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                // Gagal memperbarui data
                $_SESSION['error'] = "Gagal memperbarui data.";
                header('Location: ' . BASEURL . '/admin');
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
            header('Location: ' . BASEURL . '/admin');
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

    public function approvePerizinan()
    {
        //echo var_dump($_POST);
        // // Validasi input
        if (empty($_POST['id'])) {
            $_SESSION['error'] = "ID perizinan tidak ditemukan";
            header('Location: ' . BASEURL . '/Admin/#admin');
            exit;
        }

        $data = [
            'status' => $_POST['status'], // Mengubah status menjadi approve
        ];
        // echo var_dump($data);
        // Mengupdate status di database
        if ($this->model('PerizinanModel')->updateStatusPerizinan($data, $_POST['id'])) {
            //  echo 'success';
            // Berhasil
            error_log('Perizinan berhasil diubah menjadi approve: ID ' . $_POST['id']);
            $_SESSION['success'] = "Perizinan berhasil disetujui";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            //echo 'gagal';
            // Gagal
            error_log('Gagal mengubah perizinan: ID ' . $_POST['id']);
            $_SESSION['error'] = "Gagal menyetujui perizinan";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function tambahMataPelajaran()
    {
        $data = [
            'nama_pelajaran' => $_POST['nama_pelajaran'],
        ];

        // Di controller
        if ($this->model('MataPelajaranModel')->tambahDataMataPelajaran($data)) {
            // Berhasil
            error_log('mata pelajaran berhasil ditambahkan: ' . $data['nama_pelajaran']);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal menambah mata pelajaran: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal menambah mata pelajaran";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function editMataPelajaran()
    {
        // Pastikan nama input form sama dengan yang digunakan di modal
        $data = [
            'id_pelajaran' => $_POST['id_pelajaran'],  // Sesuaikan dengan name pada form
            'nama_pelajaran' => $_POST['nama_pelajaran'],
        ];

        // Di controller
        if ($this->model('MataPelajaranModel')->editDataMataPelajaran($data['id_pelajaran'], $data['nama_pelajaran'])) {
            // Berhasil
            error_log('Mata pelajaran berhasil diubah: ' . $data['id_pelajaran']);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal mengubah mata pelajaran: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal mengubah mata pelajaran";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function hapusMataPelajaran()
    {
        if (isset($_POST['id_pelajaran'])) {
            $id_pelajaran = $_POST['id_pelajaran'];
            $this->model('MataPelajaranModel')->hapusDataMataPelajaran($id_pelajaran);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }


    public function editJadwal()
    {
        $data = [
            'id_jadwal' => $_POST['jadwalId'],    // Mengambil id_jadwal dari form
            'id_pelajaran' => $_POST['id_pelajaran'],
            'id_user' => $_POST['id_user'],
            'waktu' => $_POST['waktu'],
            'hari' => $_POST['hari']
        ];

        // Di controller
        if ($this->model('MataPelajaranModel')->editDataJadwal($data['id_jadwal'], $data['id_pelajaran'], $data['id_user'], $data['waktu'], $data['hari'])) {
            // Berhasil
            error_log('Jadwal berhasil diubah: ' . $data['id_jadwal']);
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Gagal
            error_log('Gagal mengubah jadwal: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal mengubah jadwal";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function hapusJadwal()
    {
        if (isset($_POST['id_jadwal'])) {
            $id_jadwal = $_POST['id_jadwal'];

            // Panggil model untuk menghapus jadwal
            $this->model('MataPelajaranModel')->hapusDataJadwal($id_jadwal);

            // Redirect setelah berhasil
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            // Jika tidak ada ID jadwal
            $_SESSION['error'] = "Tidak ada jadwal yang dipilih untuk dihapus";
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }



}
?>