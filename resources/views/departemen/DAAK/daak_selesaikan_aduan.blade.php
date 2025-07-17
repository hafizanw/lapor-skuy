{{-- Template Kerangka Site --}}
@extends('layout.app_departemen')

{{-- Title Site --}}
@section('title', 'Departemen Selesaikan Aduan')

{{-- Isi Konten --}}
@section('content')
<div class="container my-4">

    <!-- Judul Aduan -->
    <h4 class="fw-bold mb-4">{{ $data->complaint_title }}</h4>

    <!-- Kartu Detail Aduan -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="row g-0">

            <!-- Konten Aduan -->
            <div class="col-10 col-md-11">
                <div class="card-body">

                    <!-- Profil & Tanggal -->
                    <div class="d-flex align-items-center mb-2">
                        <img 
                            src="{{ $complaint_data->profile_picture 
                                    ? asset('profile_uploads/' . $complaint_data->profile_picture) 
                                    : asset('profile_uploads/profile_default.png') }}"
                            class="rounded-circle me-2 border"
                            width="40" height="40"
                            alt="User"
                        >
                        <div>
                            <strong class="d-block">{{ $complaint_data->name ?? 'User' }}</strong>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}
                            </small>
                        </div>
                    </div>

                    <!-- Isi Aduan -->
                    <p class="mb-2">{{ $data->complaint_content }}</p>

                    <!-- Gambar Aduan (jika ada) -->
                    @if(!empty($data->path_file))
                        <div class="my-3">
                            <img 
                                src="{{ asset('storage/' . $data->path_file) }}"
                                class="img-fluid rounded border"
                                alt="Foto aduan"
                            >
                        </div>
                    @endif

                    <!-- Info Tambahan -->
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge bg-primary">{{ $data->proses ?? 'Pending' }}</span>
                        <span class="badge bg-warning text-dark">{{ $data->complaint_role ?? 'Umum' }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Form Feedback -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body">
            <h5 class="fw-semibold mb-4">Kirim Feedback</h5>
            <form method="POST" action="{{ route('daak-selesaikan-aduan') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="complaint_id" value="{{ $data->complaint_complaint_id }}">

                <div class="mb-3">
                    <label for="description" class="form-label">Feedback</label>
                    <textarea 
                        id="feedback_content" 
                        class="form-control" 
                        name="feedback_content"
                        rows="4" 
                        placeholder="Tulis Feedback di sini..."
                    ></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Lampiran Gambar (Opsional)</label>
                    <input 
                        type="file" 
                        class="form-control" 
                        id="feedback_image" 
                        name="feedback_image" 
                        accept=".jpg, .jpeg, .png"
                    >
                </div>

                <button 
                    id="kirimData" 
                    type="submit"
                    class="btn w-100 text-light"
                    style="background: linear-gradient(to right, #531fa7, #6826b4);"
                    data-bs-toggle="modal"
                    data-bs-target="#modalKonfirmasi"
                >
                    Kirim & Selesaikan
                </button>

            </form>
        </div>
    </div>

    <!-- Komentar -->
    @if(!empty($datas[0]->description))
        <h6 class="fw-semibold mb-3"><span>{{ $data->total_comments }}</span> Komentar</h6>
    @endif
    @foreach ($datas as $data)
    @if(!empty($data->description))
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
    @endif
    @endforeach

 {{-- Modal Konfirmasi --}}
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="modalKonfirmasiLabel">Konfirmasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Feedback Berhasil Terkirim!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Saat tombol OK di modal ditekan, submit form dan kembali ke halaman sebelumnya setelah submit sukses
        document.getElementById('btnKonfirmasiOK').addEventListener('click', function() {
            // Submit form
            document.querySelector('form[action="{{ route('daak-selesaikan-aduan') }}"]').submit();
        });
    });
    </script>
@endpush
