<?php
// Memerlukan library PhpSpreadsheet untuk membaca file Excel
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

$koneksi = mysqli_connect("localhost", "username", "password", "prakwebdb");

if ($_FILES['file_excel']['name']) {
    $file_extension = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);
    
    if ($file_extension == 'xlsx') {
        $reader = new Xlsx();
    } elseif ($file_extension == 'csv') {
        $reader = new Csv();
    }
    
    $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
    $data = $spreadsheet->getActiveSheet()->toArray();
    
    // Prepared statement
    $query = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    
    // Skip baris header
    for ($i = 1; $i < count($data); $i++) {
        $username = $data[$i][0];
        $password = password_hash($data[$i][1], PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
    }
    
    echo "Data berhasil diimport!";
    mysqli_stmt_close($stmt);
}
?>