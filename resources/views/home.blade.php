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
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                      <i data-feather="send" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Kirim Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                      <i data-feather="file-text" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Lihat Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
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
                  <button type="button" class="btn btn-warning btn-lg fw-bold shadow-sm px-4 py-2 text-dark" class="btn btn-warning mt-4" 
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
                <div class="container text-center py-5">
                    <!-- Judul -->
                    <h2 class="fw-bold">Fitur Layanan</h2>
                    <p class="text-secondary fs-5 mb-4">Sistem Informasi Aduan</p>
        
                    <!-- Fitur-fitur -->
                    <div class="row row-cols-1 row-cols-md-2 g-5">
        
                        <!-- Kirim Aduan -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-send-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">KIRIM ADUAN</h5>
                            <p class="text-muted small">Tempat untuk mengirim aduan umum atau aduan privat</p>
                        </div>
        
                        <!-- Lihat Aduan -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">LIHAT ADUAN</h5>
                            <p class="text-muted small">Melihat aduan yang telah terkirim</p>
                        </div>
        
                        <!-- FAQ -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-question-circle-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">FAQ</h5>
                            <p class="text-muted small">Tempat untuk mengetahui tata cara dalam penggunaan sistem dan berbagai
                                pertanyaan yang sering ditanyakan</p>
                        </div>
        
                        <!-- Statistik -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-graph-up-arrow text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">STATISTIK</h5>
                            <p class="text-muted small">Menampilkan statistik dari aduan</p>
                        </div>
        
                    </div>
                </div>
            </section>
        
            {{-- About lapor skuy --}}
            <section class="d-flex justify-content-center align-items-center my-5 py-5 text-center"
                style="background-color: #531DAB;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
        
                            <h2 class="fw-bold display-6 text-light">Tentang Lapor Skuy</h2>
                            <p class="text-light fs-5 mb-4 opacity-75">Sistem Informasi Aduan</p>
        
                            <p class="fs-6 text-light">
                                Merupakan sistem pengaduan untuk civitas akademik Universitas Amikom Yogyakarta.
                                Sehingga memudahkan untuk memberikan saran dan kritik membangun kepada Universitas
                                Amikom Yogyakarta. yang nantinya aduan akan ditangani oleh departemen terkait secara
                                cepat dan sesuai prosedur.
                            </p>
        
                        </div>
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
        
                        <!-- Kirim Aduan -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-send-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">TOTAL ADUAN</h5>
                            <p class="text-muted small">Jumlah semua aduan yang masuk</p>
                        </div>
        
                        <!-- Lihat Aduan -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">ADUAN DIPROSES</h5>
                            <p class="text-muted small">Jumlah aduan dalam status penanganan</p>
                        </div>
        
                        <!-- FAQ -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-question-circle-fill text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">ADUAN SELESAI</h5>
                            <p class="text-muted small">Jumlah aduan yang telah terselesaikan</p>
                        </div>
        
                        <!-- Statistik -->
                        <div class="col">
                            <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto"
                                style="width:100px; height:100px; background-color: #531DAB;">
                                <i class="bi bi-graph-up-arrow text-white fs-1"></i>
                            </div>
                            <h5 class="mt-3 fw-semibold text-black">TOTAL PENGADU</h5>
                            <p class="text-muted small">Jumlah pengguna yang telah mengadu</p>
                        </div>
        
                    </div>
                </div>

                <!-- Modal untuk login -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                        <p>Silakan login terlebih dahulu untuk membuat laporan.</p>
                        </div>
                        <div class="modal-footer">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
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
        @Lapor Skuy Universitas Amikom Yogyakarta
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