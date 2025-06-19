{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Detail Aduan')

{{-- Isi Konten --}}
@section('content')
<div class="container my-4">
    <!-- Judul Aduan -->
    <h4 class="fw-bold mb-4">{{ $data->complaint_title }}</h4>

    <!-- Detail Aduan -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="row g-0">
            <!-- Kolom Voting -->
          <div class="col-auto text-center px-3 py-4 border-end">
            <i data-feather="chevrons-up" class="text-warning cursor-pointer mb-1"></i>
            <div class="fw-bold">4</div>
            <i data-feather="chevrons-down" class="text-warning cursor-pointer mt-1"></i>
          </div>

            <!-- Konten Aduan -->
            <div class="col-10 col-md-11">
                <div class="card-body">
                    <!-- Profil & Tanggal -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $data->profile_picture 
                                    ? asset('profile_uploads/' . $data->profile_picture) 
                                    : asset('profile_uploads/profile_default.png') }}"
                             class="rounded-circle me-2 border"
                             width="40" height="40"
                             alt="User">
                        <div>
                            <strong class="d-block">{{ $data->name ?? 'User' }}</strong>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}</small>
                        </div>
                    </div>

                    <!-- Isi Aduan -->
                    <p class="mb-2">{{ $data->complaint_content }}</p>

                    <!-- Gambar Aduan (jika ada) -->
                    {{-- @if (!empty($data->complaint_image)) --}}
                    <div class="my-3">
                        <img src="{{ asset('images/background.jpg') }}"
                            class="img-fluid rounded border"
                            alt="Foto aduan">
                    </div>
                    {{-- @endif --}}

                    <!-- Info tambahan -->
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge bg-primary">{{ $data->proses ?? 'Diproses' }}</span>
                        <span class="badge bg-warning text-dark">{{ $data->kategori ?? 'Umum' }}</span>
                        <small class="text-muted">
                            <i class="bi bi-chat-left-text me-1"></i>2 komentar
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <h6 class="fw-semibold mb-3">2 Komentar</h6>
    @foreach ($datas as $data)
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-body d-flex">
                <img src="{{ $data->profile_picture 
                            ? asset('profile_uploads/' . $data->profile_picture) 
                            : asset('profile_uploads/profile_default.png') }}"
                     alt="User" class="rounded-circle me-3 border" width="40" height="40">
                <div>
                    <strong class="mb-0">{{ $data->name }}</strong><br>
                    <small class="text-muted">23/11/3333</small>
                    <p class="mb-0 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, tenetur.</p>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Tambah Komentar -->
    <h6 class="fw-bold mt-4 mb-2">Tambah Komentar</h6>
    <form action="{{ route('aduan-detail', $data->complaint_complaint_id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="comment_text" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary px-4">Kirim</button>
    </form>
</div>

@endsection
