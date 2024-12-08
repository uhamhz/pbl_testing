<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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

        .santri-avatar {
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

        .santri-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 4px solid rgba(255, 255, 255, 0.2);
            padding: 3px;
            background: var(--card-color);
            transition: var(--transition);
        }

        .santri-avatar:hover {
            transform: scale(1.05);
        }

        .stat-card {
            background: var(--card-color);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            /* Memberi jarak antar kartu */
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

        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        #perizinanBaru {
            display: none;
        }


        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--background-color);
        }

        th {
            color: var(--text-secondary);
            font-weight: 600;
        }

        /* Status Badges */
        /* Kelas untuk menampilkan status */
        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Kelas untuk status disetujui */
        .status-approved {
            background-color: #28a745;
            /* Hijau */
            color: white;
        }

        /* Kelas untuk status menunggu */
        .status-pending {
            background-color: #ffc107;
            /* Kuning */
            color: black;
        }

        /* Kelas untuk status ditolak */
        .status-rejected {
            background-color: #dc3545;
            /* Merah */
            color: white;
        }

        /* Kelas untuk status yang tidak dikenal */
        .status-unknown {
            background-color: #6c757d;
            /* Abu-abu */
            color: white;
        }


        .status-unpaid {
            background: #F8D7DA;
            color: #721C24;
        }

        .status-paid {
            background: #D4EDDA;
            color: #155724;
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

        button:hover {
            background-color: #2980B9;
        }

        /* Modal */
        .modal {
            display: none !important;
            /* Pastikan modal hanya muncul dengan JS */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal.show {
            display: flex !important;
            /* Modal akan muncul dengan gaya flex */
        }

        .modal-content {
            background: var(--card-color);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .quick-action-btn {
            padding: 1rem;
            text-align: center;
            background: var(--background-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background: var(--secondary-color);
            color: white;
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
                <!-- Profil Pengguna -->
                <td>
                    <?php if (!empty($data['users']['0']['picture'])): ?>
                        <img src="<?php echo BASEURL . '/img/Profile/' . htmlspecialchars($data['users']['0']['picture']); ?>"
                            alt="Admin Avatar" class="santri-avatar">
                    <?php else: ?>
                        <img src="<?php echo BASEURL . '/img/Profile/default-avatar.png'; ?>" alt="Default Avatar"
                            class="santri-avatar">
                    <?php endif; ?>
                </td>

                <h2><?= !isset($data['users']['0']['nama_lengkap']) ? 'Not Found' : $data['users']['0']['nama_lengkap'] ?>
                </h2>
                <p><?= !isset($data['users']['0']['role']) ? 'Not Found' : $data['users']['0']['role'] ?></p>
            </div>

            <nav>
                <ul>
                    <li><a href="#dashboard" class="active">Dashboard</a></li>
                    <li><a href="#profile">Data Pribadi</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#perizinan">Perizinan</a></li>
                    <li><a href="#pembayaran">Pembayaran</a></li>
                    <li><a href="#beranda">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="main-header">
                <h1>Selamat Datang,
                    <?= !isset($data['users']['0']['nama_lengkap']) ? 'Not Found' : $data['users']['0']['nama_lengkap'] ?>
                </h1>

                <div class="user-info">
                    <h2 id="realTimeClock"></h2>
                </div>
            </div>

            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h3>Status Kehadiran</h3>
                        <p>95%</p>
                        <small>Total kehadiran bulan ini</small>
                    </div>
                    <div class="stat-card">
                        <h3>Tagihan Aktif</h3>

                        <?php if (!empty($data['tagihan'])): ?>
                            <?php
                            $totalTagihan = 0; // Variable to store total amount
                            foreach ($data['tagihan'] as $tagihan) {
                                // Only consider tagihan with 'status' as 'belum lunas'
                                if ($tagihan['status'] == 'belum lunas') {
                                    $totalTagihan += $tagihan['jumlah']; // Add each unpaid tagihan's amount to total
                                }
                            }
                            ?>

                            <p><?= number_format($totalTagihan, 0, ',', '.') ?></p>
                            <small>Total tagihan bulan ini</small>

                        <?php else: ?>
                            <p>0</p>
                            <small>Tidak ada tagihan</small>
                        <?php endif; ?>
                    </div>
                    <div class="stat-card">
                        <h3>Perizinan</h3>
                        <?= $data['jumlahIzin']
                            ? '<p>' . $data['jumlahIzin'] . '</p>
                        <small>Membutuhkan persetujuan</small>'
                            : '<p>0</p>
                        <small>Membutuhkan persetujuan</small>'
                            ?>
                    </div>
                </div>

                <div class="content-section">
                    <h2>Jadwal Hari Ini</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Kegiatan</th>
                                <th>Pengajar</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05:00 - 06:00</td>
                                <td>Sholat Subuh & Mengaji</td>
                                <td>Ust. Abdullah</td>
                                <td>Masjid</td>
                            </tr>
                            <tr>
                                <td>07:00 - 09:30</td>
                                <td>Pembelajaran Tahfidz</td>
                                <td>Ust. Ahmad</td>
                                <td>Kelas 10A</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="content-section">
                    <h2>Aksi Cepat</h2>
                    <div class="quick-actions">
                        <div class="quick-action-btn">
                            <h3>Ajukan Izin</h3>
                            <p>Buat pengajuan izin baru</p>
                        </div>
                        <div class="quick-action-btn">
                            <h3>Lihat Tagihan</h3>
                            <p>Cek tagihan aktif</p>
                        </div>
                        <div class="quick-action-btn">
                            <h3>Update Profil</h3>
                            <p>Perbarui data pribadi</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Profile Section -->
            <section id="profile" class="content-section">
                <h2>Data Pribadi</h2>

                <!-- Menampilkan data pribadi sebagai teks biasa -->
                <div class="data-pribadi">
                    <p><strong>Nama Lengkap:</strong> <?= $data['users']['0']['nama_lengkap'] ?></p>
                    <p><strong>Email:</strong><?= $data['users']['0']['email'] ?></p>
                    <p><strong>Alamat:</strong> <?= $data['users']['0']['alamat'] ?></p>
                    <p><strong>No. HP:</strong> <?= $data['users']['0']['no_hp'] ?></p>
                    <p><strong>Password:</strong> ********</p>
                </div>

                <!-- Form untuk edit data pribadi, tersembunyi pada awalnya -->
                <form class="profile-form" style="display:none;" action="<?= BASEURL; ?>/Santri/edit" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="profile-pic">Foto Profil:</label>
                        <input type="file" id="profile-pic" name="picture">
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" id="nama-input"
                            value="<?= htmlspecialchars($data['users'][0]['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>"
                            name="nama_lengkap">
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?= htmlspecialchars($data['users'][0]['id'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email-input"
                            value="<?= htmlspecialchars($data['users'][0]['email'], ENT_QUOTES, 'UTF-8') ?>" readonly
                            name="email">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat-input"
                            value="<?= htmlspecialchars($data['users'][0]['alamat'], ENT_QUOTES, 'UTF-8') ?>"
                            name="alamat">
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="tel" id="hp-input"
                            value="<?= htmlspecialchars($data['users'][0]['no_hp'], ENT_QUOTES, 'UTF-8') ?>"
                            name="no_hp">
                    </div>

                    <div class="form-group" style="display:none;">
                        <label for="role-input">Role</label>
                        <input type="hidden" id="role-input" name="role"
                            value="<?= htmlspecialchars($data['users'][0]['role'], ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password-input"
                            placeholder="Enter new password (leave blank to keep current)" name="password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

                <!-- Tombol Ubah -->
                <button type="button" id="edit-button">Ubah</button>
            </section>

            <!-- Jadwal Section -->
            <section id="jadwal" class="content-section">
                <h2>Jadwal</h2>

                <!-- Tabel untuk menampilkan jadwal -->
                <table border="1" cellpadding="10">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelajaran</th>
                            <th>Ustadz</th>
                            <th>Waktu</th>
                            <th>Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data['jadwal'] as $index => $jadwal): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($jadwal['nama_pelajaran']); ?></td>
                                    <td><?php echo htmlspecialchars($jadwal['nama_lengkap']); ?></td>
                                    <td>
                                        <?php
                                        // Check if 'waktu' is a valid DateTime object
                                        if ($jadwal['waktu'] instanceof DateTime) {
                                            // If it's already a DateTime object, format it directly
                                            echo $jadwal['waktu']->format('H:i');
                                        } else {
                                            // If it's a string, create a DateTime object from it
                                            try {
                                                // Remove fractional seconds (if any) before creating DateTime object
                                                $timeString = preg_replace('/\.\d+/', '', $jadwal['waktu']);
                                                $dateTime = new DateTime($timeString);  // Create DateTime object from the time string
                                
                                                // Format the time to 'H:i' (Hour:Minute)
                                                echo $dateTime->format('H:i');
                                            } catch (Exception $e) {
                                                // If the time is invalid, display error message
                                                echo 'Waktu tidak valid';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($jadwal['hari']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Tidak ada jadwal yang tersedia.</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </section>

            <!-- Permission Section -->
            <section id="perizinan" class="content-section">
                <h2>Perizinan</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAjukanPerizinan">Ajukan Perizinan
                    Baru</button>

                <!-- Tabel Perizinan -->
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal Izin</th>
                            <th>Tanggal Kembali</th>
                            <th>Jenis Izin</th>
                            <th>Alasan</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($data['izin'])) {
                            foreach ($data['izin'] as $row) {
                                echo "<tr>";

                                // Tanggal Izin
                                $tanggalIzin = $row['tanggal_izin'];
                                $tanggalIzinObj = validDate($tanggalIzin);
                                if ($tanggalIzinObj) {
                                    echo "<td>" . $tanggalIzinObj->format('d-m-Y') . "</td>";
                                } else {
                                    echo "<td>Tanggal Tidak Valid</td>";
                                }

                                // Tanggal Kembali
                                $tanggalKembali = $row['tanggal_kembali'];
                                $tanggalKembaliObj = validDate($tanggalKembali);
                                if ($tanggalKembaliObj) {
                                    echo "<td>" . $tanggalKembaliObj->format('d-m-Y') . "</td>";
                                } else {
                                    echo "<td>Tanggal Tidak Valid</td>";
                                }

                                // Jenis Izin dan Alasan
                                echo "<td>" . htmlspecialchars($row['jenis_izin']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alasan']) . "</td>";

                                // Tentukan status perizinan dan tampilkan dengan badge
                                $statusClass = "";
                                $statusText = ""; // Ini untuk menampilkan teks status
                        
                                if ($row['status'] == 'setuju') {
                                    $statusClass = "status-approved";
                                    $statusText = "Disetujui";
                                } elseif ($row['status'] == 'pending') {
                                    $statusClass = "status-pending";
                                    $statusText = "Menunggu Persetujuan";
                                } elseif ($row['status'] == 'tolak') {
                                    $statusClass = "status-rejected";
                                    $statusText = "Ditolak";
                                } else {
                                    $statusClass = "status-unknown"; // Jika status tidak dikenali
                                    $statusText = "Status Tidak Dikenali";
                                }

                                echo "<td><span class='status-badge $statusClass'>" . htmlspecialchars($statusText) . "</span></td>";

                                if ($row['status'] == 'pending') {
                                    echo "<td>
                                    <form action='" . BASEURL . "/Santri/hapusPerizinan' method='POST' class='form-hapus' data-id='" . htmlspecialchars($row['id']) . "'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <button type='button' class='btn btn-danger hapus-perizinan' data-id='" . htmlspecialchars($row['id']) . "'>Hapus</button>
                                    </form>
                                    </td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada perizinan ditemukan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Fungsi untuk memvalidasi dan mengonversi tanggal ke objek DateTime -->
                <?php
                // Pastikan fungsi validDate hanya dideklarasikan satu kali
                function validDate($date)
                {
                    // Jika sudah objek DateTime, langsung dikembalikan
                    if ($date instanceof DateTime) {
                        return $date;
                    }

                    // Jika formatnya adalah Y-m-d, buat objek DateTime
                    $dateTimeObj = DateTime::createFromFormat('Y-m-d', $date);
                    if ($dateTimeObj && $dateTimeObj->format('Y-m-d') === $date) {
                        return $dateTimeObj;
                    }

                    // Jika tidak sesuai format, kembalikan false
                    return false;
                }
                ?>

            </section>

            <!-- Modal Ajukan Perizinan -->
            <div class="modal fade" id="modalAjukanPerizinan" tabindex="-1" role="dialog"
                aria-labelledby="modalPerizinanLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPerizinanLabel">Ajukan Perizinan Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formAjukanPerizinan" action="<?= BASEURL; ?>/Santri/tambahPerizinan"
                                method="POST">

                                <!-- Nama Santri (readonly) -->
                                <div class="form-group">
                                    <label for="NamaSantri">Nama Santri:</label>
                                    <!-- Display nama_lengkap in the form but send the user_id -->
                                    <input type="text" class="form-control" id="NamaSantri" name="nama_lengkap"
                                        value="<?= htmlspecialchars($data['users']['0']['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>"
                                        readonly>

                                    <!-- Hidden input for user_id to be sent with the form -->
                                    <input type="hidden" name="user_id" value="<?= $data['users']['0']['id'] ?>">
                                </div>


                                <!-- Tanggal Mulai Izin -->
                                <div class="form-group">
                                    <label for="tanggalIzin">Tanggal Mulai Izin:</label>
                                    <input type="date" class="form-control" id="tanggalIzin" name="tanggal_izin"
                                        required>
                                </div>

                                <!-- Tanggal Kembali -->
                                <div class="form-group">
                                    <label for="tanggalKembali">Tanggal Kembali:</label>
                                    <input type="date" class="form-control" id="tanggalKembali" name="tanggal_kembali"
                                        required>
                                </div>

                                <!-- Jenis Izin -->
                                <div class="form-group">
                                    <label for="jenisIzin">Jenis Izin:</label>
                                    <select class="form-control" id="jenisIzin" name="jenis_izin" required>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <!-- Alasan -->
                                <div class="form-group">
                                    <label for="alasan">Alasan:</label>
                                    <textarea class="form-control" id="alasan" name="alasan" rows="3"
                                        required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ajukan Izin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <section id="pembayaran" class="content-section">
                <h2>Pembayaran</h2>
                <div class="dashboard-stats">
                    <?php
                    // Cek apakah data tagihan tersedia
                    if (!empty($data['tagihan'])) {
                        foreach ($data['tagihan'] as $tagihan) {
                            echo "<div class='stat-card'>";

                            // Jenis Tagihan
                            $jenisTagihan = htmlspecialchars($tagihan['jenis_tagihan']);
                            echo "<h2>$jenisTagihan</h2>";

                            // Jumlah Tagihan
                            $jumlah = number_format($tagihan['jumlah'], 0, ',', '.'); // Format jumlah sebagai rupiah
                            echo "<p>Rp $jumlah</p>";

                            // Validasi dan Format Tanggal Jatuh Tempo
                            $jatuhTempo = validDate($tagihan['jatuh_tempo']);
                            if ($jatuhTempo) {
                                echo "<small>Jatuh Tempo: " . $jatuhTempo->format('d F Y') . "</small>";
                            } else {
                                echo "<small>Jatuh Tempo: Tanggal Tidak Valid</small>";
                            }

                            // Status Tagihan
                            $status = htmlspecialchars($tagihan['status']);
                            $statusClass = "";
                            $statusText = ""; // Menentukan teks untuk status tagihan
                    
                            if ($status == 'pending') {
                                $statusClass = "status-pending";
                                $statusText = "Menunggu Verifikasi Admin";
                            } elseif ($status == 'lunas') {
                                $statusClass = "status-approved";
                                $statusText = "Lunas";
                            } elseif ($status == 'belum lunas') {
                                $statusClass = "status-rejected";
                                $statusText = "Menunggu Pembayaran";
                            } else {
                                $statusClass = "status-unknown";  // Jika status tidak dikenali
                                $statusText = "Status Tidak Dikenali";
                            }

                            echo "<p>Status: <span class='status-badge $statusClass'>" . htmlspecialchars($statusText) . "</span></p>";

                            // If the status is 'belum lunas', display the payment proof form
                            if ($status == 'belum lunas') {
                                // Form for uploading the payment proof
                                echo "<form id='paymentForm{$tagihan['id_tagihan']}' action='" . BASEURL . "/Santri/tambahBuktiPembayaran' method='POST' enctype='multipart/form-data'>";
                                echo "<input type='hidden' name='id' value='{$tagihan['id_tagihan']}'>"; // Hidden input for id_tagihan
                                echo "<input type='file' id='paymentProof{$tagihan['id_tagihan']}' name='paymentProof' accept='image/*'>";
                                echo "<button type='submit'>Kirim Bukti Pembayaran</button>";
                                echo "</form>";
                            } else if ($status == 'lunas' || $status == 'pending') {
                                // If already paid or pending, display the uploaded payment proof
                                $buktiPembayaran = $tagihan['bukti_pembayaran'];
                                if (!empty($buktiPembayaran)) {
                                    // Use htmlspecialchars only if $buktiPembayaran is not null
                                    $buktiPembayaran = htmlspecialchars($buktiPembayaran, ENT_QUOTES, 'UTF-8');
                                    echo "<p>Bukti Pembayaran: <button class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#modalLihatBuktiSantri' data-url='" . BASEURL . "/img/buktiPembayaran/" . htmlspecialchars($buktiPembayaran) . "'>Lihat Bukti</button></p>";
                                } else {
                                    echo "<button class='btn btn-secondary btn-sm' disabled>Bukti Tidak Tersedia</button>";
                                }
                            }


                            echo "</div>"; // End of stat-card
                        }
                    } else {
                        echo "<p>Anda tidak memiliki tagihan saat ini.</p>";
                    }
                    ?>
                </div>
            </section>

            <!-- Modal untuk melihat bukti pembayaran -->
            <div class="modal fade" id="modalLihatBuktiSantri" tabindex="-1" role="dialog"
                aria-labelledby="modalLihatBuktiSantriLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLihatBuktiSantriLabel">Lihat Bukti Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="buktiPembayaranImgSantri" src="" alt="Bukti Pembayaran" class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>


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
            $('#modalLihatBuktiSantri').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var imgUrl = button.data('url'); // Ambil info dari data-url
                var modal = $(this);
                modal.find('.modal-body img').attr('src', imgUrl); // Ganti sumber gambar modal
            });
        });
    </script>


    <script>
        // Ketika tombol "Ubah" diklik
        document.getElementById("edit-button").addEventListener("click", function () {
            //console.log('oke');
            // Sembunyikan data teks biasa
            document.querySelector(".data-pribadi").style.display = "none";

            // Tampilkan form input untuk edit
            document.querySelector(".profile-form").style.display = "block";

            // Menyalin data dari teks ke input (untuk memulai editing)
            // document.getElementById("nis-input").value = document.getElementById("nis-text").innerText;
            // document.getElementById("nama-input").value = document.getElementById("nama-text").innerText;
            //document.getElementById("kelas-input").value = document.getElementById("kelas-text").innerText;
            //document.getElementById("alamat-input").value = document.getElementById("alamat-text").innerText;
            //document.getElementById("hp-input").value = document.getElementById("hp-text").innerText;

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
        // JavaScript to handle sidebar navigation and content visibility
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar nav ul li a');
            const sections = document.querySelectorAll('.content-section');

            function setActiveSection(activeId) {
                sections.forEach(section => {
                    if (section.id === activeId) {
                        section.classList.add('active');
                    } else {
                        section.classList.remove('active');
                    }
                });

                links.forEach(link => {
                    if (link.getAttribute('href') === '#' + activeId) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }



            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    setActiveSection(targetId);
                });
            });

            // Optionally, activate the first section by default if no link is active
            if (!links.some(link => link.classList.contains('active'))) {
                setActiveSection('dashboard');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar nav ul li a');
            const sections = document.querySelectorAll('.content-section');

            // Function to remove active class from all sections
            function hideAllSections() {
                sections.forEach(section => {
                    section.style.display = 'none'; // Hide all sections
                });
            }

            // Function to show the active section
            function showActiveSection(activeSectionId) {
                const activeSection = document.getElementById(activeSectionId);
                if (activeSection) {
                    activeSection.style.display = 'block'; // Show only active section
                }
            }

            // Adding click event to all sidebar links
            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent the default anchor link behavior
                    const targetId = this.getAttribute('href').substring(1); // Get the target section ID

                    // Set all links to inactive
                    links.forEach(lnk => {
                        lnk.classList.remove('active');
                    });

                    // Set clicked link to active
                    this.classList.add('active');

                    // Hide all sections and show the targeted one
                    hideAllSections();
                    showActiveSection(targetId);
                });
            });

            // Activate the first section by default
            if (links.length > 0) {
                links[0].click();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menginisialisasi SweetAlert dengan Bootstrap buttons
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            // Menambahkan event listener untuk tombol "Hapus Perizinan"
            document.querySelectorAll(".hapus-perizinan").forEach(button => {
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
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const homeLink = document.querySelector('a[href="#beranda"]'); // Link that triggers the modal

            homeLink.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah tindakan default dari link
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to exit the application?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, exit it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX call to the server to handle logout
                        fetch('<?= BASEURL; ?>/Umum/logout', { // Sesuaikan dengan URL sebenarnya untuk logout.php
                            method: 'GET' // Gunakan GET atau POST sesuai konfigurasi server Anda
                        })
                            .then(response => {
                                // Pastikan server merespons dengan benar
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.text(); // atau response.json() jika server merespon dengan JSON
                            })
                            .then(() => {
                                Swal.fire({
                                    title: "Success!",
                                    text: "You have exited the application successfully.",
                                    icon: "success"
                                }).then(() => {
                                    window.location.href = '<?= BASEURL; ?>'; // Arahkan kembali ke halaman utama atau login
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
                            window.location.href = '<?= BASEURL; ?> /Santri'; // Arahkan kembali ke dashboard jika pengguna membatalkan
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>