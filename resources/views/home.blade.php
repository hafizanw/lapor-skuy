<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lapor Skuy</title>
    <meta name="description" content="Sistem Informasi Aduan Kampus Amikom" />
    <meta name="keywords" content="laporskuy, amikom, aduan kampus" />
    <meta name="author" content="Laporskuy" />

    <meta property="og:title" content="Lapor Skuy" />
    <meta property="og:description" content="Sistem Informasi Aduan Kampus Amikom" />
    <meta property="og:image" content="/images/logo.png" />
    <link rel="icon" href="/images/logo.png" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
      html {
        scroll-behavior: smooth;
      }
      html, body {
            width: 100vw;
            min-width: 0;
            max-width: 100vw;
            overflow-x: hidden !important;
            box-sizing: border-box;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }

        .profileImg {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        .navbar-nav .nav-link {
            position: relative;
            padding-bottom: 5px;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 90%;
            height: 2px;
            background-color: transparent;
            transform: translateX(-50%);
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-link.active::after {
            background-color: #ffc400;
        }

        /* Sidebar mobile only custom style */
        .custom-offcanvas {
            background: #fff;
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
            box-shadow: -2px 0 24px 0 rgba(83,29,171,0.08);
            overflow: hidden;
            animation: sidebarFadeIn 0.5s cubic-bezier(0.4,0,0.2,1);
        }
        @keyframes sidebarFadeIn {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .sidebar-link {
            color: #531DAB !important;
            background: #f6f7ff;
            margin-bottom: 6px;
            transition: background 0.25s, color 0.25s, box-shadow 0.25s;
        }
        .sidebar-link.active, .sidebar-link:hover {
            background: linear-gradient(to right, #6826b4, #842FE3);
            color: #fff !important;
            box-shadow: 0 2px 8px 0 rgba(83,29,171,0.08);
        }
        .sidebar-icon {
            color: inherit !important;
            transition: color 0.25s;
        }
        .sidebar-link.active .sidebar-icon, .sidebar-link:hover .sidebar-icon {
            color: #fff !important;
        }
        .sidebar-profile-top {
            border-bottom: 1px solid #e0e0e0 !important;
            background: #fafaff !important;
        }
        .sidebar-logout-bottom {
            border-top: 1px solid #e0e0e0 !important;
            background: #fafaff !important;
        }

      .whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(to right, #531DAB, #842FE3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        font-size: 24px;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
      }
      .whatsapp-button:hover {
        background-color: #1ebe5d;
        text-decoration: none;
        transform: scale(1.08) rotate(-6deg);
      }
      .dashboard-hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);
        overflow: hidden;
      }
      .dashboard-hero .bg-img {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        object-fit: cover;
        filter: brightness(0.45) blur(1.5px);
        z-index: 0;
        transition: filter 0.5s;
      }
      .dashboard-hero .hero-content {
        position: relative;
        z-index: 2;
        color: #fff;
        text-align: center;
        padding-top: 60px;
        padding-bottom: 60px;
        width: 100%;
      }
      .dashboard-hero .hero-content img {
        width: 220px;
        max-width: 80%;
        margin-bottom: 2rem;
        filter: drop-shadow(0 4px 16px rgba(83,29,171,0.12));
        animation: fadeInDown 1s;
      }
      .dashboard-hero .hero-content h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        letter-spacing: 1px;
        animation: fadeInDown 1.1s;
      }
      .dashboard-hero .hero-content h2 {
        font-size: 1.5rem;
        font-weight: 400;
        margin-bottom: 2rem;
        animation: fadeInUp 1.2s;
      }
      .dashboard-hero .hero-content .btn {
        font-size: 1.2rem;
        padding: 0.8rem 2.5rem;
        border-radius: 2rem;
        background: linear-gradient(to right, #531fa7, #6826b4);
        box-shadow: 0 2px 12px 0 rgba(83,29,171,0.10);
        transition: background 0.3s, transform 0.3s;
        animation: fadeInUp 1.3s;
      }
      .dashboard-hero .hero-content .btn:hover {
        background: linear-gradient(to right, #6826b4, #531fa7);
        transform: scale(1.05);
      }
      /* Card Fitur & Statistik */
      .dashboard-feature-card, .dashboard-stat-card {
        border-radius: 18px;
        box-shadow: 0 2px 12px 0 rgba(83,29,171,0.07);
        border: none;
        transition: transform 0.35s cubic-bezier(0.22,1,0.36,1), box-shadow 0.35s;
        background: #fff;
        overflow: hidden;
      }
      .dashboard-feature-card:hover, .dashboard-stat-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px 0 rgba(83,29,171,0.13);
      }
      .dashboard-feature-icon, .dashboard-stat-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        margin: 0 auto 1rem auto;
        box-shadow: 0 2px 8px 0 rgba(83,29,171,0.10);
        transition: background 0.3s;
      }
      .dashboard-feature-card:hover .dashboard-feature-icon,
      .dashboard-stat-card:hover .dashboard-stat-icon {
        background: linear-gradient(135deg, #842FE3 60%, #531DAB 100%);
      }
      .dashboard-feature-card h5, .dashboard-stat-card h5 {
        font-weight: 600;
        margin-top: 0.5rem;
      }
      .dashboard-feature-card p, .dashboard-stat-card p {
        color: #888;
        font-size: 0.98rem;
      }
      .dashboard-stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #531DAB;
        margin: 0.5rem 0 0.2rem 0;
        letter-spacing: 1px;
      }
      /* Carousel */
      .carousel-card {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 2px 12px 0 rgba(83,29,171,0.10);
        transition: box-shadow 0.3s;
      }
      .carousel-card img {
        object-fit: cover;
        height: 220px;
        width: 100%;
        transition: filter 0.3s;
      }
      .carousel-card:hover img {
        filter: brightness(0.92) blur(1px);
      }
      /* Responsive */
      @media (max-width: 767.98px) {
        .dashboard-hero .hero-content h1 {
          font-size: 1.6rem;
        }
        .dashboard-hero .hero-content h2 {
          font-size: 1.1rem;
        }
        .dashboard-hero .hero-content img {
          width: 140px;
        }
        .dashboard-feature-icon, .dashboard-stat-icon {
          width: 60px; height: 60px;
        }
        .carousel-card img {
          height: 120px;
        }
      }
      .dashboard-feature-card.animate__delay-1s { animation-delay: 0.2s !important; }
      .dashboard-feature-card.animate__delay-2s { animation-delay: 0.4s !important; }
      .dashboard-feature-card.animate__delay-3s { animation-delay: 0.6s !important; }
      .dashboard-feature-card.animate__delay-4s { animation-delay: 0.8s !important; }
      .dashboard-stat-card.animate__delay-1s { animation-delay: 0.2s !important; }
      .dashboard-stat-card.animate__delay-2s { animation-delay: 0.4s !important; }
      .dashboard-stat-card.animate__delay-3s { animation-delay: 0.6s !important; }
      .dashboard-stat-card.animate__delay-4s { animation-delay: 0.8s !important; }
      .animate__delay-1s { animation-delay: 0.2s !important; }
      .animate__delay-2s { animation-delay: 0.4s !important; }
      .animate__delay-3s { animation-delay: 0.6s !important; }
      .animate__delay-4s { animation-delay: 0.8s !important; }
      .animate__delay-5s { animation-delay: 1s !important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <!-- Left -->
            <a href="#">
                <img src="{{ asset('assets/logo.png') }}">
            </a>
    
            <!-- Hamburger Menu (Mobile Only) -->
            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Desktop Menu (Hidden on Mobile) -->
            <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                        data-bs-target="#loginModal">KIRIM ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                        data-bs-target="#loginModal">LIHAT ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                      data-bs-target="#loginModal">FAQ</a></li>
                </ul>
                <div class="d-flex align-items-center rounded-pill px-2 py-2 mx-2 shadow-md">
                    <a href="{{ route('login') }}" class="btn btn-light fw-semibold px-4 rounded-pill shadow-sm">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>






    <!-- Sidebar (Mobile Only) -->
    <div class="offcanvas offcanvas-end d-md-none text-bg-light custom-offcanvas" style="width: 50vw;" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
      <div class="offcanvas-body d-flex flex-column p-0">

        <div class="d-flex flex-column align-items-start px-3 py-4">
          <h5 class="mx-2 fw-bold text-dark">Lapor Skuy</h5>
          <div class="mx-2" style="width: 50%; border-bottom: 2px solid rgb(194, 194, 194); margin: 10px 0;"></div>
        </div>

          <!-- Navigation (langsung di bawah profile, no flex-grow) -->
          <ul class="nav flex-column mb-4 mt-2">
              <li class="nav-item">
                <a class="nav-link nav-mobile {{ request()->is('dashboard') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="">
                  <i data-feather="home" class="fs-4 me-2 sidebar-icon"></i> Home
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link nav-mobile {{ request()->is('kirim-aduan') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('kirim-aduan') }}" data-bs-toggle="modal" 
                    data-bs-target="#loginModal">
                    <i data-feather="send" class="fs-4 me-2 sidebar-icon"></i> Kirim Aduan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-mobile {{ request()->is('aduan-umum') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('aduan-umum') }}" data-bs-toggle="modal" 
                    data-bs-target="#loginModal">
                    <i data-feather="file-text" class="fs-4 me-2 sidebar-icon"></i> Lihat Aduan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-mobile d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('faq') }}" data-bs-toggle="modal" 
                  data-bs-target="#loginModal">
                    <i data-feather="pocket" class="fs-4 me-2 sidebar-icon"></i> FAQ
                  </a>
                </li>
            </ul>

          <!-- Market List -->
          <div class="px-3">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ route('login') }}" class="btn fw-semibold px-4 rounded-pill shadow-sm text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);">
                    Login
                </a>
            </div>
          </div>
        </div>
  </div>

    <main>
          <section id="home">
            <div class="dashboard-hero">
              <img src="images/background.jpg" alt="Background" class="bg-img"/>
              <div class="hero-content">
                <img src="images/logo2.png" alt="Logo" class="animate__animated animate__fadeInDown"/>
                <h2 class="mb-3 animate__animated animate__fadeInUp" style="animation-delay:0.8s;">
                  Welcome to <span class="fw-bold text-warning">Lapor Skuy</span>
                </h2>
                <a href="" class="mt-3 animate__animated animate__fadeInUp" style="animation-delay:1.1s;" data-bs-toggle="modal" 
                data-bs-target="#loginModal">
                  <button type="button" class="btn btn-lg fw-bold shadow-sm px-4 py-2 text-light">
                    Lapor Yuk!
                  </button>
                </a>
              </div>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
          </section>
        
          {{-- Layanan --}}
          <section>
            <div class="container text-center py-5">
              <!-- Judul -->
              <h2 class="fw-bold">Fitur Layanan</h2>
              <p class="text-secondary fs-5 mb-4">Sistem Informasi Aduan</p>
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
                <!-- Kirim Aduan -->
                <div class="col">
                  <a href="{{ route('kirim-aduan') }}" class="text-decoration-none" data-bs-toggle="modal" 
                  data-bs-target="#loginModal">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition dashboard-feature-card animate__animated animate__fadeInUp animate__delay-1s">
                      <div class="card-body text-center d-flex flex-column justify-content-between h-100">
                        <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3 dashboard-feature-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);">
                          <img src="{{ asset('assets/paper-airplane.svg') }}" width="40px">
                        </div>
                        <h5 class="fw-semibold text-dark">KIRIM ADUAN</h5>
                        <p class="text-muted small">Tempat untuk mengirim aduan umum atau aduan privat</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- Lihat Aduan -->
                <div class="col">
                  <a href="{{ route('aduan-umum') }}" class="text-decoration-none" data-bs-toggle="modal" 
                  data-bs-target="#loginModal">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition dashboard-feature-card animate__animated animate__fadeInUp animate__delay-2s">
                      <div class="card-body text-center d-flex flex-column justify-content-between h-100">
                        <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3 dashboard-feature-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);">
                          <img src="{{ asset('assets/lihat-aduan.svg') }}" width="40px">
                        </div>
                        <h5 class="fw-semibold text-dark">LIHAT ADUAN</h5>
                        <p class="text-muted small">Melihat aduan yang telah terkirim</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- FAQ -->
                <div class="col">
                  <a href="{{ route('faq') }}" class="text-decoration-none" data-bs-toggle="modal" 
                  data-bs-target="#loginModal">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition dashboard-feature-card animate__animated animate__fadeInUp animate__delay-3s">
                      <div class="card-body text-center d-flex flex-column justify-content-between h-100">
                        <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3 dashboard-feature-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);">
                          <img src="{{ asset('assets/faq.svg') }}" width="40px">
                        </div>
                        <h5 class="fw-semibold text-dark">FAQ</h5>
                        <p class="text-muted small">Tempat untuk mengetahui tata cara penggunaan sistem dan FAQ</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- Statistik -->
                <div class="col">
                  <a href="#statistik" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition dashboard-feature-card animate__animated animate__fadeInUp animate__delay-4s">
                      <div class="card-body text-center d-flex flex-column justify-content-between h-100">
                        <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3 dashboard-feature-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);">
                          <img src="{{ asset('assets/statistik.svg') }}" width="40px">
                        </div>
                        <h5 class="fw-semibold text-dark">STATISTIK</h5>
                        <p class="text-muted small">Menampilkan statistik dari aduan</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
        
        {{-- About lapor skuy --}}
    <section class="text-center text-light py-4" style="background: linear-gradient(135deg, #531DAB, #6A1B9A);">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-10">
                  <!-- Ikon ilustrasi (opsional) -->
                  <div class="mb-4">
                    <img src="{{ asset('assets/michrophone.svg') }}" width="80px">
                  </div>
                  <!-- Judul -->
                  <h2 class="fw-bold display-5">Tentang Lapor Skuy</h2>
                  <p class="fs-5 opacity-75 mb-4">Sistem Informasi Aduan</p>
                  <!-- Deskripsi -->
                  <p class="fs-6 opacity-90">
                      Lapor Skuy merupakan sistem pengaduan untuk civitas akademik Universitas Amikom Yogyakarta.
                      Platform ini memudahkan penyampaian saran dan kritik membangun kepada pihak kampus,
                      yang nantinya akan ditangani oleh departemen terkait dengan cepat dan sesuai prosedur.
                  </p>
              </div>
          </div>
          
          <div id="carouselResponsive" class="carousel slide my-4" data-bs-ride="carousel">
            <!-- Indicator -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselResponsive" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselResponsive" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselResponsive" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
          
            <!-- Slides -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card mx-auto rounded-4 border-3 overflow-hidden carousel-card">
                  <img src="{{ asset('images/background.jpg') }}" class="d-block w-100" alt="Slide 1">
                </div>
              </div>
              <div class="carousel-item">
                <div class="card mx-auto shadow rounded-4 border-3 overflow-hidden carousel-card">
                  <img src="{{ asset('images/background.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
              </div>
              <div class="carousel-item">
                <div class="card mx-auto shadow rounded-4 border-3 overflow-hidden carousel-card">
                  <img src="{{ asset('images/background.jpg') }}" class="d-block w-100" alt="Slide 3">
                </div>
              </div>
            </div>
          
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselResponsive" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselResponsive" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Berikutnya</span>
            </button>
          </div>
      </div>
    </section>
            
            {{-- Statistik --}}
            <section id="statistik">
              <div class="container text-center py-5">
                <!-- Judul -->
                <h2 class="fw-bold">Statistik</h2>
                <p class="text-secondary fs-5 mb-4">Sistem Informasi Aduan</p>
    
                <!-- Informasi Statistik -->
                                    <!-- Informasi Statistik -->
                                    <div class="row row-cols-1 row-cols-md-2 g-5">
                                      <!-- Total aduan -->
                                      <div class="col">
                                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                                              <div class="card-body text-center">
                                                  <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3"
                                                      style="width: 100px; height: 100px; background-color: #531DAB;">
                                                      <img src="{{ asset('assets/total.svg') }}" width="40px" class="p-1">
                                                      <p class="fs-3 fw-bold m-0 text-light">{{ $data->total_aduan }}</p>
                                                  </div>
                                                  <h5 class="fw-semibold text-dark">TOTAL ADUAN</h5>
                                                  <p class="text-muted small">Jumlah semua aduan yang masuk</p>
                                              </div>
                                          </div>
                                      </div>
                          
                                      <!-- Aduan diproses -->
                                      <div class="col">
                                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                                              <div class="card-body text-center">
                                                <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3"
                                                style="width: 100px; height: 100px; background-color: #531DAB;">
                                                <img src="{{ asset('assets/proses.svg') }}" width="40px" class="p-1">
                                                <p class="fs-3 fw-bold m-0 text-light">{{ $data->aduan_diproses }}</p>
                                            </div>
                                                  <h5 class="fw-semibold text-dark">ADUAN DIPROSES</h5>
                                                  <p class="text-muted small">Jumlah aduan dalam status penanganan</p>
                                              </div>
                                          </div>
                                      </div>
                          
                                      <!-- Aduan selesai -->
                                      <div class="col">
                                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                                              <div class="card-body text-center">
                                                <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3"
                                                style="width: 100px; height: 100px; background-color: #531DAB;">
                                                <img src="{{ asset('assets/selesai.svg') }}" width="40px" class="p-1">
                                                <p class="fs-3 fw-bold m-0 text-light">{{ $data->aduan_selesai }}</p>
                                            </div>
                                                  <h5 class="fw-semibold text-dark">ADUAN SELESAI</h5>
                                                  <p class="text-muted small">Jumlah aduan yang telah terselesaikan</p>
                                              </div>
                                          </div>
                                      </div>
                          
                                      <!-- Total pengadu -->
                                      <div class="col">
                                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                                              <div class="card-body text-center">
                                                <div class="rounded-4 d-flex flex-column justify-content-center align-items-center mx-auto mb-3"
                                                style="width: 100px; height: 100px; background-color: #531DAB;">
                                                <img src="{{ asset('assets/user.svg') }}" width="40px" class="p-1">
                                                <p class="fs-3 fw-bold m-0 text-light">{{ $data->total_pengadu }}</p>
                                            </div>
                                                  <h5 class="fw-semibold text-dark">TOTAL PENGADU</h5>
                                                  <p class="text-muted small">Jumlah pengguna yang telah mengadu</p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
            </div>
            <a href="https://wa.me/6285253444999" target="_blank" class="whatsapp-button">
              <i data-feather="phone-call"></i>
            </a>

                <!-- Modal untuk login -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                        <p>Silakan login terlebih dahulu untuk melanjutkan.</p>
                        </div>
                        <div class="modal-footer">
                        <a href="{{ route('login') }}" class="btn text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);">Login</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
    </main>

    <footer class="text-white text-center py-4" style="background-color: #531DAB;">
    <div class="container">
      <p class="mb-1 fw-semibold">
        <span class="text-warning">@Lapor Skuy </span>Universitas Amikom Yogyakarta
      </p>
      <p class="mb-0 text-white-50">
        Copyright @2025 All Right Reserved
      </p>
    </div>
  </footer>

  <script>
    feather.replace();
    // Animate sidebar icons on open
    const offcanvasMenu = document.getElementById('offcanvasMenu');
    if (offcanvasMenu) {
      offcanvasMenu.addEventListener('shown.bs.offcanvas', function () {
        feather.replace();
      });
    }

    // Navbar hide on scroll down, show on scroll up (always, not just at top)
    document.addEventListener('DOMContentLoaded', function() {
      const navbar = document.querySelector('nav.navbar');
      if (!navbar) return;
      navbar.style.transition = 'transform 0.45s cubic-bezier(0.4,0,0.2,1), opacity 0.35s cubic-bezier(0.4,0,0.2,1)';
      navbar.style.willChange = 'transform, opacity';
      navbar.style.position = 'fixed';
      navbar.style.top = '0';
      navbar.style.left = '0';
      navbar.style.width = '100%';
      navbar.style.zIndex = 1030;
      let lastScrollTop = window.scrollY;
      let lastDirection = null;
      let ticking = false;
      let navbarHeight = navbar.offsetHeight;
      window.addEventListener('scroll', function() {
        if (!ticking) {
          window.requestAnimationFrame(function() {
            let st = window.scrollY;
            if (st > lastScrollTop) {
              // Scroll down anywhere
              if (lastDirection !== 'down') {
                navbar.style.transform = `translateY(-${navbarHeight + 20}px)`;
                navbar.style.opacity = '0.2';
                lastDirection = 'down';
              }
            } else if (st < lastScrollTop) {
              // Scroll up anywhere
              if (lastDirection !== 'up') {
                navbar.style.transform = 'translateY(0)';
                navbar.style.opacity = '1';
                lastDirection = 'up';
              }
            }
            lastScrollTop = st <= 0 ? 0 : st;
            ticking = false;
          });
          ticking = true;
        }
      });
      window.addEventListener('resize', function() {
        navbarHeight = navbar.offsetHeight;
      });
      navbar.style.transform = 'translateY(0)';
      navbar.style.opacity = '1';
    });
  </script>
</body>
</html>






