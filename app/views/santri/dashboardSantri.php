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
                <img src="/api/placeholder/100/100" alt="Santri Avatar" class="santri-avatar">
                <h2 id="santriName"><?= $data['users']['0']['nama_lengkap'] ?></h2>
                <p>Kelas 10</p>
            </div>

            <nav>
                <ul>
                    <li><a href="#dashboard" class="active">Dashboard</a></li>
                    <li><a href="#profile">Data Pribadi</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#perizinan">Perizinan</a></li>
                    <li><a href="#pembayaran">Pembayaran</a></li>
                    <li><a href="#pengaturan">Pengaturan</a></li>
                    <li><a href="#beranda">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="main-header">
                <h1>Selamat Datang, <?= $data['users']['0']['nama_lengkap'] ?></h1>
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
                        <?= $data['tagihan']
                            ? '<p>' . number_format($data['tagihan']['0']['jumlah'], 0, ',', '.') . '</p>
                        <small>Total tagihan bulan ini</small>'
                            : '<p>0</p>
                        <small>Total tagihan bulan ini</small>'
                            ?>
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
                    <p><strong>Password:</strong> <?= $data['users']['0']['password'] ?></p>
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
                            <th>Aksi</th>
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

                                // Kolom Aksi: tombol Hapus
                                echo "<td>
                        <form action='" . BASEURL . "/Santri/hapusPerizinan' method='POST' class='form-hapus' data-id='" . htmlspecialchars($row['id']) . "'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <button type='button' class='btn btn-danger hapus-perizinan' data-id='" . htmlspecialchars($row['id']) . "'>Hapus</button>
                        </form>
                    </td>";

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
                            <form id="formAjukanPerizinan">
                                <div class="form-group">
                                    <label for="jenisIzin">Jenis Izin:</label>
                                    <select class="form-control" id="jenisIzin" name="jenisIzin" required>
                                        <option value="">Pilih Jenis Izin</option>
                                        <option value="pulang">Pulang</option>
                                        <option value="tidak_masuk">Tidak Masuk</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalIzin">Tanggal Mulai Izin:</label>
                                    <input type="date" class="form-control" id="tanggalIzin" name="tanggalIzin"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalKembali">Tanggal Kembali:</label>
                                    <input type="date" class="form-control" id="tanggalKembali" name="tanggalKembali"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="alasan">Alasan Izin:</label>
                                    <textarea class="form-control" id="alasan" name="alasan" rows="4"
                                        required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" form="formAjukanPerizinan">Ajukan
                                Izin</button>
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
                    
                            // Perbaiki pengecekan status sesuai dengan nilai yang ada di database
                            if ($status == 'belum lunas') {
                                $statusClass = "status-pending";
                                $statusText = "Menunggu Pembayaran";
                            } elseif ($status == 'Lunas') {
                                $statusClass = "status-approved";
                                $statusText = "Lunas";
                            } elseif ($status == 'diTolak') {
                                $statusClass = "status-rejected";
                                $statusText = "Ditolak";
                            } else {
                                $statusClass = "status-unknown";  // Jika status tidak dikenali
                                $statusText = "Status Tidak Dikenali";
                            }

                            echo "<p>Status: <span class='status-badge $statusClass'>" . htmlspecialchars($statusText) . "</span></p>";

                            // Jika status 'belum lunas', tampilkan form untuk mengirim bukti pembayaran
                            if ($status == 'belum lunas') {
                                echo "<form id='paymentForm{$tagihan['id_tagihan']}' method='post' enctype='multipart/form-data'>";
                                echo "<input type='file' id='paymentProof{$tagihan['id_tagihan']}' name='paymentProof' accept='image/*'>";
                                echo "<button type='button' onclick='uploadPaymentProof({$tagihan['id_tagihan']})'>Kirim Bukti Pembayaran</button>";
                                echo "</form>";
                            } else {
                                // Jika sudah lunas atau ditolak, tampilkan bukti pembayaran yang sudah diunggah
                                $buktiPembayaran = htmlspecialchars($tagihan['bukti_pembayaran']);
                                if (!empty($buktiPembayaran)) {
                                    echo "<p>Bukti Pembayaran: <a href='$buktiPembayaran' target='_blank'>Lihat Bukti</a></p>";
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

            <!-- Settings Section -->
            <section id="pengaturan" class="content-section">
                <h2>Pengaturan</h2>
                <form>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" placeholder="Konfirmasi password baru">
                    </div>
                    <button type="submit">Update Password</button>
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
            document.getElementById("nis-input").value = document.getElementById("nis-text").innerText;
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
        function uploadPaymentProof(month) {
            var formId = 'paymentForm' + month;
            var formData = new FormData(document.getElementById(formId));
            fetch('url_server_anda_untuk_mengunggah/' + month, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    alert('Bukti pembayaran untuk ' + month + ' berhasil diunggah!');
                })
                .catch(error => {
                    alert('Terjadi kesalahan saat mengunggah bukti pembayaran untuk ' + month + '.');
                });
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
        document.getElementById('formAjukanPerizinan').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah reload halaman

            // Ambil data dari form
            const jenisIzin = document.getElementById('jenisIzin').value;
            const tanggalIzin = document.getElementById('tanggalIzin').value;
            const tanggalKembali = document.getElementById('tanggalKembali').value;
            const alasan = document.getElementById('alasan').value;

            // Simulasi pengiriman data ke server
            console.log({ jenisIzin, tanggalIzin, tanggalKembali, alasan });

            // Tampilkan pesan sukses (sesuaikan dengan kebutuhan)
            alert('Perizinan berhasil diajukan!');

            // Reset form dan tutup modal
            this.reset();
            $('#modalAjukanPerizinan').modal('hide');
        });
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
                            window.location.href = 'dashboardSantri.html';
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>