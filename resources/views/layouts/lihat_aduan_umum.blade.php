{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Lihat Aduan')

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
                <h3 class="my-0 mx-2 text-light">Lihat Aduan</h3>
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

        <!-- Tab -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#">Aduan Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/aduan-anda') }}">Aduan Anda</a>
            </li>
        </ul>

        <!-- Search dan Sorting -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
            <input type="text" class="form-control w-100 w-md-50" placeholder="Search...">
            <div class="btn-group">
                <button class="btn btn-outline-primary btn-sm">Terbaru</button>
                <button class="btn btn-primary btn-sm">Teratas</button>
            </div>
        </div>

        <h5 class="fw-bold">Aduan Umum</h5>

        <!-- Aduan Cards -->
        @for ($i = 0; $i < 5; $i++)
            <div class="card mb-3">
                <div class="row g-0 align-items-center">
                    <div class="col-2 col-md-1 text-center py-3">
                        <div>
                            <i data-feather="chevrons-up" class="text-primary"></i>
                        </div>
                        <div class="text-black fw-bold">4</div>
                        <div>
                            <i data-feather="chevrons-down" class="text-primary"></i>
                        </div>
                    </div>
                    <div class="col-10 col-md-11">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                <h6 class="mb-0 fw-bold">Saya mendapati AC ruang 5.3.2 tidak berfungsi</h6>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                <small class="text-muted">23-05-2025</small>
                                <span class="badge bg-primary">on progress</span>
                                <span class="badge bg-warning text-dark">sarpras</span>
                                <small><i class="bi bi-chat-left-text"></i> 3</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
