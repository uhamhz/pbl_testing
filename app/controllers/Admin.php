<?php
class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "admin") {
                $this->view('admin/dashboardAdmin');
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