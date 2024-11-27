<?php 
class Connection 
{
    private $serverName = "LAPTOP-V6CM8SFG";
    private $connectionInfo = ["Database" => "pesantren"];
    public $conn;

    public function __construct() {
        // Inisialisasi koneksi di dalam konstruktor
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);
        $this->ifNotConnect(); // Panggil fungsi cek koneksi setelah inisialisasi
    }

    function ifNotConnect() {
        if ($this->conn === false) {
            die(print_r(sqlsrv_errors(), true)); 
        }
    }
}
?>
