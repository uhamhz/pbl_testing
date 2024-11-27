<?php
class Santri extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "santri") {
                $this->view('santri/dashboardSantri');
            }else if ($role == "pengurus") {
                header("location:http://localhost/public/Pengurus");
            }else if ($role == "admin") {
                header("location:http://localhost/public/Admin");
            }
        } else {
            header("location:http://localhost/public");
        }
    }
}
?>