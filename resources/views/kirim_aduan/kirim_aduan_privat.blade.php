{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan Privat')

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

{{-- Form aduan --}}
@section('content')
    <section id="formLapor" class="container-lg my-5">
        <div class="alert text-center" role="alert" style="background-color: rgb(224, 224, 224);">
            Aduan privat bersifat rahasia dan hanya diakses oleh pihak berwenang dan akan dihubungi secara private apabila pengadu berkenan
        </div>
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Mari Buat Aduanmu!</h1>
        <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Aduan</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Aduan</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Lampiran (Opsional)</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <input type="hidden" id="type" name="type" value="privat">
            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
        </form>
    </section>
@endsection

{{-- Footer --}}
@section('footer')
    <footer class="bg-dark text-light text-center py-3 position-fixed-bottom w-100">
        <p class="mb-0">&copy; 2023 Lapor Skuy. All rights reserved.</p>
        <p class="mb-0">Developed by <a href="">Lapor Skuy Team</a></p>
    </footer>
@endsection
