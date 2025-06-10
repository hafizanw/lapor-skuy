{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Detail Aduan')

{{-- Navbar --}}
@section('navbar')
    <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <!-- Left -->
            <div class="d-none d-md-inline">
                <img src="{{ asset('assets/logo.png') }}">
            </div>
            <div class="d-flex align-items-center d-md-none">
                <a class="fw-bold text-light" href="">
                    <i data-feather="chevron-left"></i>
                </a>
                <h3 class="my-0 mx-2 text-light">Detail Aduan</h3>
            </div>

            <!-- Hamburger Menu (Mobile Only) -->
            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Menu (Hidden on Mobile) -->
            <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link text-white" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">KIRIM ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/aduan-umum') }}">LIHAT ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">FAQ</a></li>
                </ul>
                <div class="d-flex align-items-center bg-light rounded px-2 py-1">
                    <img src="https://via.placeholder.com/35" class="rounded-circle me-2" alt="User">
                    <div class="ms-2">
                        <small class="fw-bold">Naufal Latif</small><br>
                        <small class="text-muted">Mahasiswa</small>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar (Mobile Only) -->
    <div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 50vw" tabindex="-1" id="offcanvasMenu"
        aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            <div>
                <ul class="nav flex-column text-end">
                    <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">HOME</a></li>
                    <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">KIRIM ADUAN</a></li>
                    <li class="nav-item border-bottom"><a class="nav-link py-3" href="{{ url('/aduan-umum') }}">LIHAT
                            ADUAN</a></li>
                    <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">FAQ</a></li>
                </ul>
            </div>
            <!-- User Info -->
            <div class="border-top p-2 d-flex align-items-center bg-light">
                <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle me-2">
                <div class="flex-grow-1">
                    <small class="fw-bold">Naufal Latif</small><br>
                    <small class="text-muted">Mahasiswa</small>
                </div>
                <a href="#" class="text-dark fs-5">
                    <i data-feather="log-out"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

{{-- Isi Konten --}}
@section('content')
    <div class="container py-4">

        <!-- Judul Aduan -->
        <h5 class="fw-bold mb-4">Saya mendapati AC ruang 5.3.2 tidak berfungsi</h5>

        <!-- Detail Aduan -->
        <div class="card mb-4">
            <div class="row g-0">
                <!-- Vote -->
                <div class="col-2 col-md-1 text-center py-3">
                    <div class="text-primary fw-bold">4</div>
                    <div><i class="bi bi-caret-up-fill text-purple fs-4"></i></div>
                    <div><i class="bi bi-caret-down-fill text-purple fs-4"></i></div>
                </div>
                <!-- Isi Aduan -->
                <div class="col-10 col-md-11">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                            <div>
                                <h6 class="mb-0 fw-bold">Naufal Latif</h6>
                                <small class="text-muted">23-05-2025</small>
                            </div>
                        </div>
                        <p class="mt-2 mb-0">
                            Saya mendapati AC di ruang 5.3.2 tidak berfungsi saat digunakan dalam kegiatan perkuliahan.
                            Kondisi ruangan menjadi panas dan tidak nyaman, sehingga mengganggu konsentrasi mahasiswa dan
                            dosen selama Proses belajar mengajar.
                            Saya berharap kerusakan ini dapat segera ditindaklanjuti agar aktivitas di ruang tersebut
                            kembali berjalan dengan optimal.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Komentar -->
        <h6 class="fw-bold mb-3">1 Komentar</h6>
        <div class="card mb-4">
            <div class="card-body d-flex">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="User">
                <div>
                    <h6 class="mb-1 fw-bold">Hafiz Anwar</h6>
                    <small class="text-muted">23-05-2025</small>
                    <p class="mb-0 mt-2">
                        Saya sangat mendukung laporan ini karena saya juga mendapati AC di ruang 5.3.2 tidak terlalu dingin
                    </p>
                </div>
            </div>
        </div>

        <!-- Tambah Komentar -->
        <h6 class="fw-bold">Tambah Komentar</h6>
        <form>
            <div class="mb-3">
                <textarea class="form-control" rows="4" placeholder="Tulis komentar"></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Kirim</button>
        </form>

    </div>
@endsection
