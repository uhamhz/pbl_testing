<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="/Public/css/style.css">
 <title>Dashboard</title>
</head>
<body>
 <h1>Dashboard</h1>
 <?php if (isset($data)): ?>
 <p>Data: <?= htmlspecialchars($data) ?></p>
 <?php else: ?>
 <p>Welcome to the Dashboard</p>
 <?php endif; ?>
 <form action="/dashboard/update" method="POST">
 <input type="text" name="newData" placeholder="Enter new data">
 <button type="submit">Update</button>
 </form>
</body>
</html>
