{{-- Navbar Components --}}
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
            <h3 class="my-0 mx-2 text-light">Home</h3>
        </div>

        <!-- Hamburger Menu (Mobile Only) -->
        <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Desktop Menu (Hidden on Mobile) -->
        <div class="collapse navbar-collapse justify-content-end d-none d-md-flex">
            <ul class="navbar-nav me-3">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">HOME</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/kirim-aduan') }}">KIRIM ADUAN</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/aduan-umum') }}">LIHAT ADUAN</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">FAQ</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- Side bar (Mobile Only) --}}
<div class="offcanvas offcanvas-end d-md-none text-bg-light" style="width: 50vw" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
        <div>
            <ul class="nav flex-column text-end">
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="{{ url('/') }}">HOME</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="{{ url('/kirim-aduan') }}">KIRIM ADUAN</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="{{ url('/aduan-umum') }}">LIHAT ADUAN</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">FAQ</a></li>
                <li class="nav-item border-bottom"><a class="nav-link py-3" href="#">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>