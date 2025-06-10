{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan')

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
                <h3 class="my-0 mx-2 text-light">Kirim Aduan</h3>
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

{{-- Form aduan --}}
@section('content')
    <div class="container">
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Pilih Jenis Aduan</h1>
        <p class="text-center mb-5">Tentukan jenis aduan sesuai dengan kebutuhan dan<br>tingkat kerahasiaan aduan yang ingin kamu sampaikan</p>
        <div class="card-options d-flex flex-column flex-md-row justify-content-md-center align-items-center align-items-md-stretch gap-3 mb-3">
            <a href="{{ url('/kirim-aduan-umum') }}" class="card text-decoration-none text-dark overflow-hidden">
            <img src="{{ asset('assets/Aduan_Umum.png') }}" alt="Logo Aduan Umum">
                <div class="card-content" style="background-color: #842FE3; color: white;">
                    <h3 class="text-center">Aduan Umum</h3><hr>
                    <p class="text-center">Aduan yang bersifat terbuka dan dapat dilihat oleh seluruh warga kampus. 
                       Biasanya terkait masalah fasilitas, layanan yang berdampak luas.</p>
                </div>
            </a>
            <a href="{{ url('/kirim-aduan-privat') }}" class="card text-decoration-none text-dark overflow-hidden">
            <img src="{{ asset('assets/Aduan_Privat.png') }}" alt="Logo Aduan Privat">
                <div class="card-content" style="background-color: #842FE3; color: white;">
                    <h3 class="text-center">Aduan Privat</h3><hr>
                    <p class="text-center">Aduan privat bersifat rahasia dan hanya diakses oleh pihak berwenang.
                       Umumnya digunakan untuk aduan sensitif seperti pelecehan atau konflik pribadi.</p>
                </div>
            </a>
        </div>
    </div>
@endsection

{{-- Footer --}}
@section('footer')
    <footer class="bg-dark text-light text-center py-3 position-fixed-bottom w-100">
        <p class="mb-0">&copy; 2023 Lapor Skuy. All rights reserved.</p>
        <p class="mb-0">Developed by <a href="">Lapor Skuy Team</a></p>
    </footer>
@endsection
