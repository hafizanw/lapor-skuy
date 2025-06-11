{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan')

{{-- Form aduan --}}
@section('content')
    <div class="container">
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Pilih Jenis Aduan</h1>
        <p class="text-center mb-5">Tentukan jenis aduan sesuai dengan kebutuhan dan<br>tingkat kerahasiaan aduan yang ingin kamu sampaikan</p>
        <div class="card-options d-flex flex-column flex-md-row justify-content-md-center align-items-center align-items-md-stretch gap-3 mb-3">
            <a href="{{ url('/kirim-aduan-umum') }}" class="card text-decoration-none text-dark overflow-hidden">
            <img src="{{ asset('assets/Aduan_Umum.png') }}" alt="Logo Aduan Umum">
                <div class="card-content" style="background-color: #842FE3; color: white;">
                    <h3 class="text-center">Aduan Umum</h3><hr>
                    <p class="text-center">Aduan yang bersifat terbuka dan dapat dilihat oleh seluruh warga kampus. 
                       Biasanya terkait masalah fasilitas, layanan yang berdampak luas.</p>
                </div>
            </a>
            <a href="{{ url('/kirim-aduan-privat') }}" class="card text-decoration-none text-dark overflow-hidden">
            <img src="{{ asset('assets/Aduan_Privat.png') }}" alt="Logo Aduan Privat">
                <div class="card-content" style="background-color: #842FE3; color: white;">
                    <h3 class="text-center">Aduan Privat</h3><hr>
                    <p class="text-center">Aduan privat bersifat rahasia dan hanya diakses oleh pihak berwenang.
                       Umumnya digunakan untuk aduan sensitif seperti pelecehan atau konflik pribadi.</p>
                </div>
            </a>
        </div>
    </div>
@endsection

{{-- Footer --}}
@section('footer')
    <footer class="bg-dark text-light text-center py-3 position-fixed-bottom w-100">
        <p class="mb-0">&copy; 2023 Lapor Skuy. All rights reserved.</p>
        <p class="mb-0">Developed by <a href="">Lapor Skuy Team</a></p>
    </footer>
@endsection
