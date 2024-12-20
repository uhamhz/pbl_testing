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
                    header('Location: ' . BASEURL . '/Santri/index#perizinan');
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
            header('Location: ' . BASEURL . '/Santri/index#perizinan');
            exit;
        } else {
            // Gagal
            error_log('Gagal menambah perizinan: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal menambah perizinan";
            header('Location: ' . BASEURL . '/Santri/index#perizinan');
            exit;
        }
    }

    public function edit()
    {
        // Validasi input dasar
        if (empty($_POST['nama_lengkap']) || empty($_POST['alamat']) || empty($_POST['no_hp'])) {
            $_SESSION['error'] = "Nama lengkap, alamat, dan no hp wajib diisi";
            header('Location: ' . BASEURL . '/santri');
            exit;
        }

        // Menyiapkan data yang akan diupdate
        $data = [
            'email' => $_POST['email'],  // Email biasanya tidak diubah, tetap terima dari form
            'nama_lengkap' => $_POST['nama_lengkap'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'role' => $_POST['role'],  // Role biasanya tidak diubah, tetap terima dari form
        ];

        // Handle profile picture upload
        if (!empty($_FILES['picture']['name'])) {
            $fileTmpPath = $_FILES['picture']['tmp_name'];
            $fileName = $_FILES['picture']['name'];
            $fileSize = $_FILES['picture']['size'];
            $fileType = $_FILES['picture']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < 5000000) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = '../public/img/Profile/';
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $data['picture'] = $newFileName;
                } else {
                    $_SESSION['error'] = 'Error dalam mengupload file.';
                    header('Location: ' . BASEURL . '/santri');
                    exit;
                }
            } else {
                $_SESSION['error'] = 'Upload gagal. Tipe file tidak didukung atau file terlalu besar.';
                header('Location: ' . BASEURL . '/santri');
                exit;
            }
        }

        // Update data user
        if ($this->model('UserModel')->editDataUser($data, $_POST['id'])) {
            // Berhasil
            error_log('User berhasil diubah: ' . $data['email']);
            header('Location: ' . BASEURL . '/Santri/index#profile');
            exit;
        } else {
            // Gagal
            error_log('Gagal mengubah user: ' . print_r($data, true));
            $_SESSION['error'] = "Gagal mengubah user";
            header('Location: ' . BASEURL . '/Santri/index#profile');
            exit;
        }
    }

    public function tambahBuktiPembayaran()
    {
        // Pastikan file di-upload
        if (!isset($_FILES['paymentProof']) || $_FILES['paymentProof']['error'] != UPLOAD_ERR_OK) {
            $_SESSION['error'] = "Bukti pembayaran tidak boleh kosong atau terjadi error saat upload!";
            header('Location: ' . BASEURL . '/Santri/index#pembayaran');
            exit;
        }

        // Menangani file yang di-upload
        $file = $_FILES['paymentProof'];
        $fileNameOriginal = basename($file['name']); // Nama asli file
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        // Validasi tipe file dan ukuran file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 5 * 1024 * 1024; // 5MB
        if (!in_array($fileType, $allowedTypes) || $fileSize > $maxSize) {
            $_SESSION['error'] = "Format file tidak didukung atau ukuran file terlalu besar.";
            header('Location: ' . BASEURL . '/Santri/index#pembayaran');
            exit;
        }

        // Buat nama file unik
        $uniqueFileName = uniqid() . '-' . str_replace(' ', '_', $fileNameOriginal); // Hindari spasi
        $uploadPath = '../public/img/buktiPembayaran/';

        // Pastikan folder penyimpanan ada
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);  // Membuat folder jika belum ada
        }

        // Path lengkap untuk menyimpan file di server
        $filePath = $uploadPath . $uniqueFileName;

        // Pindahkan file dari lokasi sementara ke lokasi penyimpanan
        if (move_uploaded_file($fileTmpName, $filePath)) {
            error_log("File berhasil dipindahkan ke: " . $filePath);
        } else {
            error_log("Gagal memindahkan file ke: " . $filePath);
            $_SESSION['error'] = "Gagal menyimpan bukti pembayaran.";
            header('Location: ' . BASEURL . '/Santri/index#pembayaran');
            exit;
        }

        // Simpan hanya nama file di database
        $data = ['bukti_pembayaran' => $uniqueFileName];

        // Panggil model untuk menambahkan bukti pembayaran
        if ($this->model('TagihanModel')->tambahDataBuktiPembayaran($data, $_POST['id'])) {
            // Setelah menambahkan bukti pembayaran, update status menjadi 'pending'
            $statusData = [
                'status' => 'pending',  // Status baru
                'id_tagihan' => $_POST['id'] // ID tagihan yang ingin diperbarui
            ];

            // Memperbarui status tagihan menjadi 'pending'
            if ($this->model('TagihanModel')->updateStatusTagihan($statusData)) {
                // Jika berhasil
                error_log('Bukti pembayaran berhasil ditambahkan dan status diubah menjadi pending untuk ID: ' . $_POST['id']);
                header('Location: ' . BASEURL . '/Santri/index#pembayaran');
                exit;
            } else {
                $_SESSION['error'] = "Gagal memperbarui status tagihan.";
                header('Location: ' . BASEURL . '/Santri/index#pembayaran');
                exit;
            }
        } else {
            // Jika gagal menambahkan bukti pembayaran
            error_log('Gagal menambahkan bukti pembayaran untuk ID: ' . $_POST['id']);
            $_SESSION['error'] = "Gagal menambahkan bukti pembayaran";
            header('Location: ' . BASEURL . '/Santri/index#pembayaran');
            exit;
        }
    }
}
?>