<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departemen Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <section id="home">
        <div class="position-relative overflow-hidden vh-100">
          <!-- Background image -->
          <div class="position-absolute top-0 start-0 w-100 h-100 z-n1">
            <img
              src="images/background.jpg"
              alt="Background"
              class="w-100 h-100 object-fit-cover"
              style="filter: brightness(0.5);"
            />
          </div>
      
          <!-- Content -->
          <div class="container d-flex flex-column align-items-center justify-content-center text-center vh-100">
            <img src="images/logo2.png" alt="Logo" class="mb-5" style="width: 250px; max-width: 80%;" />
      
            <h1 class="text-white fw-bold animate__animated animate__fadeInDown mt-5">
              Halo, Departemen ABC
            </h1>
            <h2 class="text-white fw-normal mb-3 animate__animated animate__fadeInUp animate__delay-1s">
              Welcome to <span class="fw-bold text-warning">Lapor Skuy</span>
            </h2>
      
            <a href="{{ route('departemen-list-aduan') }}" class="mt-3 animate__animated animate__fadeInUp animate__delay-2s">
              <button type="button" class="btn btn-lg fw-bold shadow-sm px-4 py-2 text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);">
                Daftar Aduan
              </button>
            </a>
          </div>
        </div>
      </section>
</body>
</html>

