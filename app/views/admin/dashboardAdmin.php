<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Pesantren</title>
    <style>
        /* Resetting default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* CSS Custom Properties */
        /* Modern CSS Reset and Variables */
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #3b82f6;
            --accent-color: #ef4444;
            --background-color: #f1f5f9;
            --card-color: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --success-color: #22c55e;
            --warning-color: #eab308;
            --danger-color: #ef4444;
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-primary);
            line-height: 1.5;
        }

        /* Enhanced Sidebar */
        .sidebar {
            position: fixed;
            left: -280px;
            width: 280px;
            height: 100vh;
            background: var(--card-color);
            transition: var(--transition);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--card-color);
            text-align: center;
        }

        .admin-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 4px solid rgba(255, 255, 255, 0.2);
            padding: 3px;
            background: var(--card-color);
            transition: var(--transition);
        }

        .admin-avatar:hover {
            transform: scale(1.05);
        }

        /* Enhanced Navigation */
        nav ul li a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            color: var(--text-primary);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        nav ul li a:hover,
        nav ul li a.active {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        /* Main Content Improvements */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            transition: var(--transition);
        }

        .main-header {
            background: var(--card-color);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        /* Enhanced Stats Cards */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-color);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Modern Table Styles */
        table {
            width: 100%;
            background: var(--card-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        thead th {
            background: var(--primary-color);
            color: var(--card-color);
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
        }

        tbody tr:nth-child(even) {
            background: rgba(0, 0, 0, 0.02);
        }

        tbody td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Enhanced Buttons */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-success {
            background: var(--success-color);
            color: white;
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Enhanced Schedule Section */
        .jadwal-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .jadwal-box {
            background: var(--card-color);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .jadwal-box h3 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                left: -100%;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }

        /* Personal Data Section Styles */
        .data-pribadi {
            background: var(--card-color);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .data-pribadi h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary-color);
        }

        /* Current Data Display */
        .current-data {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .data-item {
            padding: 1rem;
            background: var(--background-color);
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }

        .data-item label {
            display: block;
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .data-item p {
            color: var(--text-primary);
            font-weight: 500;
            font-size: 1rem;
        }

        /* Edit Form Styles */
        .profile-form {
            background: var(--background-color);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-top: 1.5rem;
            display: none;
            animation: slideDown 0.3s ease-out;
        }


        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid transparent;
            background: var(--card-color);
            border-radius: 8px;
            font-size: 1rem;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-group input:hover {
            background: #f8fafc;
        }

        .form-group small {
            display: block;
            margin-top: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.8rem;
        }

        /* Form Buttons */
        .form-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-edit {
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-cancel {
            background: var(--danger-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* Required Field Indicator */
        .required::after {
            content: '*';
            color: var(--danger-color);
            margin-left: 4px;
        }

        /* Validation Styles */
        .form-group.error input {
            border-color: var(--danger-color);
            background: #fff5f5;
        }

        .form-group.error small {
            color: var(--danger-color);
        }

        .form-group.success input {
            border-color: var(--success-color);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .data-pribadi {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-buttons {
                flex-direction: column;
            }

            .btn-edit,
            .btn-cancel {
                width: 100%;
                justify-content: center;
            }
        }

        /* Navbar Toggle Button */
        .toggle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* Ukuran padding untuk tombol */
            cursor: pointer;
            background-color: var(--primary-color);
            border-radius: 12px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .toggle-btn:hover {
            background-color: var(--secondary-color);
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }

        .toggle-content {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Jarak antara ikon dan teks */
        }

        .toggle-content svg {
            width: 40px;
            /* Ukuran ikon lebih besar */
            height: 32px;
            /* Sesuaikan proporsi ikon */
        }

        .toggle-content .toggle-text {
            font-size: 1.6rem;
            /* Perbesar ukuran teks */
            font-weight: bold;
            color: white;
            /* Warna teks */
            text-transform: uppercase;
            /* Membuat teks menjadi huruf besar */
            letter-spacing: 1.5px;
            /* Memberikan jarak antar huruf */
        }

        /* Responsif */
        @media (max-width: 768px) {
            .toggle-btn {
                padding: 15px;
            }

            .toggle-content svg {
                width: 30px;
                height: 24px;
            }

            .toggle-content .toggle-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <div class="toggle-btn" onclick="toggleSidebar()">
        <div class="toggle-content">
            <svg width="30" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <span class="toggle-text">Ashabul Kahfi</span>
        </div>
    </div>
    <!-- Overlay -->
    <div class="overlay" onclick="toggleSidebar()"></div>

    <div class="dashboard-container">

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <!-- Profil Pengguna -->
                <td>
                    <?php if (!empty($data['users']['0']['picture'])): ?>
                        <img src="<?php echo BASEURL . '/img/Profile/' . htmlspecialchars($data['users']['0']['picture']); ?>"
                            alt="Admin Avatar" class="admin-avatar">
                    <?php else: ?>
                        <img src="<?php echo BASEURL . '/img/Profile/default-avatar.png'; ?>" alt="Default Avatar"
                            class="admin-avatar">
                    <?php endif; ?>
                </td>

                <h2><?= !isset($data['users']['0']['nama_lengkap']) ? 'Not Found' : $data['users']['0']['nama_lengkap'] ?>
                </h2>
                <p><?= !isset($data['users']['0']['role']) ? 'Not Found' : $data['users']['0']['role'] ?></p>
            </div>

            <nav>
                <ul>
                    <li><a href="#dashboard" class="active">Dashboard</a></li>
                    <li><a href="#pribadi">Data Pribadi</a></li>
                    <li><a href="#admin">Data Admin</a></li>
                    <li><a href="#ustadz">Data Ustadz</a></li>
                    <li><a href="#santri">Data Santri</a></li>
                    <li><a href="#pelajaran">Mata Pelajaran</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#perizinan">Perizinan</a></li>
                    <li><a href="#tagihan">Tagihan</a></li>
                    <li><a href="#beranda">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.main-content').classList.toggle('active');
            document.querySelector('.overlay').classList.toggle('active');
        }

        // Menutup sidebar ketika mengklik link menu (opsional)
        document.querySelectorAll('.sidebar nav a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    toggleSidebar();
                }
            });
        });

        // Menutup sidebar ketika ukuran window berubah ke desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                document.querySelector('.sidebar').classList.remove('active');
                document.querySelector('.main-content').classList.remove('active');
                document.querySelector('.overlay').classList.remove('active');
            }
        });
    </script>
    <!-- Main Content -->
    <main class="main-content">
        <div class="main-header">
            <h1>Selamat Datang,
                <?= !isset($data['users']['0']['nama_lengkap']) ? 'Not Found' : $data['users']['0']['nama_lengkap'] ?>
            </h1>
            <div class="user-info">
                <h2 id="realTimeClock"> </h2>
            </div>
        </div>

        <!-- Dashboard Section -->
        <section id="dashboard" class="content-section active">
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3>Total Santri Aktif</h3>
                    <p><?= $data['jumlahSantri'] ?></p>
                    <small>Tahun Ajaran 2024/2025</small>
                </div>
                <div class="stat-card">
                    <h3>Total Admin Aktif</h3>
                    <p><?= $data['jumlahAdmin'] ?></p>
                    <small>Tahun Ajaran 2024/2025</small>
                </div>
                <div class="stat-card">
                    <h3>Perizinan Pending</h3>
                    <p><?= $data['jumlahIzin'] ?></p>
                    <small>Membutuhkan persetujuan</small>
                </div>
                <div class="stat-card">
                    <h3>Tagihan Belum Lunas</h3>
                    <p><?= $data['jumlahTagihan'] ?></p>
                    <small>Total Tagihan : Rp.<?= number_format($data['totalTagihan'], 0, ',', '.') ?></small>
                </div>
            </div>
        </section>

        <section id="pribadi" class="content-section">
            <h2>Data Pribadi</h2>


            <div class="data-pribadi">
                <p><strong>Nama Lengkap:</strong> <?= $data['users']['0']['nama_lengkap'] ?></p>
                <p><strong>Email:</strong> <?= $data['users']['0']['email'] ?></p>
                <p><strong>Role:</strong> <?= $data['users']['0']['role'] ?></p>
                <p><strong>Alamat:</strong> <?= $data['users']['0']['alamat'] ?></p>
                <p><strong>No. HP:</strong> <?= $data['users']['0']['no_hp'] ?></p>
            </div>

            <!-- Form untuk edit data pribadi dan upload gambar profil -->
            <form class="profile-form" style="display:none;" action="<?= BASEURL; ?>/Admin/edit" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profile-pic">Ganti Foto Profil:</label>
                    <input type="file" name="profile_pic" id="profile-pic">
                </div>

                <!-- Elemen form lainnya -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email-input" value="<?= $data['users'][0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama-input"
                        value="<?= $data['users'][0]['nama_lengkap'] ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat-input" value="<?= $data['users'][0]['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label>No. HP</label>
                    <input type="tel" name="no_hp" id="hp-input" value="<?= $data['users'][0]['no_hp'] ?>">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <input type="text" name="role" id="role-input" value="<?= $data['users'][0]['role'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password-input">
                    <small>Isi jika ingin mengganti password</small>
                </div>
                <input type="hidden" name="id" value="<?= $data['users'][0]['id'] ?>">

                <button type="submit">Simpan Perubahan</button>
                <button type="button" id="cancel-button">Batal</button>
            </form>

            <button type="button" id="edit-button">Ubah</button>
        </section>

        <!-- Data Admin Section -->
        <section id="admin" class="content-section">
            <h2>Data Admin</h2>

            <!-- Search Bar -->
            <input type="text" id="searchAdmin" class="form-control mb-3" placeholder="Cari Admin..."
                onkeyup="searchData('admin')">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAdmin">Tambah
                Admin</button>
            <table id="adminTable">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['admin'] as $admin): ?>
                        <tr>
                            <td><?= htmlspecialchars($admin['email'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td>*****</td> <!-- Hide the password for security purposes -->
                            <td><?= htmlspecialchars($admin['nama_lengkap'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($admin['alamat'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($admin['no_hp'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <?php if ($data['users'][0]['id'] != $admin['id']): ?>
                                    <!-- Only show Edit and Delete buttons if not the logged-in user -->
                                    <form action="<?= BASEURL; ?>/Admin/hapus" method="POST"
                                        style="display:inline-block;">
                                        <input type="hidden" name="id" value="<?= $admin['id']; ?>">
                                        <input type="hidden" name="status" value="<?= $admin['role']; ?>">
                                        <!-- Tambahkan input role -->
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalEditAdmin<?= $admin['id'] ?>">Edit</button>
                                <?php else: ?>
                                    <!-- Hide Edit and Delete buttons for the logged-in admin -->
                                <?php endif; ?>
                            </td>
                        </tr>

                        <!-- Modal for Edit Admin -->
                        <div class="modal fade" id="modalEditAdmin<?= $admin['id'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="modalEditAdminLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditAdminLabel">Edit Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL; ?>/Admin/edit" method="POST">
                                            <input type="hidden" name="id" value="<?= $admin['id'] ?>">

                                            <!-- Email Field -->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?= htmlspecialchars($admin['email'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Nama Lengkap Field -->
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap"
                                                    value="<?= htmlspecialchars($admin['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Alamat Field -->
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value="<?= htmlspecialchars($admin['alamat'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Nomor HP Field -->
                                            <div class="form-group">
                                                <label for="no_hp">Nomor HP</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="<?= htmlspecialchars($admin['no_hp'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Role Field (Read-Only) -->
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" class="form-control" id="role" name="role"
                                                    value="<?= htmlspecialchars($admin['role'], ENT_QUOTES, 'UTF-8') ?>"
                                                    readonly>
                                            </div>

                                            <!-- Password Field (Optional) -->
                                            <div class="form-group">
                                                <label for="password">Password (Leave blank if not changing)</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Admin</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Modal Tambah Admin -->
        <div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="tambahAdminLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahAdminLabel">Tambah Admin Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formTambahAdmin" action="<?= BASEURL; ?>/Admin/tambah" method="POST">

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama_lengkap" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="hp">Nomor HP:</label>
                                <input type="tel" class="form-control" id="hp" name="no_hp" required>
                            </div>

                            <div class="form-group">
                                <label for="hp">Role :</label>
                                <input type="text" class="form-control" id="role" name="role" value="admin" readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="formTambahAdmin">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Ustadz Section -->
        <section id="ustadz" class="content-section">
            <h2>Data Ustadz</h2>

            <!-- Search Bar -->
            <input type="text" id="searchUstadz" class="form-control mb-3" placeholder="Cari Ustadz..."
                onkeyup="searchData('ustadz')">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahUstadz">Tambah Ustadz</button>
            <table id="ustadzTable">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['ustadz'] as $ustadz): ?>
                        <tr>
                            <td><?= htmlspecialchars($ustadz['email'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td>*****</td> <!-- Hide the password for security purposes -->
                            <td><?= htmlspecialchars($ustadz['nama_lengkap'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($ustadz['alamat'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($ustadz['no_hp'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <?php if ($data['users'][0]['id'] != $ustadz['id']): ?>
                                    <!-- Only show Edit and Delete buttons if not the logged-in user -->
                                    <form action="<?= BASEURL; ?>/Admin/hapus" method="POST" class="form-hapus"
                                        style="display:inline-block;" data-id="<?= $ustadz['id'] ?>">
                                        <input type="hidden" name="id" value="<?= $ustadz['id']; ?>">
                                        <input type="hidden" name="status" value="<?= $ustadz['role']; ?>">
                                        <button type="button" class="btn btn-danger hapus-ustadz"
                                            data-id="<?= $ustadz['id']; ?>">Hapus</button>
                                    </form>
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalEditUstadz<?= $ustadz['id'] ?>">Edit</button>
                                <?php else: ?>
                                    <!-- Hide Edit and Delete buttons for the logged-in admin -->
                                <?php endif; ?>
                            </td>
                        </tr>

                        <!-- Modal for Edit Ustadz -->
                        <div class="modal fade" id="modalEditUstadz<?= $ustadz['id'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="modalEditUstadzLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditUstadzLabel">Edit Ustadz</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL; ?>/Admin/edit" method="POST">
                                            <input type="hidden" name="id" value="<?= $ustadz['id'] ?>">

                                            <!-- Email Field -->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?= htmlspecialchars($ustadz['email'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Nama Lengkap Field -->
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap"
                                                    value="<?= htmlspecialchars($ustadz['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Alamat Field -->
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value="<?= htmlspecialchars($ustadz['alamat'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Nomor HP Field -->
                                            <div class="form-group">
                                                <label for="no_hp">Nomor HP</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="<?= htmlspecialchars($ustadz['no_hp'], ENT_QUOTES, 'UTF-8') ?>"
                                                    required>
                                            </div>

                                            <!-- Role Field (Read-Only) -->
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" class="form-control" id="role" name="role"
                                                    value="<?= htmlspecialchars($ustadz['role'], ENT_QUOTES, 'UTF-8') ?>"
                                                    readonly>
                                            </div>

                                            <!-- Password Field (Optional) -->
                                            <div class="form-group">
                                                <label for="password">Password (Leave blank if not changing)</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Ustadz</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Modal Tambah Ustadz -->
        <div class="modal fade" id="modalTambahUstadz" tabindex="-1" role="dialog" aria-labelledby="tambahUstadzLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahUstadzLabel">Tambah Ustadz Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formTambahUstadz" action="<?= BASEURL; ?>/Admin/tambah" method="POST">

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama_lengkap" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="hp">Nomor HP:</label>
                                <input type="tel" class="form-control" id="hp" name="no_hp" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <input type="text" class="form-control" id="role" name="role" value="ustadz" readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="formTambahUstadz">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Data Santri Section -->
        <section id="santri" class="content-section">
            <h2>Data Santri</h2>

            <!-- Search Bar -->
            <input type="text" id="searchSantri" class="form-control mb-3" placeholder="Cari Santri..."
                onkeyup="searchData('santri')">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSantri">Tambah
                Santri</button>
            <table class="table table-bordered" id="santriTable">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['santri'] as $santri): ?>
                        <tr>
                            <td><?= htmlspecialchars($santri['email'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>*****</td> <!-- Hide the password for security purposes -->
                            <td><?= htmlspecialchars($santri['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($santri['alamat'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($santri['no_hp'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <!-- Only show Edit and Delete buttons if not the logged-in user -->
                                <form action="<?= BASEURL; ?>/Admin/hapus" method="POST" class="form-hapus"
                                    style="display:inline-block;" data-id="<?= $santri['id'] ?>">
                                    <input type="hidden" name="id" value="<?= $santri['id']; ?>">
                                    <input type="hidden" name="status" value="<?= $santri['role']; ?>">
                                    <button type="button" class="btn btn-danger hapus-admin"
                                        data-id="<?= $santri['id']; ?>">Hapus</button>
                                </form>
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#modalEditSantri<?= $santri['id'] ?>">Edit</button>
                        </td>
                        </tr>
                    <?php endforeach; ?>

                   

                </tbody>
            </table>
        </section>


        <!-- Modal Tambah Santri -->
        <div class="modal fade" id="modalTambahSantri" tabindex="-1" role="dialog" aria-labelledby="tambahSantriLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahSantriLabel">Tambah Santri Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="formTambahSantri" action="<?= BASEURL; ?>/Admin/tambah" method="POST">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama_lengkap" required>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <!-- Nomor HP -->
                            <div class="form-group">
                                <label for="no_hp">Nomor HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>

                            <!-- Role -->
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <input type="text" class="form-control" id="role" name="role" value="santri" readonly>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Tambah Santri</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit Santri -->
        <?php foreach ($data['santri'] as $santri): ?>
            <div class="modal fade" id="modalEditSantri<?= $santri['id'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="editSantriLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSantriLabel">Edit Data Santri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/Admin/edit" method="POST">
                                <input type="hidden" name="id" value="<?= $santri['id'] ?>">

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?= htmlspecialchars($santri['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="<?= htmlspecialchars($santri['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" name="alamat"
                                        value="<?= htmlspecialchars($santri['alamat'], ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">Nomor HP:</label>
                                    <input type="text" class="form-control" name="no_hp"
                                        value="<?= htmlspecialchars($santri['no_hp'], ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <input type="text" class="form-control" name="role" value="santri" readonly>
                                </div>


                                <!-- Password Field (Optional) -->
                                <div class="form-group">
                                    <label for="password">Password (Leave blank if not changing)</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Mata Pelajaran Section -->
        <section id="pelajaran" class="content-section">
            <h2 class="text-center mb-4">Daftar Mata Pelajaran</h2>
            <div class="pelajaran-container row">
                <!-- Menampilkan daftar mata pelajaran -->
                <?php foreach ($data['mataPelajaran'] as $pelajaran): ?>
                    <div class="col-md-4 mb-4">
                        <div class="pelajaran-card card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pelajaran['nama_pelajaran'] ?></h5>
                                <p class="card-text"><strong>ID Pelajaran:</strong> <?= $pelajaran['id_pelajaran'] ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalEditPelajaran<?= $pelajaran['id_pelajaran'] ?>">Edit</button>
                                    <form action="<?= BASEURL; ?>/Admin/hapusMataPelajaran" method="POST"
                                        style="display: inline;">
                                        <!-- Menggunakan input hidden untuk mengirimkan id_pelajaran ke controller -->
                                        <input type="hidden" name="id_pelajaran" value="<?= $pelajaran['id_pelajaran'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tombol untuk membuka modal tambah mata pelajaran -->
            <div class="text-center mt-4">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalTambahPelajaran">Tambah Mata
                    Pelajaran</button>
            </div>
        </section>


        <!-- Modal untuk menambah mata pelajaran -->
        <div class="modal fade" id="modalTambahPelajaran" tabindex="-1" role="dialog"
            aria-labelledby="modalTambahPelajaranLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahPelajaranLabel">Tambah Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk tambah pelajaran -->
                        <form action="<?= BASEURL; ?>/Admin/tambahMataPelajaran" method="POST">
                            <div class="form-group">
                                <label for="nama_pelajaran">Nama Pelajaran</label>
                                <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Mata Pelajaran -->
        <?php foreach ($data['mataPelajaran'] as $pelajaran): ?>
            <div class="modal fade" id="modalEditPelajaran<?= $pelajaran['id_pelajaran'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="modalEditPelajaranLabel<?= $pelajaran['id_pelajaran'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditPelajaranLabel<?= $pelajaran['id_pelajaran'] ?>">Edit
                                Mata Pelajaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk edit pelajaran -->
                            <form action="<?= BASEURL; ?>/Admin/editMataPelajaran" method="POST">
                                <!-- Pastikan ID mata pelajaran dikirimkan dengan benar -->
                                <input type="hidden" name="id_pelajaran" value="<?= $pelajaran['id_pelajaran'] ?>">

                                <div class="form-group">
                                    <label for="editNamaPelajaran<?= $pelajaran['id_pelajaran'] ?>">Nama
                                        Pelajaran</label>
                                    <input type="text" class="form-control"
                                        id="editNamaPelajaran<?= $pelajaran['id_pelajaran'] ?>" name="nama_pelajaran"
                                        value="<?= $pelajaran['nama_pelajaran'] ?>" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <section id="jadwal" class="content-section">
            <h2>Jadwal</h2>
            <div class="jadwal-container">
                <?php
                // Inisialisasi array untuk menyimpan jadwal per hari
                $jadwalPerHari = [
                    'Senin' => [],
                    'Selasa' => [],
                    'Rabu' => [],
                    'Kamis' => [],
                    'Jumat' => [],
                    'Sabtu' => [],
                    'Minggu' => []
                ];

                // Kelompokkan jadwal berdasarkan hari
                foreach ($data['jadwal'] as $jadwal) {
                    $hari = $jadwal['hari']; // Misalnya 'Senin', 'Selasa', dsb.
                    if (array_key_exists($hari, $jadwalPerHari)) {
                        $jadwalPerHari[$hari][] = $jadwal;
                    }
                }

                // Looping untuk setiap hari
                foreach ($jadwalPerHari as $hari => $jadwals): ?>
                    <div class="jadwal-box" id="jadwal<?= $hari ?>">
                        <h3><?= $hari ?></h3>
                        <ul id="listJadwal<?= $hari ?>">
                            <?php foreach ($jadwals as $jadwal): ?>
                                <li data-id="<?= $jadwal['id_jadwal'] ?>">
                                    <span>
                                        <?php
                                        // Format waktu jika 'waktu' adalah objek DateTime
                                        if ($jadwal['waktu'] instanceof DateTime) {
                                            echo $jadwal['waktu']->format('H:i');
                                        } else {
                                            echo 'Waktu tidak valid';
                                        }
                                        ?>
                                    </span> -
                                    <strong><?= $jadwal['nama_pelajaran'] ?></strong> -
                                    <strong><?= $jadwal['nama_lengkap'] ?></strong>
                                    <button class="btn btn-success btn-sm tambah-jadwal" data-toggle="modal"
                                        data-target="#modalEditJadwal" data-id="<?= $jadwal['id_jadwal'] ?>"
                                        data-pelajaran="<?= $jadwal['id_pelajaran'] ?>" data-ustadz="<?= $jadwal['id_user'] ?>"
                                        data-waktu="<?= $jadwal['waktu']->format('H:i') ?>"
                                        data-hari="<?= $jadwal['hari'] ?>">Edit</button>
                                    <form action="<?= BASEURL; ?>/Admin/hapusJadwal" method="POST" style="display: inline;">
                                        <!-- Menggunakan input hidden untuk mengirimkan id_jadwal ke controller -->
                                        <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <button class="btn btn-success btn-sm tambah-jadwal" data-toggle="modal"
                            data-target="#modalTambahJadwal" data-day="<?= strtolower($hari) ?>">Tambah
                            Jadwal</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Modal Tambah Jadwal -->
        <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="modalJadwalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalJadwalLabel">Tambah Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formJadwal" action="<?= BASEURL; ?>/Admin/tambahJadwal" method="POST">
                            <input type="hidden" id="jadwalId" name="jadwalId">

                            <div class="form-group">
                                <label for="mataPelajaran">Mata Pelajaran:</label>
                                <select class="form-control" id="mataPelajaran" name="id_pelajaran" required>
                                    <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                    <!-- Looping untuk menampilkan mata pelajaran -->
                                    <?php foreach ($data['mataPelajaran'] as $pelajaran): ?>
                                        <option value="<?= $pelajaran['id_pelajaran'] ?>">
                                            <?= $pelajaran['nama_pelajaran'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ustadz">Ustadz:</label>
                                <select class="form-control" id="ustadz" name="id_user" required>
                                    <option value="" disabled selected>Pilih Ustadz</option>
                                    <!-- Looping untuk menampilkan nama ustadz -->
                                    <?php foreach ($data['ustadz'] as $ustadz): ?>
                                        <option value="<?= $ustadz['id'] ?>">
                                            <?= $ustadz['nama_lengkap'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="waktu">Waktu:</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" required>
                            </div>

                            <div class="form-group">
                                <label for="hari">Hari:</label>
                                <select class="form-control" id="hari" name="hari" required>
                                    <option value="" disabled selected>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="formJadwal">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Jadwal -->
        <div class="modal fade" id="modalEditJadwal" tabindex="-1" role="dialog" aria-labelledby="modalEditJadwalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditJadwalLabel">Edit Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk Edit Jadwal -->
                        <form id="formEditJadwal" action="<?= BASEURL; ?>/Admin/editJadwal" method="POST">
                            <input type="hidden" id="editJadwalId" name="jadwalId">

                            <div class="form-group">
                                <label for="editMataPelajaran">Mata Pelajaran:</label>
                                <select class="form-control" id="editMataPelajaran" name="id_pelajaran" required>
                                    <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                    <?php foreach ($data['mataPelajaran'] as $pelajaran): ?>
                                        <option value="<?= $pelajaran['id_pelajaran'] ?>">
                                            <?= $pelajaran['nama_pelajaran'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editUstadz">Ustadz:</label>
                                <select class="form-control" id="editUstadz" name="id_user" required>
                                    <option value="" disabled selected>Pilih Ustadz</option>
                                    <?php foreach ($data['ustadz'] as $ustadz): ?>
                                        <option value="<?= $ustadz['id'] ?>">
                                            <?= $ustadz['nama_lengkap'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editWaktu">Waktu:</label>
                                <input type="time" class="form-control" id="editWaktu" name="waktu" required>
                            </div>

                            <div class="form-group">
                                <label for="editHari">Hari:</label>
                                <input type="text" class="form-control" id="editHari" name="hari" readonly>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="formEditJadwal">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perizinan Section -->
        <section id="perizinan" class="content-section">
            <h2>Perizinan Pending</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Santri</th>
                        <th>Tanggal Izin</th>
                        <th>Tanggal Kembali</th>
                        <th>Jenis Izin</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['perizinan'] as $izin):
                        if ($izin['status'] == 'pending'): ?>
                            <tr>
                                <td><?= $izin['nama_lengkap'] ?></td> <!-- Menampilkan nama lengkap santri -->
                                <td>
                                    <?php
                                    // Memformat tanggal_izin jika diperlukan
                                    if ($izin['tanggal_izin'] instanceof DateTime) {
                                        echo $izin['tanggal_izin']->format('Y-m-d');
                                    } else {
                                        echo $izin['tanggal_izin'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // Memformat tanggal_kembali jika diperlukan
                                    if ($izin['tanggal_kembali'] instanceof DateTime) {
                                        echo $izin['tanggal_kembali']->format('Y-m-d');
                                    } else {
                                        echo $izin['tanggal_kembali'];
                                    }
                                    ?>
                                </td>
                                <td><?= $izin['jenis_izin'] ?></td>
                                <td><?= $izin['alasan'] ?></td>
                                <td><?= $izin['status'] ?></td>
                                <td>
                                    <form action="<?= BASEURL; ?>/Admin/approvePerizinan" method="POST"
                                        style="display:inline-block;">
                                        <input type="hidden" name="id" value="<?= $izin['id']; ?>">
                                        <input type="hidden" name="status" value="setuju">
                                        <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Apakah Anda yakin ingin menyetujui perizinan ini?')">Approve</button>
                                    </form>


                                    <form action="<?= BASEURL; ?>/Admin/approvePerizinan" method="POST"
                                        style="display:inline-block;">
                                        <input type="hidden" name="id" value="<?= $izin['id']; ?>">
                                        <input type="hidden" name="status" value="tidak setuju">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menolak perizinan ini?')">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Tagihan Section -->
        <section id="tagihan" class="content-section">
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalBuatTagihan">Buat Tagihan
                Baru</button>
            <h2>Tagihan</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Santri</th>
                        <th>Jenis Tagihan</th>
                        <th>Jumlah</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan data tagihan menggunakan PHP -->
                    <?php foreach ($data['tagihan'] as $tagihan): ?>
                        <tr>
                            <!-- Nama Santri -->
                            <td><?php echo htmlspecialchars($tagihan['nama_santri']); ?></td>
                            <!-- Jenis Tagihan -->
                            <td><?php echo htmlspecialchars($tagihan['jenis_tagihan']); ?></td>
                            <!-- Jumlah -->
                            <td>Rp <?php echo number_format($tagihan['jumlah'], 0, ',', '.'); ?></td>
                            <!-- Tanggal Jatuh Tempo -->
                            <td>
                                <?php
                                // Pastikan jatuh_tempo ada dan valid
                                if (isset($tagihan['jatuh_tempo']) && !empty($tagihan['jatuh_tempo'])) {
                                    // Cek apakah jatuh_tempo sudah dalam bentuk objek DateTime
                                    if ($tagihan['jatuh_tempo'] instanceof DateTime) {
                                        // Jika sudah DateTime, format langsung
                                        echo $tagihan['jatuh_tempo']->format('d F Y');
                                    } else {
                                        // Jika bukan objek DateTime (misalnya string), coba buat objek DateTime
                                        $jatuhTempo = $tagihan['jatuh_tempo'];

                                        // Pastikan format tanggal valid sebelum diubah ke DateTime
                                        if (is_string($jatuhTempo)) {
                                            try {
                                                // Mengonversi string menjadi objek DateTime
                                                $date = new DateTime($jatuhTempo);
                                                // Formatkan objek DateTime menjadi string yang bisa ditampilkan
                                                echo $date->format('d F Y');
                                            } catch (Exception $e) {
                                                // Menampilkan pesan jika format tanggal tidak valid
                                                echo "Format Tanggal Salah";
                                            }
                                        } else {
                                            // Jika jatuh_tempo bukan string
                                            echo "Format Tanggal Tidak Valid";
                                        }
                                    }
                                } else {
                                    // Jika jatuh_tempo kosong atau NULL
                                    echo "Tanggal Tidak Tersedia";
                                }
                                ?>
                            </td>

                            <!-- Status -->
                            <td><?php echo ucfirst($tagihan['status']); ?></td>

                            <!-- Bukti Pembayaran -->
                            <td>
                                <?php if (!empty($tagihan['bukti_pembayaran'])): ?>
                                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalLihatBukti"
                                        data-url="<?php echo BASEURL . '/img/buktiPembayaran/' . htmlspecialchars($tagihan['bukti_pembayaran']); ?>">
                                        Lihat Bukti
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-secondary btn-sm" disabled>Bukti Tidak Tersedia</button>
                                <?php endif; ?>
                            </td>

                            <!-- Aksi -->
                            <td>
                                <?php if ($tagihan['status'] == 'belum lunas'): ?>
                                    <!-- Tombol Tandai Lunas -->
                                    <button class="btn btn-success btn-sm" data-id="<?php echo $tagihan['id_tagihan']; ?>"
                                        onclick="ubahStatus(<?php echo $tagihan['id_tagihan']; ?>, 'lunas')">Tandai
                                        Lunas</button>
                                <?php endif; ?>

                                <?php if ($tagihan['status'] != 'lunas'): ?>
                                    <!-- Tombol Tandai Pending -->
                                    <button class="btn btn-warning btn-sm" data-id="<?php echo $tagihan['id_tagihan']; ?>"
                                        onclick="ubahStatus(<?php echo $tagihan['id_tagihan']; ?>, 'pending')">Tandai
                                        Pending</button>
                                <?php endif; ?>

                                <?php if ($tagihan['status'] != 'belum lunas'): ?>
                                    <!-- Tombol Tandai Belum Lunas -->
                                    <button class="btn btn-danger btn-sm" data-id="<?php echo $tagihan['id_tagihan']; ?>"
                                        onclick="ubahStatus(<?php echo $tagihan['id_tagihan']; ?>, 'belum lunas')">Tandai
                                        Belum Lunas</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <script>
            function ubahStatus(idTagihan, status) {
                var data = {
                    id_tagihan: idTagihan,
                    status: status
                };

                $.ajax({
                    url: "<?php echo BASEURL; ?>/Admin/editStatusTagihan",  // Endpoint controller
                    type: "POST",  // Menggunakan metode POST
                    data: data,  // Data yang dikirim
                    dataType: "json",  // Pastikan server merespons dalam format JSON
                    success: function (response) {
                        if (response.success) {
                            // Mengubah status berdasarkan status baru yang diterima
                            var statusLabel = getStatusLabel(response.status);
                            var statusBadgeClass = getStatusBadgeClass(response.status);

                            // Memperbarui status pada elemen dengan ID yang sesuai
                            $('#statusTagihan_' + idTagihan).html('<span class="badge ' + statusBadgeClass + '">' + statusLabel + '</span>');

                            // Menampilkan SweetAlert dengan notifikasi sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Tagihan Berhasil Diubah',
                                text: 'Status tagihan berhasil diperbarui menjadi ' + statusLabel,
                                showConfirmButton: true,
                                timer: 3000  // Menampilkan alert selama 3 detik
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            // Menampilkan SweetAlert dengan notifikasi error
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mengubah Status',
                                text: 'Terjadi kesalahan saat mengubah status tagihan.',
                                showConfirmButton: true
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        // Menampilkan SweetAlert dengan notifikasi error jika AJAX gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal menghubungi server. Coba lagi nanti.',
                            showConfirmButton: true
                        });
                    }
                });
            }
        </script>

        <script>
            function getStatusLabel(status) {
                switch (status) {
                    case 'lunas':
                        return 'Lunas';
                    case 'pending':
                        return 'Pending';
                    case 'belum lunas':
                        return 'Belum Lunas';
                    default:
                        return 'Status Tidak Dikenal';
                }
            }

            function getStatusBadgeClass(status) {
                switch (status) {
                    case 'lunas':
                        return 'badge-success';
                    case 'pending':
                        return 'badge-warning';
                    case 'belum lunas':
                        return 'badge-danger';
                    default:
                        return 'badge-secondary';
                }
            }
        </script>


        <!-- Modal untuk melihat bukti pembayaran -->
        <div class="modal fade" id="modalLihatBukti" tabindex="-1" role="dialog" aria-labelledby="modalLihatBuktiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLihatBuktiLabel">Lihat Bukti Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="buktiPembayaranImg" src="" alt="Bukti Pembayaran" class="img-fluid">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Buat Tagihan Baru -->
        <div class="modal fade" id="modalBuatTagihan" tabindex="-1" role="dialog"
            aria-labelledby="modalBuatTagihanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBuatTagihanLabel">Buat Tagihan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formBuatTagihan" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="idUsers">Nama Santri:</label>
                                <select class="form-control" id="idUsers" name="id_users" required>
                                    <option value="">Pilih Santri</option>
                                    <?php foreach ($data['santri'] as $user): ?>
                                        <option value="<?= $user['id']; ?>">
                                            <?= htmlspecialchars($user['nama_lengkap'], ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jenisTagihan">Jenis Tagihan:</label>
                                <input type="text" class="form-control" id="jenisTagihan" name="jenis_tagihan"
                                    placeholder="Contoh: SPP Mei" required>
                            </div>

                            <div class="form-group">
                                <label for="jumlahTagihan">Jumlah:</label>
                                <input type="number" class="form-control" id="jumlahTagihan" name="jumlah"
                                    placeholder="Masukkan jumlah tagihan" required>
                            </div>

                            <div class="form-group">
                                <label for="jatuhTempo">Jatuh Tempo:</label>
                                <input type="date" class="form-control" id="jatuhTempo" name="jatuh_tempo" required>
                            </div>

                            <div class="form-group">
                                <label for="statusTagihan">Status:</label>
                                <select class="form-control" id="statusTagihan" name="status">
                                    <option value="pending">Pending</option>
                                    <option value="belum lunas">Belum Lunas</option>
                                    <option value="lunas">Lunas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="buktiPembayaran">Bukti Pembayaran:</label>
                                <input type="file" class="form-control-file" id="buktiPembayaran"
                                    name="bukti_pembayaran">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="btnSimpanTagihan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function () {
                // Tangani event klik tombol 'Lihat Bukti'
                $('#modalLihatBukti').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Tombol yang diklik
                    var imageUrl = button.data('url');   // Ambil URL gambar dari data-url tombol

                    // Setel URL gambar di modal
                    var modal = $(this);
                    modal.find('#buktiPembayaranImg').attr('src', imageUrl);
                });

                $('#btnSimpanTagihan').on('click', function (e) {
                    e.preventDefault();

                    // Client-side validation
                    var idUsers = $('#idUsers').val();
                    var jenisTagihan = $('#jenisTagihan').val();
                    var jumlah = $('#jumlahTagihan').val();
                    var jatuhTempo = $('#jatuhTempo').val();

                    if (!idUsers || !jenisTagihan || !jumlah || !jatuhTempo) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Validasi Gagal',
                            text: 'Mohon lengkapi semua field yang diperlukan'
                        });
                        return;
                    }

                    var formData = new FormData($('#formBuatTagihan')[0]);

                    $.ajax({
                        url: '<?= BASEURL; ?>/Admin/tambahTagihanSantri',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message || 'Terjadi kesalahan'
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: `
                            Status: ${status}<br>
                            Error: ${error}<br>
                            Response: ${xhr.responseText}
                        `
                            });
                        }
                    });
                });
            });
        </script>


        <!-- Kembali ke home Section -->
        <div id="exitConfirmationModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="closeModal">&times;</span>
                <h2>Konfirmasi</h2>
                <p>Apakah Anda yakin ingin kembali ke Beranda?</p>
                <button id="confirmExit">Ya</button>
                <button class="closeModal">Tidak</button>
            </div>
        </div>

    </main>
    </div>

    <script>
        $(document).ready(function () {
            // Ketika tombol Edit diklik
            $('.edit-santri').on('click', function () {
                var id = $(this).data('id'); // Ambil ID santri dari data-id tombol
                var row = $(this).closest('tr'); // Mendapatkan baris (tr) tempat tombol Edit berada

                // Ambil data santri dari tabel
                var email = row.find('td:eq(0)').text();
                var nama_lengkap = row.find('td:eq(2)').text();
                var alamat = row.find('td:eq(3)').text();
                var no_hp = row.find('td:eq(4)').text();
                var role = row.find('td:eq(5)').text(); // Role ada di kolom terakhir, sesuaikan dengan kolom role yang ada

                // Isi data di modal edit
                $('#edit-id').val(id);
                $('#edit-email').val(email);
                $('#edit-nama').val(nama_lengkap);
                $('#edit-alamat').val(alamat);
                $('#edit-hp').val(no_hp);
                $('#edit-role').val(role);

                // Tampilkan modal Edit Santri
                $('#modalEditSantri').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Ketika tombol edit diklik
            $('.tambah-jadwal').click(function () {
                // Ambil data dari tombol
                var idJadwal = $(this).data('id');
                var idPelajaran = $(this).data('pelajaran');
                var idUstadz = $(this).data('ustadz');
                var waktu = $(this).data('waktu');
                var hari = $(this).data('hari');

                // Isi data ke dalam modal
                $('#editJadwalId').val(idJadwal);
                $('#editMataPelajaran').val(idPelajaran);
                $('#editUstadz').val(idUstadz);
                $('#editWaktu').val(waktu);
                $('#editHari').val(hari);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const homeLink = document.querySelector('a[href="#beranda"]');

            homeLink.addEventListener('click', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to exit the application?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, exit it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX call to the server to handle logout
                        fetch('<?= BASEURL; ?>/Umum/logout') // Sesuaikan URL dengan endpoint logout Anda
                            .then(() => {
                                Swal.fire({
                                    title: "Logged Out",
                                    text: "You have exited the application successfully.",
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = '<?= BASEURL; ?>';
                                });
                            })
                            .catch(error => {
                                console.error('Logout failed:', error);
                                Swal.fire("Error!", "An error occurred while trying to logout.", "error");
                            });
                    } else {
                        Swal.fire({
                            title: "Cancelled!",
                            text: "You have canceled the exit process.",
                            icon: "error"
                        }).then(() => {
                            window.location.href = '<?= BASEURL; ?> /Admin'; // Arahkan kembali ke dashboard jika pengguna membatalkan
                        });
                    }
                });
            });
        });
    </script>

    <script>
        // Ketika tombol "Ubah" diklik
        document.getElementById("edit-button").addEventListener("click", function () {
            // Sembunyikan data teks biasa
            document.querySelector(".data-pribadi").style.display = "none";

            // Tampilkan form input untuk edit
            document.querySelector(".profile-form").style.display = "block";

            // Menyalin data dari teks ke input (untuk memulai editing)
            document.getElementById("nama-input").value = document.getElementById("nama-text").innerText;
            document.getElementById("kelas-input").value = document.getElementById("kelas-text").innerText;
            document.getElementById("alamat-input").value = document.getElementById("alamat-text").innerText;
            document.getElementById("hp-input").value = document.getElementById("hp-text").innerText;

            // Ganti tombol "Ubah" menjadi tidak terlihat setelah klik
            document.getElementById("edit-button").style.display = "none";
        });

        // Ketika tombol "Cancel" diklik
        document.getElementById("cancel-button").addEventListener("click", function () {
            // Sembunyikan form input
            document.querySelector(".profile-form").style.display = "none";

            // Tampilkan data teks biasa
            document.querySelector(".data-pribadi").style.display = "block";

            // Ganti tombol "Ubah" menjadi terlihat kembali
            document.getElementById("edit-button").style.display = "inline-block";
        });
    </script>

    <!-- Fungsional Search Bar -->
    <script>
        function searchData(section) {
            // Menentukan ID berdasarkan section (admin atau santri)
            let input = document.getElementById('search' + capitalizeFirstLetter(section));
            let filter = input.value.toLowerCase();
            let table = document.getElementById(section + 'Table');
            let tr = table.getElementsByTagName('tr');

            // Loop through all rows in the table, except the first (header)
            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td');
                let match = false;

                // Loop through each td (column) in the row and check if any matches the search term
                for (let j = 0; j < td.length - 1; j++) { // -1 to skip the last action column
                    if (td[j]) {
                        if (td[j].innerText.toLowerCase().includes(filter)) {
                            match = true;
                            break;
                        }
                    }
                }

                // Display the row if match found, otherwise hide it
                if (match) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // Function to capitalize first letter of the string
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar nav ul li a');
            const sections = document.querySelectorAll('.content-section');

            function setActiveSection(activeId) {
                $('.modal').modal('hide');
                sections.forEach(section => {
                    section.style.display = 'none';
                });

                const activeSection = document.getElementById(activeId);
                if (activeSection) {
                    activeSection.style.display = 'block';
                }

                links.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').substring(1) === activeId) {
                        link.classList.add('active');
                    }
                });
            }

            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    setActiveSection(targetId);
                    window.location.hash = targetId; // Update the URL hash
                });
            });

            // Check URL hash on load and set the active section accordingly
            const initialSection = window.location.hash.substring(1);
            if (initialSection) {
                setActiveSection(initialSection);
            } else if (sections.length > 0) {
                setActiveSection('dashboard');
            }
        });
    </script>

    <script>
        // Fungsi untuk mengupdate waktu setiap detik
        function updateClock() {
            var currentDate = new Date();

            // Mengambil jam, menit, dan detik
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();

            // Menambahkan 0 di depan angka jika kurang dari 10
            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (seconds < 10) seconds = '0' + seconds;

            // Format jam dalam bentuk hh:mm:ss
            var formattedTime = hours + ':' + minutes + ':' + seconds;

            // Menampilkan waktu di elemen dengan ID 'realTimeClock'
            document.getElementById('realTimeClock').textContent = formattedTime;
        }

        // Memanggil fungsi updateClock setiap detik (1000 ms)
        setInterval(updateClock, 1000);

        // Panggil satu kali saat halaman pertama dimuat untuk menampilkan waktu langsung
        updateClock();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Mempersiapkan SweetAlert dengan styling Bootstrap
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success ml-2",
                cancelButton: "btn btn-danger ml-2"
            },
            buttonsStyling: false
        });

        // Menambahkan event listener untuk tombol "Hapus Admin"
        document.querySelectorAll(".hapus-admin").forEach(button => {
            button.addEventListener("click", function () {
                const idToDelete = this.getAttribute("data-id"); // Mengambil ID dari tombol
                const form = this.closest("form"); // Mendapatkan form yang terkait dengan tombol

                // Menampilkan SweetAlert konfirmasi sebelum hapus
                swalWithBootstrapButtons.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirimkan form untuk penghapusan
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Data tidak jadi dihapus.",
                            icon: "error"
                        });
                    }
                });
            });
        });

        // Menambahkan event listener untuk tombol "Hapus Admin"
        document.querySelectorAll(".hapus-ustadz").forEach(button => {
            button.addEventListener("click", function () {
                const idToDelete = this.getAttribute("data-id"); // Mengambil ID dari tombol
                const form = this.closest("form"); // Mendapatkan form yang terkait dengan tombol

                // Menampilkan SweetAlert konfirmasi sebelum hapus
                swalWithBootstrapButtons.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirimkan form untuk penghapusan
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Data tidak jadi dihapus.",
                            icon: "error"
                        });
                    }
                });
            });
        });

        // Menambahkan event listener untuk tombol "Hapus Santri"
        document.querySelectorAll(".hapus-santri").forEach(button => {
            button.addEventListener("click", function () {
                const idToDelete = this.getAttribute("data-id"); // Mendapatkan ID dari tombol
                const form = document.querySelector(`.form-hapus[data-id="${idToDelete}"]`); // Mencari form berdasarkan data-id

                // Menampilkan SweetAlert konfirmasi sebelum hapus
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirimkan form untuk penghapusan
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your data is safe :)",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const jadwalContainer = document.querySelector('.jadwal-container');
            const modal = $('#modalJadwal');

            // Tambah Jadwal
            jadwalContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('tambah-jadwal')) {
                    const day = e.target.getAttribute('data-day');
                    document.getElementById('hari').value = day;
                    document.getElementById('jadwalId').value = '';
                    document.getElementById('jamMulai').value = '';
                    document.getElementById('jamSelesai').value = '';
                    document.getElementById('mataPelajaran').value = '';
                    modal.modal('show');
                }
            });

            // Edit Jadwal
            jadwalContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('edit-jadwal')) {
                    const listItem = e.target.closest('li');
                    const day = listItem.closest('.jadwal-box').id.replace('jadwal', '');
                    document.getElementById('hari').value = day;
                    document.getElementById('jadwalId').value = listItem.getAttribute('data-id');
                    document.getElementById('jamMulai').value = '08:00'; // Ganti dengan data asli
                    document.getElementById('jamSelesai').value = '10:00'; // Ganti dengan data asli
                    document.getElementById('mataPelajaran').value = 'Bahasa Indonesia'; // Ganti dengan data asli
                    modal.modal('show');
                }
            });

            // Hapus Jadwal
            jadwalContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('delete-jadwal')) {
                    const listItem = e.target.closest('li');
                    listItem.remove();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Lihat Bukti Pembayaran
            document.querySelectorAll('.lihat-bukti').forEach(button => {
                button.addEventListener('click', function () {
                    const buktiUrl = this.getAttribute('data-url');
                    if (buktiUrl) {
                        document.getElementById('buktiPembayaranImg').src = buktiUrl;
                        $('#modalBuktiPembayaran').modal('show');
                    }
                });
            });

            // Verifikasi Tagihan (Tandai Lunas)
            document.querySelectorAll('.verifikasi-tagihan').forEach(button => {
                button.addEventListener('click', function () {
                    const paymentId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Tagihan akan ditandai sebagai lunas.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, tandai lunas!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire('Berhasil!', 'Tagihan telah ditandai sebagai lunas.', 'success');
                            // Update status di tabel
                            const row = this.closest('tr');
                            row.querySelector('td:nth-child(5)').textContent = 'Lunas';
                        }
                    });
                });
            });

            // Tolak Tagihan (Tandai Belum Lunas)
            document.querySelectorAll('.tolak-tagihan').forEach(button => {
                button.addEventListener('click', function () {
                    const paymentId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Tagihan akan ditandai sebagai belum lunas.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, tandai belum lunas!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire('Berhasil!', 'Tagihan telah ditandai sebagai belum lunas.', 'error');
                            // Update status di tabel
                            const row = this.closest('tr');
                            row.querySelector('td:nth-child(5)').textContent = 'Belum Lunas';
                        }
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const formBuatTagihan = document.getElementById('formBuatTagihan');
            const tbody = document.querySelector('#tagihanAdmin table tbody');

            formBuatTagihan.addEventListener('submit', function (e) {
                header('Location: '.BASEURL. '/admin#tagihan');

                // Ambil data dari form
                const namaSantri = document.getElementById('namaSantri').value;
                const jenisTagihan = document.getElementById('jenisTagihan').value;
                const jumlahTagihan = document.getElementById('jumlahTagihan').value;
                const jatuhTempo = document.getElementById('jatuhTempo').value;
                const statusTagihan = document.getElementById('statusTagihan').value;

                // Tambahkan baris baru ke tabel
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${namaSantri}</td>
            <td>${jenisTagihan}</td>
            <td>Rp ${parseInt(jumlahTagihan).toLocaleString()}</td>
            <td>${jatuhTempo}</td>
            <td>${statusTagihan.charAt(0).toUpperCase() + statusTagihan.slice(1)}</td>
            <td><button class="btn btn-secondary btn-sm lihat-bukti" disabled>Bukti Tidak Tersedia</button></td>
            <td>
                <button class="btn btn-success btn-sm verifikasi-tagihan">Tandai Lunas</button>
                <button class="btn btn-danger btn-sm tolak-tagihan">Tandai Belum Lunas</button>
            </td>
        `;
                tbody.appendChild(row);

                // Reset form dan tutup modal
                formBuatTagihan.reset();
                $('#modalBuatTagihan').modal('hide');

                // Tambahkan logika untuk tombol baru jika diperlukan
            });
        });


    </script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>