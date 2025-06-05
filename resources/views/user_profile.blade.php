@extends('layout.app')

@section('title', 'User Profile')

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
            <h3 class="my-0 mx-2 text-light">Profile</h3>
        </div>

        <!-- Hamburger Menu (Mobile Only) -->
        <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
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
<div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 50vw" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
        <div>
            <ul class="nav flex-column text-end">
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">HOME</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">KIRIM ADUAN</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="{{ url('/aduan-umum') }}">LIHAT ADUAN</a></li>
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

@section('content')
    <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <!-- Foto Profil -->
            <div class="text-center mb-4 position-relative">
                <img src="{{ asset('assets/logo.png') }}" alt="Foto Profil" class="rounded-circle border border-2 border-secondary-subtle" width="120" height="120">
            </div>

            <!-- Info User -->
            <table class="table table-borderless">
                <tr>
                    <th scope="row" style="width: 30%;">Nama</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">Yuafiq Alfin</div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">yuafiq@students.amikom.ac.id</div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Role</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">Mahasiswa</div>
                    </td>
                </tr>
            </table>

              <!-- Button -->
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 fw-bold" type="submit">
                    Edit Profil
                </button>
            </div>

              <!-- Button -->
            <div class="text-center mt-4">
                <button class="btn btn-danger px-4 fw-bold" type="submit">
                    Logout
                </button>
            </div>
        </div>
    </div>
</div>
@endsection