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
    <div class="card mb-3 shadow-sm border-0 rounded-3">
        <div class="row g-0 align-items-center">
      
          <!-- Kolom Voting -->
          <div class="col-auto text-center px-3 py-4 border-end">
            <i data-feather="chevrons-up" class="text-warning cursor-pointer mb-1"></i>
            <div class="fw-bold">4</div>
            <i data-feather="chevrons-down" class="text-warning cursor-pointer mt-1"></i>
          </div>
      
          <!-- Kolom Profil -->
          <div class="col-auto px-3 py-3">
            <img src="{{ $data->profile_picture 
                          ? asset('profile_uploads/' . $data->profile_picture) 
                          : asset('profile_uploads/profile_default.png') }}" 
                 class="rounded-circle border" 
                 alt="User" 
                 style="width: 50px; height: 50px; object-fit: cover;">
          </div>
      
          <!-- Konten Utama -->
          <div class="col">
            <div class="card-body py-3 px-3">
      
              <!-- Judul -->
              <a href="{{ route('aduan-detail', $data->complaint_complaint_id) }}" class="text-decoration-none">
                <h6 class="fw-bold text-dark mb-2">{{ $data->complaint_title }}</h6>
              </a>
      
              <!-- Deskripsi -->
              <p class="text-muted small mb-2" style="line-height: 1.4;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              </p>
      
              <!-- Info Bar -->
              <div class="d-flex flex-wrap align-items-center gap-2 text-muted small">
                <span>{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d/m/Y') }}</span>
                <span class="badge bg-primary">{{ $data->proses }}</span>
                <span class="badge bg-warning text-dark">sarpras</span>
                <span class="me-1">{{ $data->name ?? 'Anonim' }}</span>
                <span class="ms-auto me-4"><i data-feather="message-square" class="text-dark fs-3" style="scale: 0.7;"></i>{{ $data->total_comments ?? 0 }}</span>
              </div>
      
            </div>
          </div>
      
        </div>
      </div>
      
    @endforeach
</div>
@endsection

