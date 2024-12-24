<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ustadz Pesantren</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
            --primary-color: #00a859;
            --primary-dark: #2e8b57;
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

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            left: 0;
            /* Changed from -280px to make visible by default */
            width: 280px;
            height: 100vh;
            background: var(--card-color);
            transition: var(--transition);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        /* Main content margin to accommodate visible sidebar */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            transition: var(--transition);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                left: -100%;
                width: 100%;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }

        .ustadz-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem auto;
            /* Center horizontally and keep bottom margin */
            border: 4px solid rgba(255, 255, 255, 0.2);
            padding: 3px;
            background: var(--card-color);
            transition: var(--transition);
            display: block;
            /* Makes margin auto work properly */
        }

        .admin-avatar:hover {
            transform: scale(1.05);
        }

        /* Ensure the sidebar header properly centers its content */
        .sidebar-header {
            padding: 2rem 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--card-color);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
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

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.querySelector('.sidebar-toggle'); // Tombol untuk membuka/menutup sidebar

            // Fungsi untuk toggle sidebar (tampilkan/ sembunyikan)
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('active'); // Menambah/menghapus kelas 'active'
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar nav ul li a'); // Link di sidebar
            const sections = document.querySelectorAll('.content-section');  // Semua section konten

            // Fungsi untuk mengaktifkan section berdasarkan ID
            function setActiveSection(sectionId) {
                sections.forEach(section => {
                    if (section.id === sectionId) {
                        section.classList.add('active'); // Menambahkan kelas 'active' pada section yang dipilih
                        section.style.display = 'block'; // Menampilkan section yang aktif
                    } else {
                        section.classList.remove('active'); // Menghapus kelas 'active' dari section yang tidak aktif
                        section.style.display = 'none'; // Menyembunyikan section yang tidak aktif
                    }
                });
            }

            // Menangani klik pada link sidebar
            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Mencegah halaman reload
                    const targetId = this.getAttribute('href').substring(1); // Mendapatkan ID section yang dituju
                    setActiveSection(targetId); // Mengaktifkan section yang dipilih
                    window.location.hash = targetId; // Update URL hash untuk navigasi
                });
            });

            // Mengecek hash URL saat halaman dimuat dan menampilkan section yang relevan
            const initialSection = window.location.hash.substring(1);
            if (initialSection) {
                setActiveSection(initialSection); // Menampilkan section berdasarkan hash URL
            } else if (sections.length > 0) {
                setActiveSection('dashboard'); // Jika tidak ada hash, tampilkan section default (misalnya 'dashboard')
            }
        });
    </script>
</head>

