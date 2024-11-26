<!DOCTYPE html>
<html>
<head>
    <title>Import Data User</title>
</head>
<body>
    <h2>Import Data dari Excel/CSV</h2>
    <form action="proses_import.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_excel" accept=".csv,.xlsx" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>