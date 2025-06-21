<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Lapor Skuy')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .profileImg {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        .navbar-nav .nav-link {
            position: relative;
            padding-bottom: 5px;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 90%;
            height: 2px;
            background-color: transparent;
            transform: translateX(-50%);
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-link.active::after {
            background-color: #ffc400;
        }

        .nav-mobile:hover {
            background-color: #e9ecef;
            color: #000;
        }

        .nav-mobile.active {
            background-color: #e0d5f5;
        }
    </style>
</head>

<body>
    {{-- ========================================================= --}}
    {{-- ▼▼▼ BAGIAN NAVBAR UTAMA ▼▼▼ --}}
    {{-- ========================================================= --}}
    <nav class="navbar navbar-expand-md navbar-dark px-3"
        style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <!-- Logo Kiri -->
            <a class="navbar-brand" href="{{ Auth::check() ? route('dashboard') : url('/') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Lapor Skuy" style="height: 40px;">
            </a>

            <!-- Tombol Kembali & Judul Halaman (Hanya Mobile) -->
            @auth
                <div class="d-flex align-items-center d-md-none">
                    <a class="fw-bold text-light" href="{{ url()->previous() }}">
                        <i data-feather="chevron-left"></i>
                    </a>
                    {{-- Pastikan Anda mengirim $titlePage dari controller --}}
                    <h3 class="my-0 mx-2 text-light">{{ $titlePage ?? 'Lapor Skuy' }}</h3>
                </div>
            @endauth

            <!-- Tombol Hamburger (Hanya Mobile) -->
            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Desktop (Sembunyi di Mobile) -->
            <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
                @auth
                    {{-- TAMPILAN JIKA PENGGUNA SUDAH LOGIN --}}
                    <ul class="navbar-nav me-4">
                        <li class="nav-item"><a
                                class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} text-white fw-semibold me-1"
                                href="{{ route('dashboard') }}">HOME</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->is('kirim-aduan') ? 'active' : '' }} text-white fw-semibold me-1"
                                href="{{ route('kirim-aduan') }}">KIRIM ADUAN</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->is('aduan-umum*') ? 'active' : '' }} text-white fw-semibold me-1"
                                href="{{ route('aduan-umum.index') }}">LIHAT ADUAN</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->is('faq') ? 'active' : '' }} text-white fw-semibold me-1"
                                href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('user-profile') }}"
                            class="d-flex align-items-center text-decoration-none rounded px-3 py-1 me-3"
                            style="background-color: rgba(255, 255, 255, 0.1);">
                            <img src="{{ asset($profile_picture) }}" class="profileImg rounded-circle me-2" alt="User">
                            <div>
                                <small class="fw-bold text-light">{{ $username }}</small><br>
                                <small class="text-light" style="opacity: 0.8;">Mahasiswa</small>
                            </div>
                        </a>
                        {{-- Form Logout yang benar --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-pill fw-semibold px-4">Logout</button>
                        </form>
                    </div>
                @else
                    {{-- atau bisa juga @guest --}}
                    {{-- TAMPILAN JIKA PENGGUNA ADALAH TAMU (BELUM LOGIN) --}}
                    <ul class="navbar-nav me-3">
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="/">HOME</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">KIRIM ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">LIHAT ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-light fw-semibold px-4 rounded-pill shadow-sm">Login</a>
                @endguest
            </div>
        </div>
    </nav>
    {{-- ========================================================= --}}
    {{-- AKHIR BAGIAN NAVBAR UTAMA --}}
    {{-- ========================================================= --}}


    {{-- ========================================================= --}}
    {{-- ▼▼▼ BAGIAN SIDEBAR MOBILE (OFFCANVAS) ▼▼▼ --}}
    {{-- ========================================================= --}}
    <div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 75vw" tabindex="-1" id="offcanvasMenu"
        aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" id="offcanvasMenuLabel" style="color: #531DAB;">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            @auth
                {{-- TAMPILAN SIDEBAR JIKA PENGGUNA SUDAH LOGIN --}}
                <div>
                    <div class="px-3 py-2 d-flex align-items-center" style="background-color: #f8f9fa;">
                        <img src="{{ asset($profile_picture) }}" alt="User" class="profileImg rounded-circle me-2">
                        <div>
                            <small class="fw-bold">{{ $username }}</small><br>
                            <small class="text-muted">Mahasiswa</small>
                        </div>
                    </div>
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item"><a
                                class="nav-link nav-mobile {{ request()->is('dashboard') ? 'active' : '' }} text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('dashboard') }}"><i data-feather="home" class="me-3"></i> Home</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile {{ request()->is('kirim-aduan') ? 'active' : '' }} text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('kirim-aduan') }}"><i data-feather="send" class="me-3"></i> Kirim
                                Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile {{ request()->is('aduan-umum*') ? 'active' : '' }} text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('aduan-umum.index') }}"><i data-feather="file-text" class="me-3"></i>
                                Lihat Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile {{ request()->is('user-profile') ? 'active' : '' }} text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('user-profile') }}"><i data-feather="user" class="me-3"></i>
                                Profile</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile {{ request()->is('faq') ? 'active' : '' }} text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('faq') }}"><i data-feather="help-circle" class="me-3"></i> FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="p-3 border-top">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </div>
            @else
                {{-- atau @guest --}}
                {{-- TAMPILAN SIDEBAR JIKA PENGGUNA ADALAH TAMU --}}
                <div>
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="/"><i data-feather="home" class="me-3"></i> Home</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                    data-feather="send" class="me-3"></i> Kirim Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                    data-feather="file-text" class="me-3"></i> Lihat Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium"
                                href="{{ route('faq') }}"><i data-feather="help-circle" class="me-3"></i> FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="p-3 border-top">
                    <a href="{{ route('login') }}" class="btn fw-semibold px-4 rounded-pill shadow-sm text-light w-100"
                        style="background: linear-gradient(to right, #531fa7, #6826b4);">Login</a>
                </div>
            @endguest
        </div>
    </div>
    {{-- ========================================================= --}}
    {{-- AKHIR BAGIAN SIDEBAR MOBILE --}}
    {{-- ========================================================= --}}


    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

    {{-- Modal Login Diperlukan (jika diakses oleh tamu) --}}
    @guest
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda harus login terlebih dahulu untuk mengakses fitur ini.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endguest


    @stack('script')

    <script>
        feather.replace();
    </script>
</body>

</html>
