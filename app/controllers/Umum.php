<?php
class Umum extends Controller
{
    private $email;
    private $password;

    public function index()
    {
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
            $url = BASEURL . "/Admin/index";
            header("location:$url");
            exit;
        } else if ($this->isPengurus()) {
            $_SESSION['role'] = "pengurus";
            header("location:$url./Pengurus");
            exit;
        } else if ($this->isSantri()) {
            $_SESSION['role'] = "santri";
            $url = BASEURL . "/Santri/index";
            header("location:$url");
            exit;
        } else {
            header("location:$url");
            // exit;
        }
        $_SESSION['email'] = $this->email;
        $_SESSION['password'] = $this->password;
    }


    public function isAdmin(): bool
    {
        $userModel = $this->model("UserModel");
        $user = $userModel->getUserByEmailAndPassword($this->email, $this->password);

        return $user && $user['role'] === 'admin';
    }

    public function isPengurus(): bool
    {
        $userModel = $this->model("UserModel");
        $user = $userModel->getUserByEmailAndPassword($this->email, $this->password);

        return $user && $user['role'] === 'pengurus';
    }

    public function isSantri(): bool
    {
        $userModel = $this->model("UserModel");
        $user = $userModel->getUserByEmailAndPassword($this->email, $this->password);

        return $user && $user['role'] === 'santri';
    }
}

?>