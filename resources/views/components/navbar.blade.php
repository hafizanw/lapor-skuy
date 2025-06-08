@csrf
<nav class="navbar navbar-expand-lg absolut" style="background-color: #581c87">
    <div class="container d-flex">
        <div class="col-4 col-md-3 col-lg-2">
            <a href="#" class="navbar-brand">
                <img class="" src="images/Logo.png" alt="Logo" width="40%" height="40%"
                    class="d-inline-block align-text-top" />
            </a>
        </div>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/reports">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/panduan">Panduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/about">About</a>
                </li>
            </ul>
        </div>

        <div class="d-flex">
            <a class="nav-link text-white" href="/login">
                Login
            </a>
        </div>
    </div>
</nav>
