{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan Privat')

{{-- Form aduan --}}
@section('content')
    <section id="formLapor" class="container-lg my-5">
        <div class="alert text-center" role="alert" style="background-color: rgb(224, 224, 224);">
            Aduan privat bersifat rahasia dan hanya diakses oleh pihak berwenang dan akan dihubungi secara private apabila pengadu berkenan
        </div>
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Mari Buat Aduanmu!</h1>
        <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Aduan</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Aduan</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Lampiran (Opsional)</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <input type="hidden" id="type" name="type" value="privat">
            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
        </form>
    </section>
@endsection

{{-- Footer --}}
@section('footer')
    <footer class="bg-dark text-light text-center py-3 position-fixed-bottom w-100">
        <p class="mb-0">&copy; 2023 Lapor Skuy. All rights reserved.</p>
        <p class="mb-0">Developed by <a href="">Lapor Skuy Team</a></p>
    </footer>
@endsection
