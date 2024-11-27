<?php
// koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "prakwebdb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // enkripsi password
    
    // Prepared statement untuk keamanan
    $query = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "User berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}
?>