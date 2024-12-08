<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rihlah</title>
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
            <a href="<?= BASEURL; ?>/umum" class="back-button">Kembali</a>
        </div>
    </nav>
    <div class="container mt-5">
        <!-- Gambar -->
        <section class="image-section text-center mb-4">
            <img src="/public/img/rihlah.jpg" alt="Rihlah" class="img-fluid" data-aos="fade-up">
        </section>

        <!-- Konten -->
        <section class="content-section">
            <h1 class="text-center" data-aos="fade-right">Liburan Semester Para Santri Pondok Pesantren Ashabul Kahfi</h1>
            <p class="text-justify" data-aos="fade-left">
                Liburan semester menjadi momen yang dinanti-nanti oleh para santri Pondok Pesantren Ashabul Kahfi. Di tengah kesibukan belajar dan rutinitas di pesantren, mereka diajak untuk mengikuti kegiatan liburan yang tak hanya menyegarkan pikiran, tetapi juga memperkaya spiritualitas dan wawasan. Kegiatan ini dikemas dalam bentuk wisata edukasi dan islami dengan tujuan utama tadabur alam, sehingga menjadi pengalaman yang penuh makna dan keberkahan.
            </p>

            <h5 data-aos="fade-right">Makna Tadabur Alam dalam Islam</h5>
            <p class="text-justify" data-aos="fade-left">
                Tadabur alam bukan sekadar rekreasi biasa. Dalam Islam, Allah SWT memerintahkan kita untuk merenungkan keindahan ciptaan-Nya sebagai tanda kebesaran-Nya. Firman Allah dalam Surah Ali-Imran ayat 190 berbunyi:
                <span class="quote">“Sesungguhnya dalam penciptaan langit dan bumi, serta pergantian malam dan siang terdapat tanda-tanda (kebesaran Allah) bagi orang-orang yang berakal.”</span>
                Dengan mengunjungi tempat-tempat yang indah dan penuh nilai edukasi, para santri diajak untuk merenungkan ayat-ayat kauniyah (tanda-tanda kebesaran Allah di alam semesta) sambil menikmati suasana liburan.
            </p>

            <p class="text-justify" data-aos="fade-left">
                Kegiatan liburan semester ini dirancang bukan hanya sebagai hiburan, tetapi juga sebagai sarana pembelajaran yang membekas di hati para santri. Mereka pulang dengan jiwa yang lebih segar, iman yang lebih kuat, dan semangat yang lebih besar untuk terus belajar dan mengamalkan ilmu.
            </p>

            <p class="text-justify" data-aos="fade-up">
                <strong>Mari bersama Pondok Pesantren Ashabul Kahfi,</strong> menjadikan setiap momen liburan sebagai perjalanan spiritual yang membawa kita lebih dekat kepada Sang Pencipta.
            </p>
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