<x-layout>
    @auth
    <!-- Hero Section -->
    <section id="#">
        <div class="position-relative overflow-hidden vh-100">
            <div class="position-absolute w-100 z-n1">
                <img src="images/background.jpg" width="100%" height="auto" class="img-fluid object-fit-cover vh-100"
                    alt="background.jpg" />
            </div>

            <div class="container-lg d-flex flex-column align-items-center justify-content-center text-center vh-100">
                <img src="images/logo2.png" alt="Logo" width="50%" height="50%" class="mb-4 object-fit-scale" />
                <p class="h1 text-light mt-lg-5 fw-bold">Halo, <strong>{{ Auth::user()->name }}</p>
                <p class="h1 text-light mt-lg-5 fw-bold">Welcome to Lapor Skuy</p>
                <a href="#formLapor">
                    <button type="button" class="btn btn-light btn-outline-warning btn-lg mt-3 text-dark">Lapor
                        Yuk!</button>
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
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-send-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">KIRIM ADUAN</h5>
          <p class="text-muted small">Tempat untuk mengirim aduan umum atau aduan privat</p>
        </div>
    
        <!-- Lihat Aduan -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">LIHAT ADUAN</h5>
          <p class="text-muted small">Melihat aduan yang telah terkirim</p>
        </div>
    
        <!-- FAQ -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-question-circle-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">FAQ</h5>
          <p class="text-muted small">Tempat untuk mengetahui tata cara dalam penggunaan sistem dan berbagai pertanyaan yang sering ditanyakan</p>
        </div>
    
        <!-- Statistik -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-graph-up-arrow text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">STATISTIK</h5>
          <p class="text-muted small">Menampilkan statistik dari aduan</p>
        </div>
    
      </div>
    </div>
  </section>

  {{-- About lapor skuy --}}
  <section class="d-flex justify-content-center align-items-center my-5 py-5 text-center" style="background-color: #531DAB;">
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
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-send-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">TOTAL ADUAN</h5>
          <p class="text-muted small">Jumlah semua aduan yang masuk</p>
        </div>
    
        <!-- Lihat Aduan -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">ADUAN DIPROSES</h5>
          <p class="text-muted small">Jumlah aduan dalam status penanganan</p>
        </div>
    
        <!-- FAQ -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-question-circle-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">ADUAN SELESAI</h5>
          <p class="text-muted small">Jumlah aduan yang telah terselesaikan</p>
        </div>
    
        <!-- Statistik -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-graph-up-arrow text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">TOTAL PENGADU</h5>
          <p class="text-muted small">Jumlah pengguna yang telah mengadu</p>
        </div>
    
      </div>
    </div>
  </section>
  @else
    <!-- Hero Section -->
    <section id="#">
        <div class="position-relative overflow-hidden vh-100">
            <div class="position-absolute w-100 z-n1">
                <img src="images/background.jpg" width="100%" height="auto" class="img-fluid object-fit-cover vh-100"
                    alt="background.jpg" />
            </div>

            <div class="container-lg d-flex flex-column align-items-center justify-content-center text-center vh-100">
                <img src="images/logo2.png" alt="Logo" width="50%" height="50%" class="mb-4 object-fit-scale" />
                <p class="h1 text-light mt-lg-5 fw-bold">Welcome to Lapor Skuy</p>
                <a href="#formLapor">
                    <button type="button" class="btn btn-light btn-outline-warning btn-lg mt-3 text-dark">Lapor
                        Yuk!</button>
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
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-send-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">KIRIM ADUAN</h5>
          <p class="text-muted small">Tempat untuk mengirim aduan umum atau aduan privat</p>
        </div>
    
        <!-- Lihat Aduan -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">LIHAT ADUAN</h5>
          <p class="text-muted small">Melihat aduan yang telah terkirim</p>
        </div>
    
        <!-- FAQ -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-question-circle-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">FAQ</h5>
          <p class="text-muted small">Tempat untuk mengetahui tata cara dalam penggunaan sistem dan berbagai pertanyaan yang sering ditanyakan</p>
        </div>
    
        <!-- Statistik -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-graph-up-arrow text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">STATISTIK</h5>
          <p class="text-muted small">Menampilkan statistik dari aduan</p>
        </div>
    
      </div>
    </div>
  </section>

  {{-- About lapor skuy --}}
  <section class="d-flex justify-content-center align-items-center my-5 py-5 text-center" style="background-color: #531DAB;">
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
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-send-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">TOTAL ADUAN</h5>
          <p class="text-muted small">Jumlah semua aduan yang masuk</p>
        </div>
    
        <!-- Lihat Aduan -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">ADUAN DIPROSES</h5>
          <p class="text-muted small">Jumlah aduan dalam status penanganan</p>
        </div>
    
        <!-- FAQ -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-question-circle-fill text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">ADUAN SELESAI</h5>
          <p class="text-muted small">Jumlah aduan yang telah terselesaikan</p>
        </div>
    
        <!-- Statistik -->
        <div class="col">
          <div class="bg-opacity-100 rounded-4 d-flex justify-content-center align-items-center mx-auto" style="width:100px; height:100px; background-color: #531DAB;">
            <i class="bi bi-graph-up-arrow text-white fs-1"></i>
          </div>
          <h5 class="mt-3 fw-semibold text-black">TOTAL PENGADU</h5>
          <p class="text-muted small">Jumlah pengguna yang telah mengadu</p>
        </div>
    
      </div>
    </div>
  </section>
    @endauth

</x-layout>
