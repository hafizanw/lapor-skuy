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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
      .departemen-card {
        border-radius: 18px;
        box-shadow: 0 2px 12px 0 rgba(83,29,171,0.07);
        border: none;
        background: #fff;
        transition: transform 0.35s cubic-bezier(0.22,1,0.36,1), box-shadow 0.35s;
        overflow: hidden;
      }
      .departemen-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px 0 rgba(83,29,171,0.13);
      }
      .departemen-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #531DAB 60%, #842FE3 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        margin: 0 auto 1rem auto;
        box-shadow: 0 2px 8px 0 rgba(83,29,171,0.10);
        color: #fff;
        font-size: 2rem;
      }
      .departemen-card h5 {
        font-weight: 600;
        margin-top: 0.5rem;
        color: #531DAB;
      }
      .departemen-card p {
        color: #888;
        font-size: 0.98rem;
      }
    </style>
    <section id="home">
      <div class="position-relative overflow-hidden min-vh-100" style="background: linear-gradient(135deg, rgba(83,29,171,0.85) 60%, rgba(132,47,227,0.85) 100%), url('images/background.jpg') center center / cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100 z-n1" style="background: transparent;"></div>
        <!-- Content -->
        <div class="container py-5 position-relative" style="z-index:2;">
          <div class="text-center mb-5">
            <img src="images/logo2.png" alt="Logo" class="mb-4 animate__animated animate__fadeInDown" style="width: 180px; max-width: 80%;" />
            <h1 class="text-white fw-bold animate__animated animate__fadeInDown">Pilih Departemen</h1>
            <p class="text-white-50 mb-0 animate__animated animate__fadeIn animate__delay-0_2s">Lihat aduan berdasarkan departemen terkait</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            <!-- Card DAAK -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_2s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-person-badge"></i></div>
                  <h5>DAAK</h5>
                  <p>Akademik, administrasi, dan layanan mahasiswa</p>
                </div>
              </a>
            </div>
            <!-- Card Sarpras -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_3s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-building"></i></div>
                  <h5>Sarpras</h5>
                  <p>Sarana dan prasarana kampus</p>
                </div>
              </a>
            </div>
            <!-- Card Kemahasiswaan -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_4s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-people"></i></div>
                  <h5>Kemahasiswaan</h5>
                  <p>Kegiatan, organisasi, dan pengembangan mahasiswa</p>
                </div>
              </a>
            </div>
            <!-- Card Perpus -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_5s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-journal-bookmark"></i></div>
                  <h5>Perpus</h5>
                  <p>Perpustakaan dan layanan literasi</p>
                </div>
              </a>
            </div>
            <!-- Card Pengajaran -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_6s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-easel"></i></div>
                  <h5>Pengajaran</h5>
                  <p>Proses belajar mengajar dan dosen</p>
                </div>
              </a>
            </div>
            <!-- Card Keamanan -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_7s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-shield-lock"></i></div>
                  <h5>Keamanan</h5>
                  <p>Keamanan lingkungan kampus</p>
                </div>
              </a>
            </div>
            <!-- Card UPT Lab -->
            <div class="col animate__animated animate__fadeInUp animate__delay-0_8s">
              <a href="#" class="text-decoration-none">
                <div class="departemen-card h-100 text-center p-4">
                  <div class="departemen-icon mb-2"><i class="bi bi-cpu"></i></div>
                  <h5>UPT Lab</h5>
                  <p>Laboratorium dan fasilitas praktikum</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>

