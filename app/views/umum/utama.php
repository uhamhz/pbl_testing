<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Pesantren Ashabul Kahfi</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!--Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        :root {
            --transition-duration: 0.3s;
        }

        /* Light mode colors */
        [data-bs-theme="light"] {
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --card-bg: #ffffff;
            --border-color: #dee2e6;
        }

        /* Dark mode colors */
        [data-bs-theme="dark"] {
            --bg-primary: #1a1a1a;
            --bg-secondary: #2d2d2d;
            --text-primary: #ffffff;
            --text-secondary: #ced4da;
            --card-bg: #333333;
            --border-color: #404040;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color var(--transition-duration), color var(--transition-duration);
        }

        /* Navbar styles */
        .navbar {
            background-color: var(--bg-primary) !important;
            border-bottom: 1px solid var(--border-color);
            padding-top: 1rem;
            padding-bottom: 1rem;
            transition: background-color var(--transition-duration);
        }

        .navbar-brand img.logo-icon {
            height: 40px;
        }

        /* Hero section styles */
        .hero-section {
            padding: 7rem 0 6rem;
            background-color: var(--bg-secondary);
            transition: background-color var(--transition-duration);
        }

        /* Activity card styles */
        .activity-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: background-color var(--transition-duration), box-shadow var(--transition-duration);
        }

        .activity-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .activity-content {
            padding: 1.5rem;
        }

        /* Profile card styles */
        .profile-card {
            background-color: var(--card-bg);
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            transition: background-color var(--transition-duration);
        }

        /* Contact section styles */
        .contact-info-item {
            background-color: var(--card-bg);
            padding: 0.06rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            transition: background-color var(--transition-duration);
        }

        /* Modal styles */
        .modal-content {
            background-color: var(--bg-primary);
            color: var(--text-primary);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }

        /* Form styles */
        .form-control {
            background-color: var(--bg-secondary);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .form-control:focus {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }

        /* Footer styles */
        footer {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
            transition: background-color var(--transition-duration);
        }

        /* Social Links */
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        /* Latar belakang warna spesifik per ikon */
        .youtube {
            background-color: #FF0000;
        }

        .instagram {
            background-color: #E1306C;
        }

        .facebook {
            background-color: #4267B2;
        }

        /* Efek hover */
        .social-icon:hover {
            transform: scale(1.2);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
        }


        /* Scroll offset for navbar */
        html {
            scroll-padding-top: 80px;
        }

        /* Section padding */
        section {
            padding: 5rem 0;
        }

        /* Button styles */
        .cta-button {
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            margin-right: 1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .primary-button {
            background-color: #28a745;
            color: white !important;
        }

        .primary-button:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .secondary-button {
            background-color: transparent;
            border: 2px solid #28a745;
            color: #28a745 !important;
        }

        .secondary-button:hover {
            background-color: #28a745;
            color: white !important;
            transform: translateY(-2px);
        }

        /* Link colors */
        a {
            color: var(--text-primary);
            transition: color var(--transition-duration);
        }

        a:hover {
            color: #28a745;
        }

        /* Swiper customization */
        .swiper-button-next,
        .swiper-button-prev {
            color: #28a745 !important;
        }

        .swiper-pagination-bullet-active {
            background: #28a745 !important;
        }

        /* Dark mode toggle */
        .dark-mode-toggle {
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .dark-mode-toggle:hover {
            background-color: var(--bg-secondary);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: #28a745;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #218838;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                padding: 6rem 0 3rem;
            }

            .cta-button {
                display: block;
                margin-bottom: 1rem;
                text-align: center;
            }

            .contact-info-item {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/public/img/logo.png" alt="Ashabul Kahfi Logo" class="logo-icon">
                <span class="logo-text">ASHABUL KAHFI</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link dark-mode-toggle">🌓</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="mb-4">Pondok Pesantren Ashabul Kahfi</h1>
                    <p class="mb-4">Mencetak generasi Islam yang shalih dan shalihah berarti membentuk individu
                        berakhlak mulia, berpegang teguh pada ajaran Islam, dan mengikuti tradisi Salafush Sholihin
                        dalam setiap aspek kehidupan.</p>
                    <div class="cta-buttons">
                        <a href="<?= BASEURL; ?>/Umum/isLihatFormulir" class="cta-button primary-button">Daftar Sekarang
                            →</a>
                        <a href="#kegiatan" class="cta-button secondary-button">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image">
                        <!-- <img src="/public/img/fotbar.jpg" alt="Pondok Pesantren" class="img-fluid"> -->
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="fotbar" src="/public/img/fotbar.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img class="fotbar" src="/public/img/forbar2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img class="fotbar" src="/public/img/fotbar3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengumuman Section -->
    <section id="kegiatan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Kegiatan Pondok</h2>
            <p class="text-center mb-5" data-aos="fade-up">Berbagai kegiatan dan agenda di Ashabul Kahfi yang ada untuk
                mencapai visi, diikuti oleh seluruh santri dan masyarakat umum dari berbagai kalangan.</p>

            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/public/img/rihlah.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/public/img/kajianPutra.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/public/img/roan.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <!-- Kegiatan Section -->
    <section id="kegiatan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Kegiatan Pondok</h2>
            <p class="text-center mb-5" data-aos="fade-up">Berbagai kegiatan dan agenda di Ashabul Kahfi yang ada untuk
                mencapai visi, diikuti oleh seluruh santri dan masyarakat umum dari berbagai kalangan.</p>

            <div class="swiper" data-aos="fade-up">
                <div class="swiper-wrapper">
                    <!-- Kegiatan Taklim -->
                    <div class="swiper-slide">
                        <div class="activity-card">
                            <img src="/public/img/takilm.jpg" alt="Kajian Harian" class="activity-image">
                            <div class="activity-content">
                                <h3>Kegiatan Taklim Rutin</h3>
                                <p>Kegiatan rutinan yang diikuti oleh seluruh santri/wati Pondok Pesantren Ashabul Kahfi
                                    dan dibimbing oleh asatidz dengan sanad yang jelas.</p>
                                <a href="detail/Taklim.html" class="btn btn-outline-success">Pelajari lebih lanjut →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Alquran Study Club -->
                    <div class="swiper-slide">
                        <div class="activity-card">
                            <img src="/public/img/asc.jpg" alt="Kegiatan Akademik" class="activity-image">
                            <div class="activity-content">
                                <h3>Alquran Study Club</h3>
                                <p>Pengajaran mengaji anak-anak dari masyarakat sekitar oleh santri/wati Pondok
                                    Pesantren Ashabul Kahfi.</p>
                                <a href="detail/asc.html" class="btn btn-outline-success">Pelajari lebih lanjut →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Ro'an -->
                    <div class="swiper-slide">
                        <div class="activity-card">
                            <img src="/public/img/roan.jpg" alt="Kegiatan Akademik" class="activity-image">
                            <div class="activity-content">
                                <h3>Ro'an/Kerja Bakti</h3>
                                <p>Kegiatan bersih-bersih lingkungan internal pondok setiap minggu untuk menjaga
                                    kebersihan dan keasrian pesantren</p>
                                <a href="detail/kerjaBakti.html" class="btn btn-outline-success">Pelajari lebih lanjut
                                    →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Rihlah -->
                    <div class="swiper-slide">
                        <div class="activity-card">
                            <img src="/public/img/rihlah.jpg" alt="Rihlah" class="activity-image">
                            <div class="activity-content">
                                <h3>Rihlah</h3>
                                <p>Liburan para santri saat liburan semester ke tempat wisata edukasi dan islami sebagai
                                    tadabur alam.</p>
                                <a href="detail/rihlah.html" class="btn btn-outline-success">Pelajari lebih lanjut →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="about" class="hero-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Profil Pondok Pesantren</h2>
            <p class="text-center mb-5" data-aos="fade-up">Mengenal lebih dekat Pondok Pesantren Ashabul Kahfi</p>

            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="profile-card">
                        <div class="profile-icon">📚</div>
                        <h3>Visi dan Misi</h3>
                        <p>Membentuk generasi Qurani yang berakhlak mulia dan berwawasan luas</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="profile-card">
                        <div class="profile-icon">🎯</div>
                        <h3>Program Unggulan</h3>
                        <p>Program tahfidz, bahasa Arab & Inggris, dan entrepreneurship</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="profile-card">
                        <div class="profile-icon">🏢</div>
                        <h3>Fasilitas</h3>
                        <p>Asrama nyaman, masjid, perpustakaan, dan laboratorium modern</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Hubungi Kami</h2>
            <p class="text-center mb-5" data-aos="fade-up">Punya pertanyaan? Jangan ragu untuk menghubungi kami</p>

            <div class="row">
                <div class="col-lg-6 " data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-icon">📍</div>
                            <div>
                                <h4>Alamat</h4>
                                <p><a href="https://maps.app.goo.gl/hA4nfJUxyEtj36gD9" target="_blank">Jl. Semanggi Bar.
                                        No.1a, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</a></p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">📱</div>
                            <div>
                                <h4>Telepon</h4>
                                <p>Santri Putra : 085785872572 (Sugiono)<br>
                                    Santri Putri : 085784880315 (Lily)</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">✉️</div>
                            <div>
                                <h4>Email</h4>
                                <p>info@ashabulkahfi.ac.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <form class="contact-form">
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <input type="tel" class="form-control" placeholder="Nomor Telepon">
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="5" placeholder="Pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <h3>Ashabul Kahfi</h3>
                    <p>Membentuk generasi Qurani yang berakhlak mulia dan berwawasan luas</p>
                </div>

                <div class="col-md-4 mb-4">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="#kegiatan" class="text-light text-decoration-none">Kegiatan</a></li>
                        <li><a href="#about" class="text-light text-decoration-none">Profil</a></li>
                        <li><a href="#contact" class="text-light text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <!-- social links -->
                <div class="col-md-4 mb-4 text-center">
                    <h3>Sosial Media</h3>
                    <ul class="list-unstyled d-flex justify-content-center gap-2">
                        <li>
                            <a href="https://www.youtube.com/channel/YourChannelID" target="_blank"
                                class="social-icon youtube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/YourInstagramID" target="_blank"
                                class="social-icon instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/YourFacebookID" target="_blank"
                                class="social-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">© 2024 Pondok Pesantren Ashabul Kahfi. All rights reserved.</p>
        </div>
    </footer>

    <!-- Trigger Wrong data -->
    <?php
    if (isset($_SESSION['login_error'])):
        ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Username atau Password Salah!",
            });
        </script>
        <?php
        unset($_SESSION['login_error']);
    endif;
    ?>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Siakad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Umum/isLogin" method="post" >
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordInput">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <span id="togglePasswordIcon" class="bi bi-eye-slash"></span>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                            <a href="#" class="float-end text-decoration-none">Lupa password?</a>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Efek loading spinner */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        /* Animasi rotasi */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>


    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');

            togglePassword.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePasswordIcon.classList.remove('bi-eye-slash');
                    togglePasswordIcon.classList.add('bi-eye');
                } else {
                    passwordInput.type = 'password';
                    togglePasswordIcon.classList.remove('bi-eye');
                    togglePasswordIcon.classList.add('bi-eye-slash');
                }
            });
        });
    </script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Swiper
        new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });

        // Dark mode toggle with proper theme handling
        const darkModeToggle = document.querySelector('.dark-mode-toggle');
        const html = document.documentElement;

        function toggleDarkMode() {
            const isDark = html.getAttribute('data-bs-theme') === 'dark';
            const newTheme = isDark ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', newTheme);
            darkModeToggle.textContent = isDark ? '🌓' : '☀️';
            localStorage.setItem('theme', newTheme);
        }

        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            html.setAttribute('data-bs-theme', savedTheme);
            darkModeToggle.textContent = savedTheme === 'dark' ? '☀️' : '🌓';
        }

        darkModeToggle.addEventListener('click', toggleDarkMode);

        // Smooth scroll with offset for fixed navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                // Close mobile menu if open
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }

                // Smooth scroll to target
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerOffset = 80;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active nav link highlighting
        const sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', () => {
            const scrollY = window.pageYOffset;
            sections.forEach(section => {
                const sectionHeight = section.offsetHeight;
                const sectionTop = section.offsetTop - 100;
                const sectionId = section.getAttribute('id');
                const navLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    navLink?.classList.add('active');
                } else {
                    navLink?.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>