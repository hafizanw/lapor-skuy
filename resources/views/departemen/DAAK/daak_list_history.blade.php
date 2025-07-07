{{-- Template Kerangka Site --}}
@extends('layout.app_departemen')

{{-- Title Site --}}
@section('title', 'List History')

{{-- styles --}}
@push('styles')
<style>
</style>
@endpush

{{-- Isi Konten --}}
@section('content')
    <div class="container py-4">

    <!-- Tab -->
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daak-aduan') }}">Daftar Aduan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('daak-history-aduan') }}">History</a>
        </li>
    </ul>

    <!-- Search dan Sorting -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
        <input id="inputSearch" type="text" class="form-control w-100 w-md-50" placeholder="Search..." value="{{ request('searchKeyword') }}"
        onkeydown="if (event.key === 'Enter') searchOnly()">
        <div class="btn-group align-self-end">
            <a href="{{ route('aduan-umum', ['filterType' => 'terbaru']) }}">
              <button id="btnTerbaru" class="btn btn-outline-primary btn-sm">Terbaru</button>
            </a>
            <a href="{{ route('aduan-umum', ['filterType' => 'teratas']) }}">
              <button id="btnTeratas" class="btn btn-primary btn-sm">Teratas</button>
            </a>
        </div>
    </div>

    <h5 class="fw-bold">Aduan Umum</h5>

    <!-- Aduan Cards -->
    @foreach ($datas as $data)
    <div class="card mb-3 shadow-sm border-0 rounded-3">
        <div class="row g-0 align-items-center">
      
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
              <a href="#" onclick="submitComplaint({{ $data->complaint_complaint_id }})" class="text-decoration-none">
                <h6 class="fw-bold text-dark mb-2">{{ $data->complaint_title }}</h6>
              
      
              <!-- Deskripsi -->
              <p class="text-muted small mb-2" style="line-height: 1.4;">
                {{ $data->complaint_content }} 
              </p>
      
              <!-- Info Bar -->
              <div class="d-flex flex-wrap align-items-center gap-2 text-muted small">
                <span>{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d/m/Y') }}</span>
                <span class="ms-2">{{ $data->name ?? 'Anonim' }}</span>
              </div>
            </a>

              <form id="complaintForm" method="GET" action="{{ route('aduan-detail') }}">
                @csrf
                <input type="hidden" name="complaint_id" id="complaint_id">
              </form>
            
              <div class="mt-3">
                <button class="btn btn-sm text-dark" style="padding: 2px 8px; background-color: #e8dff1;">Diselesaikan pada : <span>23/06/2025</span></button>
            </div>
            </div>
          </div>
        </div>
      </div>
      
    @endforeach
</div>
@endsection

@push('script')
<script>
    axios.defaults.headers.common['X-CSRF-TOKEN'] = 
    document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
    function submitComplaint(complaintId) {
        document.getElementById('complaint_id').value = complaintId;
        document.getElementById('complaintForm').submit();
    }
  
    function searchOnly() {
          const keyword = document.getElementById('inputSearch').value;
          const url = `/aduan-umum?searchKeyword=${encodeURIComponent(keyword)}`;
          window.location.href = url;
      }
  </script>
@endpush