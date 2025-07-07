<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark px-3"
        style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <a href="{{ Auth::check() ? route('dashboard') : '/' }}">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Lapor Skuy">
            </a>

            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">

                @guest
                    {{-- MENU UNTUK TAMU (BELUM LOGIN) --}}
                    <ul class="navbar-nav me-3">
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="/">HOME</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">KIRIM ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#"
                                data-bs-toggle="modal" data-bs-target="#loginModal">LIHAT ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('login') }}"
                            class="btn btn-light fw-semibold px-4 rounded-pill shadow-sm">Login</a>
                    </div>
                @endguest

                @auth
                    {{-- MENU UNTUK PENGGUNA YANG SUDAH LOGIN --}}
                    <ul class="navbar-nav me-3">
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('dashboard') }}">DASHBOARD</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('kirim-aduan') }}">KIRIM ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('aduan-anda') }}">LIHAT ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1"
                                href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('user-profile') }}" class="nav-link text-white fw-semibold me-3">
                            Halo, {{ Auth::user()->name }}
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn btn-light fw-semibold px-4 rounded-pill shadow-sm">Logout</button>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 50vw" tabindex="-1" id="offcanvasMenu"
        aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
            <div>
                <div class="d-flex flex-column align-items-start px-3 py-4">
                    <h5 class="mx-2 fw-bold text-dark">Lapor Skuy</h5>
                    <div class="mx-2"
                        style="width: 50%; border-bottom: 2px solid rgb(194, 194, 194); margin: 10px 0;"></div>
                </div>

                @guest
                    {{-- MENU MOBILE UNTUK TAMU --}}
                    <ul class="nav flex-column mb-4">
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="/"><i data-feather="home" class="me-2"></i> Home</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i data-feather="send"
                                    class="me-2"></i> Kirim Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                    data-feather="file-text" class="me-2"></i> Lihat Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="{{ route('faq') }}"><i data-feather="help-circle" class="me-2"></i> FAQ</a></li>
                    </ul>
                    <div class="px-3">
                        <a href="{{ route('login') }}" class="btn fw-semibold px-4 rounded-pill shadow-sm text-light"
                            style="background: linear-gradient(to right, #531fa7, #6826b4);">Login</a>
                    </div>
                @endguest

                @auth
                    {{-- MENU MOBILE UNTUK PENGGUNA LOGIN --}}
                    <ul class="nav flex-column mb-4">
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="{{ route('dashboard') }}"><i data-feather="airplay" class="me-2"></i>
                                Dashboard</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="{{ route('kirim-aduan') }}"><i data-feather="send" class="me-2"></i> Kirim
                                Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="{{ route('aduan-anda') }}"><i data-feather="file-text" class="me-2"></i> Lihat
                                Aduan</a></li>
                        <li class="nav-item"><a
                                class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium"
                                href="{{ route('user-profile') }}"><i data-feather="user" class="me-2"></i>
                                Profile</a></li>
                    </ul>
                    <div class="px-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn fw-semibold px-4 rounded-pill shadow-sm text-light"
                                style="background: linear-gradient(to right, #c13d3d, #b42626);">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

    @stack('script')

    <script>
        feather.replace();
    </script>
</body>

</html>
