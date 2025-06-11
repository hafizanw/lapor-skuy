<x-layout>
    @auth

    

    <!-- Hero Section -->
    <section id="#">
        <div class="position-relative overflow-hidden vh-100">
            <div class="position-absolute w-100 z-n1">
                <img src="images/background.jpg" width="100%" height="auto" class="img-fluid object-fit-cover vh-100"
                    alt="background.jpg" />
            </div>

            <div class="container-lg d-flex flex-column align-items-center justify-content-center text-center vh-100">
                <img src="images/logo2.png" alt="Logo" width="50%" height="50%" class="mb-4 object-fit-scale" />
                <p class="h1 text-light mt-lg-5 fw-bold">Halo, <strong>{{ Auth::user()->name }}</p>
                <p class="h1 text-light mt-lg-5 fw-bold">Welcome to Lapor Skuy</p>
                <a href="#formLapor">
                    <button type="button" class="btn btn-light btn-outline-warning btn-lg mt-3 text-dark">Lapor
                        Yuk!</button>
                </a>
            </div>
        </div>
    </section>
    @endauth

</x-layout>
