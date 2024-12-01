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
                $data ['santri'] = $this->model("UserModel")->getSantriData();
                $data ['perizinan'] = $this->model("PerizinanModel")->getAllDataPerizinan();
                $data ['jumlahSantri'] = $this->model("UserModel")->getJumlahSantri();
                $data ['jumlahIzin'] = $this->model("PerizinanModel")->getJumlahIzinPending();
                $data ['jumlahAdmin'] = $this->model("UserModel")->getJumlahAdmin();
                $this->view('admin/dashboardAdmin', $data);
            }else if ($role == "pengurus") {
                header("location:http://localhost/public/Pengurus");
            }else if ($role == "santri") {
                header("location:http://localhost/public/Santri");
            }
        } else {
            header("location:http://localhost/public");
        }
    }


}   
?>