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

    </style>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
            <div class="container-fluid">
                <!-- Left -->
                <div class="d-none d-md-inline">
                    <img src="{{ asset('assets/logo.png') }}">
                </div>
                <div class="d-flex align-items-center d-md-none">
                    <a class="fw-bold text-light" href="{{ url()->previous() }}">
                    <i data-feather="chevron-left"></i>
                    </a>
                    <h3 class="my-0 mx-2 text-light">{{ $titlePage }}</h3>
                </div>
        
                <!-- Hamburger Menu (Mobile Only) -->
                <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Desktop Menu (Hidden on Mobile) -->
                <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
                    <ul class="navbar-nav me-4">
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} text-white fw-semibold me-1" href="{{ route('dashboard') }}">HOME</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('kirim-aduan') ? 'active' : '' }} text-white fw-semibold me-1" href="{{ route('kirim-aduan') }}">KIRIM ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1 {{ request()->is('aduan-umum') ? 'active' : '' }}" href="{{ route('aduan-umum') }}">LIHAT ADUAN</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                    <div class="d-flex align-items-center rounded px-3 py-1 mx-2" style="background: linear-gradient(to right, #6826b4, #6826b4);">
                        <a href="{{ route('user-profile') }}" class="d-flex align-items-center text-decoration-none text-dark">
                            <img src="{{ asset($profile_picture) }}" class=" profileImg rounded-circle me-1" alt="User">
                            <div class="ms-2">
                                <small class="fw-bold text-light">{{ $username }}</small><br>
                                <small class="text-light">Mahasiswa</small>
                            </div>
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
                    <h5 class="mx-2 fw-bold text-dark" style="color: #531DAB;">Lapor Skuy</h5>
                    <div class="mx-2" style="width: 50%; border-bottom: 2px solid rgb(194, 194, 194); margin: 10px 0;"></div>
                  </div>
            
                  <!-- Navigation -->
                  <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                      <a class="nav-link nav-mobile {{ request()->is('dashboard') ? 'active' : '' }} text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="{{ route('dashboard') }}">
                        <i data-feather="home" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Home
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-mobile {{ request()->is('kirim-aduan') ? 'active' : '' }} text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="{{ route('kirim-aduan') }}">
                          <i data-feather="send" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Kirim Aduan
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-mobile {{ request()->is('aduan-umum') ? 'active' : '' }} text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="{{ route('aduan-umum') }}">
                          <i data-feather="file-text" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Lihat Aduan
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                          <i data-feather="pocket" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> FAQ
                        </a>
                      </li>
                  </ul>
                </div>
            
                <!-- Profile & Logout -->
                <div class="border-top p-3 d-flex align-items-center bg-light">
                    <a href="{{ route('user-profile') }}" class="d-flex align-items-center text-decoration-none text-dark">
                        <img src="{{ asset($profile_picture) }}" 
                             alt="User" 
                             class="profileImg rounded-circle me-2" 
                             style="width: 40px; height: 40px; object-fit: cover;">
                        
                        <div class="flex-grow-1">
                            <small class="fw-bold">{{ $username }}</small><br>
                            <small class="text-muted">Mahasiswa</small>
                        </div>
                    </a>
                    <a href="#" class="text-dark fs-5 ms-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        <!-- @csrf -->
                    </form>
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