{{-- Template Kerangka Site --}}
@extends('layout.app_departemen')

{{-- Title Site --}}
@section('title', 'Departemen Detail Aduan')

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
                            <strong class="d-block">{{ $data->name ?? 'User' }}</strong>
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
                        <span class="badge bg-warning text-dark">{{ $data->kategori ?? 'Umum' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Button -->
    <div class="container-fluid mb-4" style=" display: flex; align-items: center; justify-content: center;">
        <a onclick="selesaikanComplaint({{ $data->complaint_complaint_id }})" class="btn shadow-lg text-light" style="width: 100%; max-width: 500px; background: linear-gradient(to right, #531fa7, #6826b4);">
            Selesaikan
        </a>
    </div>

    <form id="selesaikanForm" method="GET" action="{{ route('departemen-selesaikan-aduan') }}">
        @csrf
        <input type="hidden" name="selesaikan_id" id="selesaikan_id">
      </form>

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

   <!-- Modal kirim comment berhasil -->
    <div class="modal fade" id="commentModalBerhasil" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
            <p>Komentar anda berhasil dikirim. Silakan refresh halaman.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal kirim comment gagal -->
    <div class="modal fade" id="commentModalGagal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
            <p>Gagal mengirim komentar</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function selesaikanComplaint(complaintId) {
            document.getElementById('selesaikan_id').value = complaintId;
            document.getElementById('selesaikanForm').submit();
        }
    </script>
@endpush
