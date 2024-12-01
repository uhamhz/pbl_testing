<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Pesantren</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #2C3E50;
            --secondary-color: #3498DB;
            --accent-color: #E74C3C;
            --background-color: #F5F6FA;
            --card-color: #FFFFFF;
            --text-primary: #2C3E50;
            --text-secondary: #7F8C8D;
            --success-color: #27AE60;
            --warning-color: #F1C40F;
            --danger-color: #E74C3C;
        }

        body {
            background-color: var(--background-color);
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
        }

        .sidebar-header {
            text-align: center;
            padding: 2rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 3px solid var(--secondary-color);
        }

        .sidebar nav ul {
            list-style: none;
            margin-top: 2rem;
        }

        .sidebar nav ul li {
            margin-bottom: 0.5rem;
        }

        .sidebar nav ul li a {
            color: white;
            text-decoration: none;
            padding: 0.75rem 1rem;
            display: block;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background-color: var(--secondary-color);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: var(--card-color);
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-color);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h3 {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: var(--text-primary);
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-card small {
            color: var(--text-secondary);
            font-size: 0.8rem;
        }

        /* Content Sections */
        .content-section {
            background: var(--card-color);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .content-section h2 {
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--background-color);
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        button {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .jadwal-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .jadwal-box {
            background-color: var(--card-color);
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 1rem);
            min-width: 250px;
        }

        .jadwal-box h3 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
            color: var(--primary-color);
        }

        .jadwal-box ul {
            list-style: none;
            padding: 0;
        }

        .jadwal-box ul li {
            margin-bottom: 0.5rem;
            font-size: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-sm {
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
        }

        button:hover {
            background-color: #2980B9;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--background-color);
        }

        th {
            color: var(--text-secondary);
            font-weight: bold;
        }

        td {
            vertical-align: middle;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="/api/placeholder/100/100" alt="Admin Avatar" class="admin-avatar">
                <h2><?= $data['users']['0']['nama_lengkap'] ?></h2>
                <p><?= $data['users']['0']['role'] ?></p>
            </div>

            <nav>
                <ul>
                    <li><a href="#dashboard" class="active">Dashboard</a></li>
                    <li><a href="#pribadi">Data Pribadi</a></li>
                    <li><a href="#admin">Data Admin</a></li>
                    <li><a href="#santri">Data Santri</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#perizinan">Perizinan</a></li>
                    <li><a href="#tagihan">Tagihan</a></li>
                    <li><a href="#pengaturan">Pengaturan</a></li>
                    <li><a href="#beranda">Beranda</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="main-header">
                <h1>Selamat Datang, <?= $data['users']['0']['nama_lengkap'] ?> </h1>
                <div class="user-info">
                    <span>Terakhir login: 24 April 2024, 08:30 WIB</span>
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
                        <p>25</p>
                        <small>Total: Rp 25.000.000</small>
                    </div>
                </div>
            </section>

            <!-- Menampilkan data pribadi sebagai teks biasa -->
            <section id="pribadi" class="content-section">
                <h2>Data Pribadi</h2>

                <!-- Menampilkan data pribadi sebagai teks biasa -->
                <div class="data-pribadi">
                    <p><strong>Nama Lengkap:</strong> <?= $data['users']['0']['nama_lengkap'] ?></p>
                    <p><strong>Email:</strong> <?= $data['users']['0']['email'] ?></p>
                    <p><strong>Role:</strong> <?= $data['users']['0']['role'] ?></p>
                    <p><strong>Alamat:</strong> <?= $data['users']['0']['alamat'] ?></p>
                    <p><strong>No. HP:</strong> <?= $data['users']['0']['no_hp'] ?></p>
                </div>

                <!-- Form untuk edit data pribadi, tersembunyi pada awalnya -->
                <form class="profile-form" style="display:none; action="" method=" post">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" id="nama-input" value="<?= $data['users']['0']['nama_lengkap'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email-input" value="<?= $data['users']['0']['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <label><?= $data['users']['0']['role'] ?></label>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat-input" value="<?= $data['users']['0']['alamat'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="tel" id="hp-input" value="<?= $data['users']['0']['no_hp'] ?>">
                    </div>

                    <!-- Tombol Simpan dan Cancel -->
                    <button type="submit">Simpan Perubahan</button>
                    <button type="button" id="cancel-button">Batal</button>
                </form>

                <!-- Tombol Ubah -->
                <button type="button" id="edit-button">Ubah</button>
            </section>

            <!-- Data Admin Section -->
            <section id="admin" class="content-section">
                <h2>Data Admin</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAdmin">Tambah
                    Admin</button>
                <table>
                    <thead>
                        <tr>
                            <th>Email:</th>
                            <th>Password:</th>
                            <th>Nama Lengkap:</th>
                            <th>Alamat:</th>
                            <th>Nomor HP:</th>
                            <th>Aksi:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['admin'] as $admin): ?>
                            <tr>
                                <td><?= $admin['email'] ?></td>
                                <td><?= $admin['password'] ?></td>
                                <td><?= $admin['nama_lengkap'] ?></td>
                                <td><?= $admin['alamat'] ?></td>
                                <td><?= $admin['no_hp'] ?></td>
                                <td>
                                    <button class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
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
                            <form id="formTambahAdmin">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="hp">Nomor HP:</label>
                                    <input type="tel" class="form-control" id="hp" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formTambahAdmin">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Data Santri Section -->
            <section id="santri" class="content-section">
                <h2>Data Santri</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSantri">Tambah
                    Santri</button>
                <table>
                    <thead>
                        <tr>
                            <th>Email:</th>
                            <th>Password:</th>
                            <th>Nama Lengkap:</th>
                            <th>Alamat:</th>
                            <th>Nomor HP:</th>
                            <th>Aksi:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['santri'] as $santri): ?>
                            <tr>
                                <td><?= $santri['email'] ?></td>
                                <td><?= $santri['password'] ?></td>
                                <td><?= $santri['nama_lengkap'] ?></td>
                                <td><?= $santri['alamat'] ?></td>
                                <td><?= $santri['no_hp'] ?></td>
                                <td>
                                    <button class="btn btn-danger">Hapus</button>
                                    <button class="btn btn-primary">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <!-- Modal Tambah Santri -->
            <div class="modal fade" id="modalTambahSantri" tabindex="-1" role="dialog"
                aria-labelledby="tambahSantriLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahSantriLabel">Tambah Santri Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahSantri">
                                <div class="form-group">
                                    <label for="nis">NIS:</label>
                                    <input type="text" class="form-control" id="nis" name="nis" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas:</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formTambahSantri">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


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
                                        <button class="btn btn-primary btn-sm edit-jadwal">Edit</button>
                                        <button class="btn btn-danger btn-sm delete-jadwal">Hapus</button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <button class="btn btn-success btn-sm tambah-jadwal" data-day="<?= strtolower($hari) ?>">Tambah
                                Jadwal</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Modal Edit Jadwal -->
            <div class="modal fade" id="modalJadwal" tabindex="-1" role="dialog" aria-labelledby="modalJadwalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalJadwalLabel">Tambah/Edit Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formJadwal">
                                <input type="hidden" id="jadwalId" name="jadwalId">
                                <div class="form-group">
                                    <label for="hari">Hari:</label>
                                    <input type="text" class="form-control" id="hari" name="hari" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jamMulai">Jam Mulai:</label>
                                    <input type="time" class="form-control" id="jamMulai" name="jamMulai" required>
                                </div>
                                <div class="form-group">
                                    <label for="jamSelesai">Jam Selesai:</label>
                                    <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" required>
                                </div>
                                <div class="form-group">
                                    <label for="mataPelajaran">Mata Pelajaran:</label>
                                    <input type="text" class="form-control" id="mataPelajaran" name="mataPelajaran"
                                        required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formJadwal">Simpan</button>
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
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalApproveIzin" data-izin-id="<?= $izin['id'] ?>">Approve</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalRejectIzin"
                                            data-izin-id="<?= $izin['id'] ?>">Reject</button>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                    </tbody>
                </table>
            </section>

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
                                <td>Rp <?php echo number_format($tagihan['jumlah'], 2, ',', '.'); ?></td>
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
                                            // Jika bukan DateTime (misalnya string), coba buat objek DateTime
                                            try {
                                                $date = new DateTime($tagihan['jatuh_tempo']);
                                                echo $date->format('d F Y');
                                            } catch (Exception $e) {
                                                echo "Format Tanggal Salah";
                                            }
                                        }
                                    } else {
                                        echo "Tanggal Tidak Tersedia"; // Tampilkan pesan jika jatuh_tempo kosong atau NULL
                                    }
                                    ?>
                                </td>

                                <!-- Status -->
                                <td>
                                    <?php
                                    $status = ucfirst($tagihan['status']); // Mengubah status menjadi kapital
                                    echo $status;
                                    ?>
                                </td>

                                <!-- Bukti Pembayaran -->
                                <td>
                                    <?php if (!empty($tagihan['bukti_pembayaran'])): ?>
                                        <!-- Tombol Lihat Bukti Pembayaran -->
                                        <button class="btn btn-secondary btn-sm" data-toggle="modal"
                                            data-target="#modalLihatBukti"
                                            data-url="<?php echo htmlspecialchars($tagihan['bukti_pembayaran']); ?>">
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

            <!-- Modal untuk melihat bukti pembayaran -->
            <div class="modal fade" id="modalLihatBukti" tabindex="-1" role="dialog"
                aria-labelledby="modalLihatBuktiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLihatBuktiLabel">Lihat Bukti Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="buktiImage" src="" alt="Bukti Pembayaran" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript untuk melihat bukti pembayaran
                $('#modalLihatBukti').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Tombol yang memicu modal
                    var url = button.data('url'); // Ambil URL bukti pembayaran
                    var modal = $(this);
                    modal.find('#buktiImage').attr('src', url); // Set URL ke gambar bukti
                });

                // JavaScript untuk mengubah status
                function ubahStatus(id, status) {
                    if (confirm("Apakah Anda yakin ingin mengubah status tagihan ini menjadi " + status + "?")) {
                        // Kirim request ke server untuk mengubah status
                        window.location.href = "ubah_status.php?id=" + id + "&status=" + status;
                    }
                }
            </script>


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
                            <form id="formBuatTagihan">
                                <div class="form-group">
                                    <label for="namaSantri">Nama Santri:</label>
                                    <input type="text" class="form-control" id="namaSantri" name="namaSantri"
                                        placeholder="Masukkan nama santri" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenisTagihan">Jenis Tagihan:</label>
                                    <input type="text" class="form-control" id="jenisTagihan" name="jenisTagihan"
                                        placeholder="Contoh: SPP Mei" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahTagihan">Jumlah:</label>
                                    <input type="number" class="form-control" id="jumlahTagihan" name="jumlahTagihan"
                                        placeholder="Masukkan jumlah tagihan" required>
                                </div>
                                <div class="form-group">
                                    <label for="jatuhTempo">Jatuh Tempo:</label>
                                    <input type="date" class="form-control" id="jatuhTempo" name="jatuhTempo" required>
                                </div>
                                <div class="form-group">
                                    <label for="statusTagihan">Status:</label>
                                    <select class="form-control" id="statusTagihan" name="statusTagihan">
                                        <option value="pending">Pending</option>
                                        <option value="unpaid">Belum Lunas</option>
                                        <option value="paid">Lunas</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formBuatTagihan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Lihat Bukti Pembayaran -->
            <div class="modal fade" id="modalBuktiPembayaran" tabindex="-1" role="dialog"
                aria-labelledby="buktiPembayaranLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buktiPembayaranLabel">Bukti Pembayaran</h5>
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
            <div class="modal fade" id="modalBuatTagihan" tabindex="-1" role="dialog" aria-labelledby="buatTagihanLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buatTagihanLabel">Buat Tagihan Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formBuatTagihan">
                                <div class="form-group">
                                    <label for="santri">Santri:</label>
                                    <input type="text" class="form-control" id="santri" name="santri"
                                        placeholder="Masukkan nama santri" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenisTagihan">Jenis Tagihan:</label>
                                    <input type="text" class="form-control" id="jenisTagihan" name="jenisTagihan"
                                        placeholder="Contoh: SPP Mei" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahTagihan">Jumlah:</label>
                                    <input type="number" class="form-control" id="jumlahTagihan" name="jumlahTagihan"
                                        placeholder="Masukkan jumlah tagihan" required>
                                </div>
                                <div class="form-group">
                                    <label for="statusTagihan">Status:</label>
                                    <select class="form-control" id="statusTagihan" name="statusTagihan">
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jatuhTempo">Jatuh Tempo:</label>
                                    <input type="date" class="form-control" id="jatuhTempo" name="jatuhTempo" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formBuatTagihan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Settings Section -->
            <section id="pengaturan" class="content-section">
                <h2>Pengaturan</h2>
                <form>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" placeholder="Masukkan password baru" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" placeholder="Konfirmasi password baru" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar nav ul li a');
            const sections = document.querySelectorAll('.content-section');

            function setActiveSection(activeId) {
                $('.modal').modal('hide'); // Menutup semua modal yang aktif
                sections.forEach(section => {
                    section.style.display = 'none'; // Hide all sections
                });

                const activeSection = document.getElementById(activeId);
                if (activeSection) {
                    activeSection.style.display = 'block'; // Show only the active section
                }

                links.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').substring(1) === activeId) {
                        link.classList.add('active');
                    }
                });
            }

            // Event listeners for sidebar navigation
            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    setActiveSection(targetId);
                });
            });

            // Activate the first section by default
            if (sections.length > 0) {
                setActiveSection('dashboard');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const homeLink = document.querySelector('a[href="#beranda"]'); // Link that triggers the modal
            const modal = document.getElementById('exitConfirmationModal'); // The modal for confirmation
            const confirmExit = document.getElementById('confirmExit'); // Button to confirm the exit
            const closeModalButton = document.querySelector('.modal .closeModal'); // Button to close the modal

            // Event to show the modal
            homeLink.addEventListener('click', function (event) {
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
                        Swal.fire({
                            title: "Success!",
                            text: "You have exited the application successfully.",
                            icon: "success"
                        }).then(() => {
                            window.location.href = '<?= BASEURL; ?>';
                        });
                    } else {
                        Swal.fire({
                            title: "Cancelled!",
                            text: "You have canceled the exit process.",
                            icon: "error"
                        }).then(() => {
                            window.location.href = 'dashboardAdmin.html';
                        });
                    }
                });
            });
        });

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
                e.preventDefault(); // Mencegah reload halaman

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>