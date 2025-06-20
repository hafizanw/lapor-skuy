{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Detail Aduan')

{{-- Isi Konten --}}
@section('content')
    <div class="container py-4">

    <!-- Judul Aduan -->
    <h5 class="fw-bold mb-4">Saya mendapati AC ruang 5.3.2 tidak berfungsi</h5>

    <!-- Detail Aduan -->
    <div class="card mb-4">
        <div class="row g-0">
            <!-- Vote -->
            <div class="col-2 col-md-1 text-center py-3">
                <div class="text-primary fw-bold">4</div>
                <div><i class="bi bi-caret-up-fill text-purple fs-4"></i></div>
                <div><i class="bi bi-caret-down-fill text-purple fs-4"></i></div>
            </div>
            <!-- Isi Aduan -->
            <div class="col-10 col-md-11">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                        <div>
                            <h6 class="mb-0 fw-bold">
                                {{ $data->complaint_title }}
                            </h6>
                            <small class="text-muted">23-05-2025</small>
                        </div>
                    </div>
                    <p class="mt-2 mb-0">
                        {{ $data->complaint_content }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <h6 class="fw-bold mb-3">1 Komentar</h6>

    @foreach($datas as $data)
    <div class="card mb-4">
        <div class="card-body d-flex">
            <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="User">
            <div>
                <h6 class="mb-1 fw-bold">
                    {{ $data->name }}
                </h6>
                <small class="text-muted">
                    @datetime($data->complaint_created_at)
                </small>
                <p class="mb-0 mt-2">
                    {{ $data->complaint_content }}
                </p>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Tambah Komentar -->
    <h6 class="fw-bold">Tambah Komentar</h6>
    <form>
        <div class="mb-3">
            <textarea id="description" class="form-control" rows="4" placeholder="Tulis komentar"></textarea>
        </div>
        <button id="kirimData" type="" class="btn btn-primary px-4" name="{{ $data->complaint_complaint_id }}">
            Kirim
        </button>
    </form>

</div>
@endsection
