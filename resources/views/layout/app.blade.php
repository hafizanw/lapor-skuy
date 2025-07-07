<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        html, body {
            width: 100vw;
            min-width: 0;
            max-width: 100vw;
            overflow-x: hidden !important;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }

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

        /* Sidebar mobile only custom style */
        .custom-offcanvas {
            background: #fff;
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
            box-shadow: -2px 0 24px 0 rgba(83,29,171,0.08);
            overflow: hidden;
            animation: sidebarFadeIn 0.5s cubic-bezier(0.4,0,0.2,1);
            z-index: 99999 !important;
        }
        @keyframes sidebarFadeIn {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .sidebar-link {
            color: #531DAB !important;
            background: #f6f7ff;
            margin-bottom: 6px;
            transition: background 0.25s, color 0.25s, box-shadow 0.25s;
        }
        .sidebar-link.active, .sidebar-link:hover {
            background: linear-gradient(to right, #6826b4, #842FE3);
            color: #fff !important;
            box-shadow: 0 2px 8px 0 rgba(83,29,171,0.08);
        }
        .sidebar-icon {
            color: inherit !important;
            transition: color 0.25s;
        }
        .sidebar-link.active .sidebar-icon, .sidebar-link:hover .sidebar-icon {
            color: #fff !important;
        }
        .sidebar-profile-top {
            border-bottom: 1px solid #e0e0e0 !important;
            background: #fafaff !important;
        }
        .sidebar-logout-bottom {
            border-top: 1px solid #e0e0e0 !important;
            background: #fafaff !important;
        }
    </style>
</head>
<body style="background-color: #f6f7ff; margin-top: 50px;">
        <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
            <div class="container-fluid">
                <!-- Left -->
                <div class="{{ $displayLogo }}">
                    <img src="{{ asset('assets/logo.png') }}">
                </div>
                <div class="d-flex align-items-center d-md-none">
                    <a class="fw-bold text-light text-decoration-none" href="{{ url()->previous() }}">
                        <h3 class="my-0 mx-2 text-light">{{ $titlePage }}</h3>
                    </a>
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
        <div class="offcanvas offcanvas-end d-md-none text-bg-light custom-offcanvas" style="width: 50vw;" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-body d-flex flex-column p-0">
  
                <!-- Profile (top) -->
                <div class="sidebar-profile-top p-3 d-flex align-items-center bg-light">
                    <a href="{{ route('user-profile') }}" class="d-flex align-items-center text-decoration-none text-dark flex-grow-1">
                        <img src="{{ asset($profile_picture) }}" 
                             alt="User" 
                             class="profileImg rounded-circle me-2" 
                             style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <small class="fw-bold">{{ $username }}</small><br>
                            <small class="text-muted">Mahasiswa</small>
                        </div>
                    </a>
                </div>

                <!-- Navigation (langsung di bawah profile, no flex-grow) -->
                <ul class="nav flex-column mb-4 mt-2">
                    <li class="nav-item">
                      <a class="nav-link nav-mobile {{ request()->is('dashboard') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('dashboard') }}">
                        <i data-feather="home" class="fs-4 me-2 sidebar-icon"></i> Home
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-mobile {{ request()->is('kirim-aduan') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('kirim-aduan') }}">
                          <i data-feather="send" class="fs-4 me-2 sidebar-icon"></i> Kirim Aduan
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-mobile {{ request()->is('aduan-umum') ? 'active' : '' }} d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('aduan-umum') }}">
                          <i data-feather="file-text" class="fs-4 me-2 sidebar-icon"></i> Lihat Aduan
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-mobile d-flex align-items-center px-3 py-2 rounded-2 mx-2 fw-medium sidebar-link" href="{{ route('faq') }}">
                          <i data-feather="pocket" class="fs-4 me-2 sidebar-icon"></i> FAQ
                        </a>
                      </li>
                  </ul>

                <!-- Logout Button (bottom) -->
                <div class="sidebar-logout-bottom p-3 bg-light border-top w-100 mt-auto">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-100">
                        @csrf
                        <button class="btn btn-danger w-100 fw-bold py-2" type="submit" title="Logout">
                            <i data-feather="log-out" class="me-2"></i> Logout
                        </button>
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

    <script>
      feather.replace();
      // Animate sidebar icons on open
      const offcanvasMenu = document.getElementById('offcanvasMenu');
      if (offcanvasMenu) {
        offcanvasMenu.addEventListener('shown.bs.offcanvas', function () {
          feather.replace();
        });
      }

      // Navbar hide on scroll down, show on scroll up (always, not just at top)
      document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('nav.navbar');
        if (!navbar) return;
        navbar.style.transition = 'transform 0.45s cubic-bezier(0.4,0,0.2,1), opacity 0.35s cubic-bezier(0.4,0,0.2,1)';
        navbar.style.willChange = 'transform, opacity';
        navbar.style.position = 'fixed';
        navbar.style.top = '0';
        navbar.style.left = '0';
        navbar.style.width = '100%';
        navbar.style.zIndex = 1030;
        let lastScrollTop = window.scrollY;
        let lastDirection = null;
        let ticking = false;
        let navbarHeight = navbar.offsetHeight;
        window.addEventListener('scroll', function() {
          if (!ticking) {
            window.requestAnimationFrame(function() {
              let st = window.scrollY;
              if (st > lastScrollTop) {
                // Scroll down anywhere
                if (lastDirection !== 'down') {
                  navbar.style.transform = `translateY(-${navbarHeight + 20}px)`;
                  navbar.style.opacity = '0.2';
                  lastDirection = 'down';
                }
              } else if (st < lastScrollTop) {
                // Scroll up anywhere
                if (lastDirection !== 'up') {
                  navbar.style.transform = 'translateY(0)';
                  navbar.style.opacity = '1';
                  lastDirection = 'up';
                }
              }
              lastScrollTop = st <= 0 ? 0 : st;
              ticking = false;
            });
            ticking = true;
          }
        });
        window.addEventListener('resize', function() {
          navbarHeight = navbar.offsetHeight;
        });
        navbar.style.transform = 'translateY(0)';
        navbar.style.opacity = '1';
      });
    </script>
    @stack('script')
</body>
</html>