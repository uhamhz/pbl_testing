<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerja Bakti</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .content-section {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content-section h1, .content-section h5 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }
        .content-section p {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .quote {
            font-style: italic;
            color: #555;
            margin-top: 20px;
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
            <a href="/app/views/umum/utama.html" class="back-button">Kembali</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <!-- Image Section -->
        <section class="image-section text-center" data-aos="fade-up">
            <img src="/public/img/roan.jpg" alt="Kegiatan Ro’an">
        </section>

        <!-- Content Section -->
        <section class="content-section">
            <h1 data-aos="fade-right">Kegiatan Ro’an Pondok Pesantren Ashabul Kahfi</h1>
            <p data-aos="fade-left">
                Setiap minggu, seluruh santri putra dan santri putri Pondok Pesantren Ashabul Kahfi melaksanakan kegiatan ro’an atau kerja bakti sebagai bentuk tanggung jawab bersama dalam menjaga kebersihan dan keasrian lingkungan pesantren. Kegiatan ini bukan sekadar aktivitas fisik, tetapi juga bagian dari pembelajaran penting tentang nilai-nilai kebersamaan, tanggung jawab, dan kepekaan terhadap lingkungan.
            </p>

            <h5 data-aos="fade-right">Makna di Balik Kegiatan Ro’an</h5>
            <p data-aos="fade-left">
                Dalam tradisi pesantren, kebersihan adalah cerminan keimanan. Rasulullah SAW bersabda, “Kebersihan adalah sebagian dari iman.” Dengan semangat hadits ini, ro’an menjadi lebih dari sekadar rutinitas mingguan; ini adalah ibadah yang dilakukan dengan niat untuk menjaga amanah Allah SWT atas lingkungan yang telah diberikan kepada kita.
            </p>
            <p data-aos="fade-left">
                Kegiatan ini juga diselingi dengan suasana keakraban, candaan ringan antar santri, dan terkadang diakhiri dengan hidangan sederhana dari dapur pesantren. Semua ini menciptakan suasana kerja yang menyenangkan dan penuh semangat.
            </p>

            <ol data-aos="fade-up">
                <li style="font-weight: bold;">Kebersihan Lingkungan Terjaga</li>
                    <p>Pesantren menjadi tempat yang nyaman, sehat, dan asri untuk kegiatan belajar, beribadah, dan tinggal.</p>
                <li style="font-weight: bold;">Meningkatkan Kebersamaan</li>
                    <p>Santri belajar bekerja sama, saling membantu, dan mempererat ukhuwah Islamiyah dalam setiap aktivitas.</p>
                <li style="font-weight: bold;">Menanamkan Nilai-Nilai Islami</li>
                    <p>Ro’an menjadi sarana pembelajaran langsung tentang pentingnya kebersihan sebagai bagian dari iman.</p>
                <li style="font-weight: bold;">Meningkatkan Kesadaran Lingkungan</li>
                    <p>Dengan merawat lingkungan pesantren, santri belajar untuk peduli terhadap lingkungan alam sekitar, yang nantinya akan menjadi bekal dalam kehidupan bermasyarakat.</p>
            </ol>

            <p data-aos="fade-up">
                Mari Jadikan Kebersihan sebagai Budaya. Kegiatan ro’an adalah contoh nyata bahwa menjaga kebersihan bukan hanya tanggung jawab individu, tetapi tugas bersama yang bisa menjadi ladang pahala dan kebahagiaan. Dengan lingkungan yang bersih, aktivitas pesantren berjalan lebih lancar, dan suasana belajar menjadi lebih kondusif.
            </p>
            <h5 data-aos="fade-right">Pondok Pesantren Ashabul Kahfi: Bersih Lingkungannya, Bersih Hatinya, Berkah Hidupnya.</h5>
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