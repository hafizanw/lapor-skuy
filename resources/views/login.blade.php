<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Lapor Skuy</title>
    <meta name="description" content="Sistem Informasi Aduan Kampus Amikom" />
    <meta name="keywords" content="laporskuy, amikom, aduan kampus" />
    <meta name="author" content="Laporskuy" />

    <meta property="og:title" content="Lapor Skuy" />
    <meta property="og:description" content="Sistem Informasi Aduan Kampus Amikom" />
    <meta property="og:image" content="/images/logo.png" />
    <link rel="icon" href="/images/logo.png" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        /* Animasi shake untuk error */
        @keyframes shake {
          0% { transform: translateX(0); }
          25% { transform: translateX(-5px); }
          50% { transform: translateX(5px); }
          75% { transform: translateX(-5px); }
          100% { transform: translateX(0); }
        }
        .shake {
          animation: shake 0.4s ease-in-out;
        }
        /* Animasi fadeInUp untuk wrapper */
        .animate__fadeInUp {
          --animate-duration: 0.8s;
        }
        /* Responsive padding */
        @media (max-width: 575.98px) {
          .login-container {
            padding: 1.5rem 0.7rem !important;
          }
        }
        body {
          background-color: #f6f7ff;
        }
        .login-container {
          background: #fff;
          border-radius: 18px;
          box-shadow: 0 4px 32px 0 rgba(83,29,171,0.13);
          padding: 2.5rem 2rem;
          margin: 0 auto;
        }
        .btn-login {
          transition: box-shadow 0.3s, transform 0.2s;
        }
        .btn-login:active {
          transform: scale(0.97);
        }
        .form-control:focus {
          box-shadow: 0 0 0 0.2rem rgba(132, 47, 227, 0.18);
          border-color: #842FE3;
        }
        .alert {
          border-radius: 10px;
        }
        .login-logo {
          width: 56px;
          margin-bottom: 1rem;
        }
      </style>
</head>
<body style="background-color: #f6f7ff">
  <main class="min-vh-100 d-flex justify-content-center align-items-center px-3 animate__animated animate__fadeInUp animate__faster">
    <div class="w-100" style="max-width: 420px;">
        <div class="login-container text-center animate__animated animate__fadeInUp animate__delay-1s">
            {{-- Logo --}}
            <div class="mb-4 animate__animated animate__fadeInDown animate__delay-1s">
              <a href="{{ route('home') }}">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="login-logo">
              </a>
            </div>
            {{-- Judul --}}
            <h3 class="fw-bold animate__animated animate__fadeInDown animate__delay-1s">Welcome to Lapor Skuy</h3>
            <p class="text-muted mb-4 small animate__animated animate__fadeIn animate__delay-2s">Sistem Informasi Aduan Kampus</p>
            {{-- Error --}}
            @if ($errors->has('password_error'))
                <div class="alert alert-warning mb-3 animate__animated animate__shakeX animate__faster" id="alert-box">
                    {!! $errors->first('password_error') !!}
                </div>
            @elseif ($errors->any())
                <div class="alert alert-danger mb-3 animate__animated animate__shakeX animate__faster" id="alert-box">
                    {{ $errors->first('nim') ?: $errors->first() }}
                </div>
            @endif
            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="text-start animate__animated animate__fadeIn animate__delay-2s">
                @csrf
                <div class="mb-3">
                    <label for="identifier" class="form-label">NIM</label>
                    <input type="text" name="identifier" class="form-control textbox" placeholder="NIM" required autofocus>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control textbox" placeholder="Password" required>
              </div>
              <button type="submit" id="loginButton" class="btn w-100 text-white mb-3 btn-login position-relative animate__animated animate__pulse animate__delay-3s"
              style="background: linear-gradient(to right, #531DAB, #842FE3);">
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="loginSpinner" role="status" aria-hidden="true"></span>
                  Login
              </button>
            </form>
            <div class="mb-3 small animate__animated animate__fadeIn animate__delay-3s">
                <span class="text-muted">Klik untuk lupa password</span>
                <a href="{{ route('password.email') }}">Lupa Password</a>
            </div>
            <hr class="my-3 animate__animated animate__fadeIn animate__delay-4s">
            <p class="text-muted small mb-2 animate__animated animate__fadeIn animate__delay-4s">Masuk dengan google</p>
            <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 animate__animated animate__fadeIn animate__delay-4s">
                <img src="https://img.icons8.com/color/16/000000/google-logo.png" />
                Google account
            </a>
        </div>
    </div>
</main>

    {{-- Script jquery login form--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        // Input glow
        $('.textbox').focus(function () {
          $(this).css('box-shadow', '0 0 0 0.2rem rgba(132, 47, 227, 0.25)');
        }).blur(function () {
          $(this).css('box-shadow', 'none');
        });
        // Tombol efek
        $('.btn-login').hover(
          function () {
            $(this).css('box-shadow', '0 0 10px rgba(132, 47, 227, 0.5)');
          },
          function () {
            $(this).css('box-shadow', 'none');
          }
        ).on('mousedown', function () {
          $(this).css('transform', 'scale(0.97)');
        }).on('mouseup mouseleave', function () {
          $(this).css('transform', 'scale(1)');
        });
        // Spinner on submit
        $('form').on('submit', function () {
          $('#loginSpinner').removeClass('d-none');
          $('#loginButton').prop('disabled', true);
        });
      });
    </script>

  <script>
    feather.replace();
  </script>
</body>
</html>
