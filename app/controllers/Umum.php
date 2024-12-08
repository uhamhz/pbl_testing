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

        $userModel = $this->model("UserModel");
        $user = $userModel->getUserByEmailAndPassword($this->email, $this->password);

        if ($user) {
            // Login berhasil
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $this->email;

            // Redirect sesuai role
            switch ($user['role']) {
                case 'admin':
                    header("location:$url/Admin/index");
                    break;
                case 'pengurus':
                    header("location:$url/Pengurus");
                    break;
                case 'santri':
                    header("location:$url/Santri/index");
                    break;
                default:
                    header("location:$url");
            }
            exit;
        } else {
            // Login gagal
            $_SESSION['login_error'] = "Email atau password salah!";
            header("location:$url");
            exit;
        }
    }

    public function logout()
    {
        // Menghapus semua data session
        session_start(); // Memastikan session dimulai sebelum membersihkannya
        session_unset(); // Menghapus semua variabel session
        session_destroy(); // Menghancurkan session

        // Mengarahkan kembali ke halaman login atau beranda
        $url = BASEURL;
        header("location:$url");
        exit;
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

    public function isLihatFormulir(): bool
    {
        $this->view('umum/formulir');
        return true;
    }
}

?>