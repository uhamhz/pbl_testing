<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Taklim Rutin</title>

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
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        td[colspan] {
            text-align: left;
            font-style: italic;
        }

        ol {
            margin-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            p {
                font-size: 0.9rem;
            }

            table th,
            table td {
                font-size: 0.8rem;
            }
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
    <div class="container">
        <!-- section gambar  -->
        <section class="image-section mb-5">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
        
                <!-- Carousel Items -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="/public/img/putra.png" class="d-block w-100 img-fluid" alt="Kegiatan Taklim Rutin">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="/public/img/putri.png" class="d-block w-100 img-fluid" alt="Rihlah">
                    </div>
                </div>
        
                <!-- Controls (Optional: Next/Prev Buttons) -->
                <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        

    <section class="content-section">
        <h1 data-aos="fade-right">Kegiatan Rutinan Pondok Pesantren Ashabul Kahfi</h1>
        <p data-aos="fade-left">
            Pondok Pesantren Ashabul Kahfi memiliki kegiatan rutinan yang diikuti oleh seluruh santriwan dan santriwati sebagai bagian dari tradisi pendidikan Islam yang berakar pada nilai-nilai keilmuan, kebersamaan, dan keberkahan.
        </p>
        <p data-aos="fade-left">
            Kegiatan ini dilaksanakan di bawah bimbingan para asatidz yang memiliki sanad keilmuan yang jelas dan terhubung hingga ke generasi ulama terdahulu, sehingga menjamin kemurnian ilmu yang diajarkan.
        </p>

        <ol>
            <li style="font-weight: bold;" data-aos="fade-left">Majelis Taklim Kajian Kitab</li>
            <p data-aos="fade-up">
                Taklim sendiri dijadwalkan setiap hari pada ba'da subuh hingga pukul 05.30 WIB dan ba'da maghrib sampai isya. Berikut jadwal taklim:
            </p>
            <div class="table-responsive" data-aos="fade-up">
                <table class="table table-bordered table-hover" style="border: 3px solid black; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="background-color: #6FA8A9; color: white;">Waktu</th>
                            <th style="background-color: #6FA8A9; color: white;">Senin</th>
                            <th colspan="2" style="background-color: #6FA8A9; color: white;">Selasa</th>
                            <th style="background-color: #6FA8A9; color: white;">Rabu</th>
                            <th style="background-color: #6FA8A9; color: white;">Kamis</th>
                            <th colspan="2" style="background-color: #6FA8A9; color: white;">Jumat</th>
                            <th colspan="2" style="background-color: #6FA8A9; color: white;">Sabtu</th>
                            <th style="background-color: #6FA8A9; color: white;">Ahad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: yellow;">Ba'da Subuh</td>
                            <td>Idhotun Nasyiin</td>
                            <td colspan="2">Mukhtarul Hadist</td>
                            <td>Sirah An-Nabawiyyah</td>
                            <td>Ta'lim Muta'alim</td>
                            <td colspan="2">Mukhtarul Hadist</td>
                            <td colspan="2"><i>Nderes Individu</i></td>
                            <td>Targhib Wat Tarhib</td>
                        </tr>
                        <tr>
                            <td style="background-color: yellow;">Ba'da Maghrib</td>
                            <td>At-Tibyan</td>
                            <td>Jawahirul Lu'luiyah</td>
                            <td>Jalalul Afham</td>
                            <td>Bil-Qolam</td>
                            <td>Tahlil</td>
                            <td>Idhotun Nasyiin</td>
                            <td>Wasailul Wusul</td>
                            <td>Kifayatul Akhyar</td>
                            <td>Adabul Islam</td>
                            <td>Kegiatan Mingguan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <li style="font-weight: bold;" data-aos="fade-left">Khotmil Al-Qur'an</li>
            <p data-aos="fade-up">
                Menjadi rutinan pada minggu pertama setiap bulan, seluruh santriwan santriwati mengkhatamkan Al-Qur'an secara bersama-sama.
            </p>

            <li style="font-weight: bold;" data-aos="fade-left">Dzikir dan Shalawat Berjamaah</li>
            <ol type="a">
                <li data-aos="fade-up">Dzikir Basyairul Khoirot</li>
                <p data-aos="fade-right">Merupakan dzikir karangan Syaikh Abdul Qadir Al-Jailani yang dibaca secara bersama-sama seluruh santri yang dipimpin secara langsung oleh pengasuh pondok</p>
                <li data-aos="fade-up">Pembacaan Sholawat Diba'</li>
                <p data-aos="fade-right">Tradisi membaca sholawat bersama seluruh santri.</p>
            </ol>
        </ol>
        <p data-aos="fade-left">Kegiatan rutinan ini tidak hanya memperkuat keilmuan, tetapi juga mempererat hubungan antar santri dan para asatidz. Tradisi sanad yang dipegang erat dalam pengajaran memberikan nilai istimewa, karena ilmu yang diajarkan bersumber dari jalur yang dapat dipercaya dan penuh berkah. Mari bergabung dalam keberkahan ini, bersama Pondok Pesantren Ashabul Kahfi, mencetak generasi muda yang alim, berakhlak mulia, dan siap mengabdi untuk umat.</p>
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
