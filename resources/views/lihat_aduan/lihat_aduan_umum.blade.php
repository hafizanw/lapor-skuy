{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Lihat Aduan')

{{-- Isi Konten --}}
@section('content')
    <div class="container py-4">

        <!-- Tab -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#">Aduan Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/aduan-anda') }}">Aduan Anda</a>
            </li>
        </ul>

        <!-- Search dan Sorting -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
            <input type="text" class="form-control w-100 w-md-50" placeholder="Search...">
            <div class="btn-group">
                <button class="btn btn-outline-primary btn-sm">Terbaru</button>
                <button class="btn btn-primary btn-sm">Teratas</button>
            </div>
        </div>

        <h5 class="fw-bold">Aduan Umum</h5>

        <!-- Aduan Cards -->
        @foreach ($datas as $data)
            <div class="card mb-3 shadow-sm">
                <div class="row g-0 align-items-center">

                    <!-- Kolom Voting -->
                    <div class="col-auto text-center py-3 px-2 border-end">
                        <i data-feather="chevrons-up" id="upvote" class="text-warning"></i>
                        <div class="fw-bold">4</div>
                        <i data-feather="chevrons-down" id="downvote" class="text-warning"></i>
                    </div>

                    <!-- Kolom Gambar Profil -->
                    <div class="col-auto px-3 py-3 align-self-start">
                        <img src="{{ $data->profile_picture
                            ? asset('profile_uploads/' . $data->profile_picture)
                            : asset('profile_uploads/profile_default.png') }}"
                            class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover;" alt="User">
                    </div>

                    <!-- Kolom Konten Utama -->
                    <div class="col">
                        <a href="{{ route('aduan-detail', $data->complaint_complaint_id) }}" class="text-decoration-none">
                            <div class="card-body py-3 px-2">
                                <!-- Judul / isi aduan -->
                                <h6 class="fw-bold text-dark mb-1">
                                    {{ $data->complaint_title }}
                                </h6>

                                <!-- Tanggal, Status, dan Komentar -->
                                <div class="d-flex flex-column gap-1">
                                    <small class="text-muted">@datetime($data->complaint_created_at)</small>

                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <span id="complaintStatus" class="badge bg-primary">{{ $data->proses }}</span>
                                        <span class="badge bg-warning text-dark">sarpras</span>
                                        <small class="text-muted">
                                            <i class="bi bi-chat-left-text me-1"></i>3
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
