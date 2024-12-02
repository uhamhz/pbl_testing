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

    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $userModel = $this->model('UserModel');
                $userModel->deleteUser($id);
                header('Location: ' . BASEURL . '/Admin');  // Redirect ke halaman admin setelah penghapusan
                exit;
            }
        }
    }
}
?>