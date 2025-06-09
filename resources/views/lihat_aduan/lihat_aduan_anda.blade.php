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
            <a class="nav-link" href="{{ url('/aduan-umum') }}">Aduan Umum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Aduan Anda</a>
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
    @for($i = 0; $i < 2; $i++)
    <div class="card mb-3">
        <div class="row g-0 align-items-center">
            <div class="col-2 col-md-1 text-center py-3">
                <div>
                    <i data-feather="chevrons-up" class="text-primary"></i>
                </div>
                <div class="text-black fw-bold">4</div>
                <div>
                   <i data-feather="chevrons-down" class="text-primary"></i>
                </div>
            </div>
            <div class="col-10 col-md-11">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                        <h6 class="mb-0 fw-bold">Saya mendapati AC ruang 5.3.2 tidak berfungsi</h6>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <small class="text-muted">23-05-2025</small>
                        <span class="badge bg-primary">on progress</span>
                        <span class="badge bg-warning text-dark">sarpras</span>
                        <small><i class="bi bi-chat-left-text"></i> 3</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection