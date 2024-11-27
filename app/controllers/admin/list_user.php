<?php
$koneksi = mysqli_connect("localhost", "username", "password", "prakwebdb");
$query = "SELECT id, username FROM user";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
</head>
<body>
    <h2>Daftar User</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="form_tambah_user.php">Tambah User Baru</a>
    <br>
    <a href="form_import.php">Import Data dari Excel/CSV</a>
</body>
</html>