{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan Umum')

{{-- Form aduan --}}
@section('content')
    <section id="formLapor" class="container-lg my-5">
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Mari Buat Aduanmu!</h1>
        <form action="{{ route('kirim-aduan-umum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Aduan</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Deskripsi Aduan</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Lampiran (Opsional)</label>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
            </div>
            @auth
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            @endauth
            {{-- // 2 untuk publik --}}
            <input type="hidden" name="visibility_type" value="2"> 
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
