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
                            <strong class="d-block">{{ $username ?? 'User' }}</strong>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}</small>
                        </div>
                    </div>

                    <!-- Isi Aduan -->
                    <p class="mb-2">{{ $data->complaint_content }}</p>

                    <!-- Gambar Aduan (jika ada) -->
                    @if(Storage::exists('public/' . $data->path_file))
                    <div class="my-3">
                        <img src="{{ asset('storage/' . $data->path_file) }}"
                            class="img-fluid rounded border"
                            alt="Foto aduan">
                    </div>
                    @endif

                    <!-- Info tambahan -->
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge bg-primary">{{ $data->proses ?? 'Pending' }}</span>
                        <span class="badge bg-warning text-dark">{{ $data->complaint_role ?? 'Umum' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <h6 class="fw-semibold mb-3"><span>{{ $data->total_comments }}</span> Komentar</h6>
    @foreach ($datas as $data)
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-body d-flex">
                <img src="{{ $data->profile_picture 
                            ? asset('profile_uploads/' . $data->profile_picture) 
                            : asset('profile_uploads/profile_default.png') }}"
                     alt="User" class="rounded-circle me-3 border" width="40" height="40">
                <div>
                    <strong class="mb-0">{{ $data->name }}</strong><br>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($data->comment_created_at)->format('d-m-Y') }}</small>
                    <p class="mb-0 mt-2">{{ $data->description }}</p>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Card Feedback --}}
<div class="d-flex justify-content-end">
    <div class="card mb-3 shadow border-0" style="background: #dbf1ff; min-width: 320px; max-width: 420px;">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2 justify-content-end">
                <strong class="text-end ms-auto">Feedback</strong>
            </div>
            <p class="mb-2 text-end">{{ $data->response }}</p>
            @if(!empty($data->attachment))
                <div class="text-end">
                    <img src="{{ asset('profile_uploads/' . $data->attachment) }}" alt="Feedback Image" class="img-fluid rounded border" style="max-width: 180px;">
                </div>
            @endif
        </div>
    </div>
</div>

</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
