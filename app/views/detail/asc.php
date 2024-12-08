<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASC</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            background-color: #f9f9f9;
        }
        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .content-section {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .content-section h1, .content-section h4 {
            font-weight: bold;
            
        }
        .content-section ol li {
            font-weight: bold;
            margin-top: 10px;
        }
        .cta-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .primary-button {
            background-color: #007bff;
            color: white;
        }
        .primary-button:hover {
            background-color: #0056b3;
            color: #f9f9f9;
        }

        /* Style for the navbar */
        nav {
            display: flex;
            justify-content: space-between;
            /* Posisikan logo dan tombol kembali di sisi yang berbeda */
            align-items: center;
            /* Vertikal rata tengah */
            background-color: #6fa8a9;
            /* Warna latar belakang navbar */
            padding: 1rem 2rem;
            /* Ruang di dalam navbar */
            height: 60px;
            /* Tentukan tinggi navbar */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan halus */
        }

        /* Style for the logo */
        .logo {
            display: flex;
            align-items: center;
            /* Vertikal rata tengah */
        }

        .logo-icon {
            width: 100px;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        .logo-text {
            color: white;
            font-size: 1.5rem;
            /* Sesuaikan ukuran teks */
            font-weight: bold;
        }

        /* Style for the back button */
        .back-button {
            background-color: rgba(255, 255, 255, 0.3);
            /* Warna tombol transparan */
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.5);
            /* Efek hover */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cta-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        iframe {
            border: none;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="/public/img/logo.png" alt="Logo" class="logo-icon">
            <span class="logo-text">ASHABUL KAHFI</span>
        </div>
        <div class="nav-links">
            <a href="<?= BASEURL; ?>/umum" class="back-button">Kembali</a>
        </div>
    </nav>

    <!-- Container -->
    <div class="container mt-4">
        <!-- Image Section -->
        <section class="image-section text-center" data-aos="fade-up">
            <img src="/public/img/asc.jpg" alt="Madrasah Diniah ASC">
        </section>

        <!-- Content Section -->
        <section class="content-section">
            <h1 data-aos="fade-right">
                Pengajaran Mengaji untuk Anak-anak oleh Santri/Wati Pondok Pesantren Ashabul Kahfi
            </h1>
            <p data-aos="fade-left">
                Pondok Pesantren Mahasiswa Ashabul Kahfi juga menaungi sebuah lembaga Madrasah Diniah ASC. Al Qur'an Study Club (ASC) merupakan lembaga Madrasah Diniyah dengan metode <i>Bil Qalam</i>. Madin ASC merupakan tempat mengaji bagi anak-anak masyarakat sekitar yang termasuk dalam wujud nyata dakwah dan pengabdian pesantren untuk umat, sekaligus sebagai sarana bagi santri untuk mengamalkan ilmu yang telah mereka pelajari di pondok.
            </p>

            <h4 data-aos="fade-right">Tujuan dan Manfaat Program</h4>
            <p data-aos="fade-left">
                Madrasah Diniyah ASC bertujuan untuk menciptakan generasi yang berakhlaqul karimah. Program ini dirancang untuk memberikan pendidikan agama sejak dini kepada anak-anak, agar mereka memiliki dasar yang kuat dalam membaca Al-Qur'an, memahami nilai-nilai Islam, dan menerapkannya dalam kehidupan sehari-hari. Selain itu, kegiatan ini juga melatih para santri untuk berinteraksi dengan masyarakat, mengasah kemampuan mereka dalam mengajar, dan menanamkan rasa tanggung jawab sosial.
            </p>

            <h4 data-aos="fade-right">Metode Pengajaran yang Menyenangkan</h4>
            <p data-aos="fade-left">
                Para santri menggunakan metode yang disesuaikan dengan usia dan kemampuan anak-anak. ASC memiliki beberapa program yang dijalankan dengan pendekatan penuh kasih sayang dan sabar, untuk melaksanakan visi misi serta tujuan berupa:
            </p>
            <ol data-aos="fade-up">
                <li>Program harian pembelajaran Al-Qur'an metode <i>Bil Qalam</i> dan kegiatan BCM (Bermain, Cerita, dan Menyanyi).</li>
                <li>Program bulanan dalam memperingati hari besar Islam.</li>
                <li>Program tahunan berupa kegiatan outbound seperti rihlah atau camping.</li>
            </ol>

            <p data-aos="fade-up">
                Pengajaran mengaji ini menjadi salah satu bukti bahwa Pondok Pesantren Ashabul Kahfi tidak hanya berfokus pada pendidikan santri di dalam pesantren, tetapi juga memiliki semangat untuk berkontribusi secara langsung dalam mencerdaskan dan mendidik generasi muda di masyarakat. Mari bersama-sama mendukung kegiatan mulia ini, demi terciptanya generasi Qur’ani yang cerdas, berakhlak mulia, dan berdaya guna untuk agama, bangsa, dan negara.
            </p>

            <!-- CTA Buttons -->
            <div class="cta-buttons">
                <a href="formAsc.html" class="cta-button primary-button">Daftar Sekarang →</a>
            </div>
        </section>
    </div>

     <!-- Bootstrap JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
     <!-- Swiper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
     <!-- AOS JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
 
     <script>
         AOS.init();
     </script>
</body>
</html>