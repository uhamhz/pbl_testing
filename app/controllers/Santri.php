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
}
?>