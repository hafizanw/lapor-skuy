{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Dashboard')

@section('content')
    <section id="home">
        <div class="position-relative overflow-hidden vh-100">
            <!-- Background image -->
            <div class="position-absolute top-0 start-0 w-100 h-100 z-n1">
                <img src="images/background.jpg" alt="Background" class="w-100 h-100 object-fit-cover"
                    style="filter: brightness(0.5);" />
            </div>

            <!-- Content -->
            <div class="container d-flex flex-column align-items-center justify-content-center text-center vh-100">
                <img src="images/logo2.png" alt="Logo" class="mb-5" style="width: 250px; max-width: 80%;" />

                <h1 class="text-white fw-bold animate__animated animate__fadeInDown mt-5">
                    Halo, {{ Auth::user()->name }}
                </h1>
                <h2 class="text-white fw-normal mb-3 animate__animated animate__fadeInUp animate__delay-1s">
                    Welcome to <span class="fw-bold text-warning">Lapor Skuy</span>
                </h2>

                <a href="#formLapor" class="mt-3 animate__animated animate__fadeInUp animate__delay-2s">
                    <button type="button" class="btn btn-warning btn-lg fw-bold shadow-sm px-4 py-2 text-dark">
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
    </section>
@endsection

@section('footer')
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
@endsection
