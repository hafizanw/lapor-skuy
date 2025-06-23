<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .nav-mobile:hover {
          background-color: #e9ecef; /* abu hover */
          color: #000;
        }
      
        .nav-mobile.active {
          background-color: #6c757d; /* Bootstrap secondary */
          color: #fff;
        }
      
        .nav-mobile.active:hover {
          background-color: #5c636a; /* lebih gelap saat hover aktif */
        }
      </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark px-3" style="background: linear-gradient(to right, #531DAB, #842FE3);">
        <div class="container-fluid">
            <!-- Left -->
            <div class="">
                <img src="{{ asset('assets/logo.png') }}">
            </div>
    
            <!-- Hamburger Menu (Mobile Only) -->
            <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Desktop Menu (Hidden on Mobile) -->
            <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                        data-bs-target="#loginModal">KIRIM ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                        data-bs-target="#loginModal">LIHAT ADUAN</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold me-1" href="" data-bs-toggle="modal" 
                        data-bs-target="#loginModal">FAQ</a></li>
                </ul>
                <div class="d-flex align-items-center rounded-pill px-2 py-2 mx-2 shadow-md">
                    <a href="{{ route('home') }}" class="btn btn-light fw-semibold px-4 rounded-pill shadow-sm">
                        Home
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
                <h5 class="mx-2 fw-bold text-dark">Lapor Skuy</h5>
                <div class="mx-2" style="width: 50%; border-bottom: 2px solid rgb(194, 194, 194); margin: 10px 0;"></div>
              </div>
        
              <!-- Navigation -->
              <ul class="nav flex-column mb-4">
                <li class="nav-item">
                  <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                    <i data-feather="home" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Home
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                      <i data-feather="send" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Kirim Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                      <i data-feather="file-text" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> Lihat Aduan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-mobile text-dark d-flex align-items-center px-3 pb-3 rounded-2 mx-2 fw-medium" href="#">
                      <i data-feather="pocket" class="text-dark fs-3 me-2" style="scale: 0.9;"></i> FAQ
                    </a>
                  </li>
              </ul>
        
              <!-- Market List -->
              <div class="px-3">
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ route('home') }}" class="btn fw-semibold px-4 rounded-pill shadow-sm text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);">
                        Home
                    </a>
                </div>
              </div>
            </div>
          </div>
    </div>

    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="login-container p-4 shadow rounded">
                        <div class="form-box" id="login-form">
                            {{-- Logika untuk menampilkan pesan error yang berbeda --}}
                            @if ($errors->has('password_error'))
                                <div class="alert alert-warning mb-3">
                                    {{-- Menggunakan {!! !!} agar tag <a> bisa dirender sebagai HTML --}}
                                    {!! $errors->first('password_error') !!}
                                </div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger mb-3">
                                    {{ $errors->first('nim') ?: $errors->first() }}
                                </div>
                            @endif
                            {{-- PERBAIKAN: Menggunakan helper route() untuk action form --}}
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <h2 class="text-center mb-4">Login</h2>
                                <div class="mb-3">
                                    <input type="text" name="nim" class="form-control textbox"
                                        placeholder="NIM / NIDN" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control textbox"
                                        placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
                            </form>
                            <div class="text-center mt-3">
                                @csrf
                                <a href="{{ route('password.email') }}">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

  <script>
    feather.replace();
  </script>
</body>
</html>