<body>
    <!-- Toggle Button -->
    <div class="toggle-btn" onclick="toggleSidebar()">
        <div class="toggle-content">

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
                            alt="Ustadz Avatar" class="ustadz-avatar">
                    <?php else: ?>
                        <img src="<?php echo BASEURL . '/img/Profile/default-avatar.png'; ?>" alt="Default Avatar"
                            class="ustadz-avatar">
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
                    <li><a href="#pelajaran">Mata Pelajaran</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#perizinan">Perizinan</a></li>
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
                    <h3>Perizinan Pending</h3>
                    <p><?= $data['jumlahIzin'] ?></p>
                    <small>Membutuhkan persetujuan</small>
                </div>

            </div>
        </section>

        <section id="pribadi" class="content-section">
            <h2>Data Pribadi</h2>

            <div class="data-pribadi">
                <table style="width: auto; border-collapse: collapse;">
                    <tr>
                        <td style="padding-right: 10px;"><strong>Nama Lengkap</strong></td>
                        <td>: <?= $data['users']['0']['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;"><strong>Email</strong></td>
                        <td>: <?= $data['users']['0']['email'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;"><strong>Role</strong></td>
                        <td>: <?= $data['users']['0']['role'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;"><strong>Alamat</strong></td>
                        <td>: <?= $data['users']['0']['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;"><strong>No. HP</strong></td>
                        <td>: <?= $data['users']['0']['no_hp'] ?></td>
                    </tr>
                </table>

            </div>

            <!-- Form untuk edit data pribadi dan upload gambar profil -->
            <form class="profile-form" style="display:none;" action="<?= BASEURL; ?>/Ustadz/edit" method="POST"
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

        <!-- Mata Pelajaran Section -->
        <section id="pelajaran" class="content-section">
            <h2 class="text-center mb-4">Daftar Mata Pelajaran</h2>
            <!-- Tombol untuk membuka modal tambah mata pelajaran -->
            <div class="text-center mt-4">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahPelajaran">Tambah Mata
                    Pelajaran</button>
            </div>
            <br>
            <div class="pelajaran-container row">
                <!-- Menampilkan daftar mata pelajaran -->
                <?php foreach ($data['mataPelajaran'] as $pelajaran): ?>
                    <div class="col-md-4 mb-4">
                        <div class="pelajaran-card card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pelajaran['nama_pelajaran'] ?></h5>
                                <p class="card-text"><strong>ID Pelajaran:</strong> <?= $pelajaran['id_pelajaran'] ?>
                                </p>
                                <div class="text-align: center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalEditPelajaran<?= $pelajaran['id_pelajaran'] ?>">Edit</button>
                                    <form action="<?= BASEURL; ?>/Ustadz/hapusMataPelajaran" method="POST"
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
        </section>


        <!-- Modal untuk menambah mata pelajaran -->
        <div class=" modal fade" id="modalTambahPelajaran" tabindex="-1" role="dialog"
                    aria-labelledby="modalTambahPelajaranLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahPelajaranLabel">Tambah Mata Pelajaran</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/Ustadz/tambahMataPelajaran" method="POST">
                                    <div class="form-group">
                                        <label for="nama_pelajaran">Nama Pelajaran</label>
                                        <input type="text" class="form-control" id="nama_pelajaran"
                                            name="nama_pelajaran" required>
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
                                    Mata
                                    Pelajaran</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/Ustadz/editMataPelajaran" method="POST">
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
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-warning btn-sm edit-jadwal" data-toggle="modal"
                                                data-target="#modalEditJadwal" data-id="<?= $jadwal['id_jadwal'] ?>"
                                                data-pelajaran="<?= $jadwal['id_pelajaran'] ?>" data-ustadz="<?= $jadwal['id_user'] ?>"
                                                data-waktu="<?= $jadwal['waktu']->format('H:i') ?>"
                                                data-hari="<?= $jadwal['hari'] ?>" style="margin-right: 5px;">Edit</button>
                                        <form action="<?= BASEURL; ?>/Admin/hapusJadwal" method="POST" style="display: inline;">
                                            <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                            </div>
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
            <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog"
                aria-labelledby="modalJadwalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalJadwalLabel">Tambah Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formJadwal" action="<?= BASEURL; ?>/Ustadz/tambahJadwal" method="POST">
                                <input type="hidden" id="jadwalId" name="jadwalId">
                                <div class="form-group">
                                    <label for="mataPelajaran">Mata Pelajaran:</label>
                                    <select class="form-control" id="mataPelajaran" name="id_pelajaran" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
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
                                        <?php foreach ($data['ustadz'] as $ustadz): ?>
                                            <option value="<?= $ustadz['id'] ?>"><?= $ustadz['nama_lengkap'] ?></option>
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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Edit Jadwal -->
            <div class="modal fade" id="modalEditJadwal" tabindex="-1" role="dialog"
                aria-labelledby="modalEditJadwalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditJadwalLabel">Edit Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditJadwal" action="<?= BASEURL; ?>/Ustadz/editJadwal" method="POST">
                                <!-- Hidden input untuk ID jadwal -->
                                <input type="hidden" id="editJadwalId" name="jadwalId">

                                <!-- Input untuk Mata Pelajaran -->
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

                                <!-- Input untuk Ustadz -->
                                <div class="form-group">
                                    <label for="editUstadz">Ustadz:</label>
                                    <select class="form-control" id="editUstadz" name="id_user" required>
                                        <option value="" disabled selected>Pilih Ustadz</option>
                                        <?php foreach ($data['ustadz'] as $ustadz): ?>
                                            <option value="<?= $ustadz['id'] ?>"><?= $ustadz['nama_lengkap'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input untuk Waktu -->
                                <div class="form-group">
                                    <label for="editWaktu">Waktu:</label>
                                    <input type="time" class="form-control" id="editWaktu" name="waktu" required>
                                </div>

                                <!-- Input untuk Hari -->
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
                                        <form action="<?= BASEURL; ?>/Ustadz/approvePerizinan" method="POST"
                                            style="display:inline-block;">
                                            <input type="hidden" name="id" value="<?= $izin['id']; ?>">
                                            <input type="hidden" name="status" value="setuju">
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui perizinan ini?')">Approve</button>
                                        </form>


                                        <form action="<?= BASEURL; ?>/Ustadz/approvePerizinan" method="POST"
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

    <!-- jQuery (untuk Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
                            window.location.href = '<?= BASEURL; ?> /Ustadz'; // Arahkan kembali ke dashboard jika pengguna membatalkan
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
            // Menentukan ID berdasarkan section (ustadz atau santri)
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

    <script>
        $(document).ready(function () {
            $('.edit-jadwal').click(function () {
                // Ambil data dari atribut data-* pada tombol Edit
                var id = $(this).data('id');
                var pelajaran = $(this).data('pelajaran');
                var ustadz = $(this).data('ustadz');
                var waktu = $(this).data('waktu');
                var hari = $(this).data('hari');

                // Debugging dengan console.log
                console.log("ID Jadwal: " + id);
                console.log("Mata Pelajaran: " + pelajaran);
                console.log("Ustadz: " + ustadz);
                console.log("Waktu: " + waktu);
                console.log("Hari: " + hari);

                // Set nilai ke dalam form modal Edit Jadwal
                $('#editJadwalId').val(id);
                $('#editMataPelajaran').val(pelajaran);
                $('#editUstadz').val(ustadz);
                $('#editWaktu').val(waktu);
                $('#editHari').val(hari);

                // Buka modal
                $('#modalEditJadwal').modal('show');
            });
        });


        $(document).ready(function () {
            // Event listener untuk tombol "Tambah Jadwal"
            $('.tambah-jadwal').click(function () {
                var day = $(this).data('day');
                $('#hari').val(day); // Set value hari ke dalam modal
                $('#jadwalId').val(''); // Kosongkan id jadwal pada modal
                $('#mataPelajaran').val(''); // Kosongkan pilihan mata pelajaran
                $('#ustadz').val(''); // Kosongkan pilihan ustadz
                $('#waktu').val(''); // Kosongkan waktu
            });

            // Event listener untuk tombol "Edit Jadwal"
            $('.edit-jadwal').click(function () {
                var idJadwal = $(this).data('id');
                var idPelajaran = $(this).data('pelajaran');
                var idUstadz = $(this).data('ustadz');
                var waktu = $(this).data('waktu');
                var hari = $(this).data('hari');

                // Isi data modal Edit dengan data yang dipilih
                $('#editJadwalId').val(idJadwal);
                $('#editMataPelajaran').val(idPelajaran);
                $('#editUstadz').val(idUstadz);
                $('#editWaktu').val(waktu);
                $('#editHari').val(hari);
            });
        });
    </script>
</body>

</html>