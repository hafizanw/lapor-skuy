<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .nav-mobile:hover {
          background-color: #e9ecef; /* abu hover */
          color: #000;
        }
      
        .nav-mobile.active {
          background-color: #6c757d; /* Bootstrap secondary */
          color: #fff;
        }
      
        .nav-mobile.active:hover {
          background-color: #5c636a; /* lebih gelap saat hover aktif */
        }

        .carousel-card {
          width: 100%;
          max-width: 800px;
        }

        .carousel-card img {
          object-fit: cover;
          height: 400px;
          transition: transform 0.3s ease-in-out;
        }

        /* Responsive height for smaller screens */
        @media (max-width: 768px) {
          .carousel-card img {
            height: 250px;
          }
        }

        @media (max-width: 576px) {
          .carousel-card img {
            height: 200px;
          }
        }

        .whatsapp-button {
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 1;
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
          transition: background-color 0.3s ease;
        }

        .whatsapp-button:hover {
          background-color: #1ebe5d;
          text-decoration: none;
        }
      </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <!-- Left -->
            <div class="">
                <img src="{{ asset('assets/logo.png') }}">
            </div>
    
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
    <div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 50vw" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
  
            <!-- Logo & Menu -->
            <div>
              <!-- Logo -->
              <div class="d-flex flex-column align-items-start px-3 py-4">
                <h5 class="mx-2 fw-bold text-dark">Lapor Skuy</h5>
                <div class="mx-2" style="width: 50%; border-bottom: 2px solid rgb(194, 194, 194); margin: 10px 0;"></div>
              </div>
        
              <!-- Navigation -->
              <ul class="nav flex-column mb-4">
                <li class="nav-item">
                  <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                    <i data-feather="home" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Home
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#" data-bs-toggle="modal" 
                    data-bs-target="#loginModal">
                      <i data-feather="send" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Kirim Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#" data-bs-toggle="modal" 
                    data-bs-target="#loginModal">
                      <i data-feather="file-text" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Lihat Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#" data-bs-toggle="modal" 
                    data-bs-target="#loginModal">
                      <i data-feather="pocket" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> FAQ
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
    </div>

    <main>
        <section id="home">
            <div class="position-relative overflow-hidden vh-100">
            
              <!-- Background image -->
              <div class="position-absolute top-0 start-0 w-100 h-100 z-n1">
                <img
                  src="images/background.jpg"
                  alt="Background"
                  class="w-100 h-100 object-fit-cover"
                  style="filter: brightness(0.5);"
                />
              </div>
          
              <!-- Content -->
              <div class="container d-flex flex-column align-items-center justify-content-center text-center vh-100">
                <img src="images/logo2.png" alt="Logo" class="mb-5" style="width: 250px; max-width: 80%;" />
          
                <h2 class="text-white fw-normal mb-3 animate__animated animate__fadeInUp animate__delay-1s">
                  Welcome to <span class="fw-bold text-warning">Lapor Skuy</span>
                </h2>
          
                <a href="#formLapor" class="mt-3 animate__animated animate__fadeInUp animate__delay-2s">
                  <button type="button" class="btn btn-lg fw-bold shadow-sm px-4 py-2 text-light" class="btn btn-warning mt-4" style="background: linear-gradient(to right, #531fa7, #6826b4);" 
                  data-bs-toggle="modal" 
                  data-bs-target="#loginModal">
                    Lapor Yuk!
                  </button>
                </a>
              </div>
            </div>
          </section>
        
            {{-- Layanan --}}
            <section>
              <div class="container py-5 text-center">
                  <!-- Judul -->
                  <h2 class="fw-bold">Fitur Layanan</h2>
                  <p class="text-secondary fs-5 mb-5">Sistem Informasi Aduan</p>
          
                  <!-- Kartu Fitur -->
                  <div class="row row-cols-1 row-cols-md-2 g-5">
                      <!-- Kirim Aduan -->
                      <div class="col">
                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                            <a href="" class="text-decoration-none" data-bs-toggle="modal" 
                            data-bs-target="#loginModal">
                              <div class="card-body text-center">
                                <div class="rounded-4 d-flex justify-content-center align-items-center mx-auto mb-3"
                                    style="width: 80px; height: 80px; background-color: #531DAB;">
                                    <img src="{{ asset('assets/paper-airplane.svg') }}" width="40px">
                                </div>
                                <h5 class="fw-semibold text-dark">KIRIM ADUAN</h5>
                                <p class="text-muted small">Tempat untuk mengirim aduan umum atau aduan privat</p>
                            </div>
                            </a>
                          </div>
                      </div>
          
                      <!-- Lihat Aduan -->
                      <div class="col">
                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                            <a href="" class="text-decoration-none" data-bs-toggle="modal" 
                            data-bs-target="#loginModal">
                              <div class="card-body text-center">
                                <div class="rounded-4 d-flex justify-content-center align-items-center mx-auto mb-3"
                                    style="width: 80px; height: 80px; background-color: #531DAB;">
                                    <img src="{{ asset('assets/lihat-aduan.svg') }}" width="40px">
                                </div>
                                <h5 class="fw-semibold text-dark">LIHAT ADUAN</h5>
                                <p class="text-muted small">Melihat aduan yang telah terkirim</p>
                            </div>
                            </a>
                          </div>
                      </div>
          
                      <!-- FAQ -->
                      <div class="col">
                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                              <a href="" class="text-decoration-none" data-bs-toggle="modal" 
                              data-bs-target="#loginModal">
                                <div class="card-body text-center">
                                  <div class="rounded-4 d-flex justify-content-center align-items-center mx-auto mb-3"
                                      style="width: 80px; height: 80px; background-color: #531DAB;">
                                      <img src="{{ asset('assets/faq.svg') }}" width="40px">
                                  </div>
                                  <h5 class="fw-semibold text-dark">FAQ</h5>
                                  <p class="text-muted small">Tempat untuk mengetahui tata cara penggunaan sistem dan FAQ</p>
                              </div>
                              </a>
                          </div>
                      </div>
          
                      <!-- Statistik -->
                      <div class="col">
                          <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                              <a href="" class="text-decoration-none" data-bs-toggle="modal" 
                              data-bs-target="#loginModal">
                                <div class="card-body text-center">
                                  <div class="rounded-4 d-flex justify-content-center align-items-center mx-auto mb-3"
                                      style="width: 80px; height: 80px; background-color: #531DAB;">
                                      <img src="{{ asset('assets/statistik.svg') }}" width="40px">
                                  </div>
                                  <h5 class="fw-semibold text-dark">STATISTIK</h5>
                                  <p class="text-muted small">Menampilkan statistik dari aduan</p>
                              </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        
           <!-- Tentang Lapor Skuy -->
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
                        <img src="{{ asset('images/logo.png') }}" class="d-block w-100" alt="Slide 2">
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
  </script>
</body>
</html>
