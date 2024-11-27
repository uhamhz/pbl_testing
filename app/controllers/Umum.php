<?php
class Umum extends Controller {
    private $email;
    private $password;

    public function index(){
        $data['users'] = $this->model("UserModel")->getAllDataUser();
        $this->view('umum/utama', $data);
        if (isset($_POST['login'])) {
            $this->model("UserModel");
        }
    }

    public function isLogin()
    {
            $this->email = $_POST["email"];
            $this->password = $_POST["password"];
            $url = BASEURL;

            if ($this->isAdmin()) {
                $_SESSION['role'] = "admin";
                $url = BASEURL."/Admin/index";
                header("location:$url");
                exit;
            } else if ($this->isPengurus()) {
                $_SESSION['role'] = "pengurus";
                header("location:$url./Pengurus");
                $_SESSION['email'] = $this->email;
                $_SESSION['password'] = $this->password;
                exit;
            } else if ($this->isSantri()) {
                $_SESSION['role'] = "santri";
                header("location:$url./Santri");
                $_SESSION['email'] = $this->email;
                $_SESSION['password'] = $this->password;
                exit;
            } else {
                header("location:$url/Umum/login");
                $_SESSION['email'] = $this->email;
                $_SESSION['password'] = $this->password;
                exit;
            }
        }


    public function isAdmin(): bool
    {
        if ($this->email == "ammarhafizh2404@gmail.com" && $this->password == "admin") {
            return true;
        }
        return false;
    }

    public function isPengurus(): bool
    {
        if ($this->email == "Pengurus" && $this->password == "pengurus") {
            return true;
        }
        return false;
    }

    public function isSantri(): bool
    {
        if ($this->email == "nim" && $this->password == "password") {
            return true;
        } else {
            return false;
        }
    }
}

?>