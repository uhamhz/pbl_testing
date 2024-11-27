<?php
class Pengurus extends Controller
{
    public function index($nama = "Dhanil")
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "pengurus") {
                $this->view('admin/dashboardAdmin', $nama);
            } else {
                header("location:http://localhost/public");
            }
        } else {
            header("location:http://localhost/public");
        }

    }
}
?>