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