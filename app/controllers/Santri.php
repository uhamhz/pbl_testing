<?php
class Santri extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "santri") {
                $data['santri'] = $this->model('SantriModel')->getAllDataSantri();
                $this->view('Santri/index', $data);
            } else {
                header("location:http://localhost/public");
            }
        } else {
            header("location:http://localhost/public");
        }

    }

    public function dashboardSantri()
    {
        $this->view('Santri/dashboardSantri');
    }
}
?>