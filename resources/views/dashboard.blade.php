{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Dashboard')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
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
@endpush

@section('content')
<section id="home">
    <div class="dashboard-hero">
      <img src="images/background.jpg" alt="Background" class="bg-img" />
      <div class="hero-content">
        <img src="images/logo2.png" alt="Logo" />
        <h1 class="animate__animated animate__fadeInDown mt-5">
          Halo, {{ Auth::user()->name }}
        </h1>
        <h2 class="mb-3 animate__animated animate__fadeInUp animate__delay-1s">
          Welcome to <span class="fw-bold text-warning">Lapor Skuy</span>
        </h2>
        <a href="{{ route('kirim-aduan') }}" class="mt-3 animate__animated animate__fadeInUp animate__delay-2s">
          <button type="button" class="btn btn-lg fw-bold shadow-sm px-4 py-2 text-light">
            Lapor Yuk!
          </button>
        </a>
      </div>
    </div>
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
            <a href="{{ route('kirim-aduan') }}" class="text-decoration-none">
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
            <a href="{{ route('aduan-umum') }}" class="text-decoration-none">
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
            <a href="{{ route('faq') }}" class="text-decoration-none">
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
            <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal">
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
    <section>
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
    </section>
@endsection

@section('footer')
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
@endsection
