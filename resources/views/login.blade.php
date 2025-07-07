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

        /* jquery shake login form */
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
      </style>
</head>
<body style="background-color: #f6f7ff">
  <main class="min-vh-100 d-flex justify-content-center align-items-center px-3">
    <div class="w-100" style="max-width: 420px;">
        <div class="bg-white rounded shadow p-4 p-md-5 text-center">
            
            {{-- Logo --}}
            <div class="mb-4">
              <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 48px;">
              </a>
            </div>

            {{-- Judul --}}
            <h3 class="fw-bold">Welcome to Lapor Skuy</h3>
            <p class="text-muted mb-4 small">Sistem Informasi Aduan Kampus</p>

            {{-- Error --}}
            @if ($errors->has('password_error'))
                <div class="alert alert-warning mb-3" id="alert-box">
                    {!! $errors->first('password_error') !!}
                </div>
            @elseif ($errors->any())
                <div class="alert alert-danger mb-3" id="alert-box">
                    {{ $errors->first('nim') ?: $errors->first() }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="text-start">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control textbox" placeholder="NIM" required autofocus>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control textbox" placeholder="Password" required>
              </div>

              <button type="submit" id="loginButton" class="btn w-100 text-white mb-3 btn-login position-relative"
              style="background: linear-gradient(to right, #531DAB, #842FE3);">
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="loginSpinner" role="status" aria-hidden="true"></span>
                  Login
              </button>
              
            </form>

            <div class="mb-3 small">
                <span class="text-muted">Klik untuk lupa password</span>
                <a href="{{ route('password.email') }}">Lupa Password</a>
            </div>

            <div class="mb-3 small">
              @csrf
              
            </div>

            <hr class="my-3">

            <p class="text-muted small mb-2">Masuk dengan google</p>
            <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
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
        // Fade in seluruh wrapper saat load
        $('.login-wrapper').hide().fadeIn(800);

        // Fade in form
        $('.login-container').hide().fadeIn(600);

        // Error alert slide
        $('#alert-box').hide().slideDown(400);

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

        // Shake jika error
        if ($('#alert-box').length) {
          setTimeout(function () {
            $('.login-container').addClass('shake');
          }, 400);
        }
      });
    </script>


  <script>
    feather.replace();
  </script>
</body>
</html>
