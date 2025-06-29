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
                            src="{{ $data->profile_picture 
                                    ? asset('profile_uploads/' . $data->profile_picture) 
                                    : asset('profile_uploads/profile_default.png') }}"
                            class="rounded-circle me-2 border"
                            width="40" height="40"
                            alt="User"
                        >
                        <div>
                            <strong class="d-block">{{ $data->name ?? 'User' }}</strong>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}
                            </small>
                        </div>
                    </div>

                    <!-- Isi Aduan -->
                    <p class="mb-2">{{ $data->complaint_content }}</p>

                    <!-- Gambar Aduan (jika ada) -->
                    @if(Storage::exists('public/' . $data->path_file))
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
                        <span class="badge bg-warning text-dark">{{ $data->kategori ?? 'Umum' }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Form Feedback -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body">
            <h5 class="fw-semibold mb-4">Kirim Feedback</h5>
            <form>

                <div class="mb-3">
                    <label for="description" class="form-label">Komentar Anda</label>
                    <textarea 
                        id="description" 
                        class="form-control" 
                        rows="4" 
                        placeholder="Tulis komentar di sini..."
                    ></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Lampiran Gambar (Opsional)</label>
                    <input 
                        type="file" 
                        class="form-control" 
                        id="image" 
                        name="image" 
                        accept=".jpg, .jpeg, .png"
                    >
                </div>

                <button 
                    id="kirimData" 
                    type="button"
                    name="{{ $data->complaint_complaint_id }}" 
                    class="btn w-100 text-light"
                    style="background: linear-gradient(to right, #531fa7, #6826b4);"
                >
                    Kirim & Selesaikan
                </button>

            </form>
        </div>
    </div>

    <!-- Modal: Komentar Berhasil -->
    <div class="modal fade" id="commentModalBerhasil" tabindex="-1" aria-labelledby="modalBerhasilLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBerhasilLabel">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Komentar anda berhasil dikirim. Silakan refresh halaman.</p>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        class="btn text-light" 
                        style="background: linear-gradient(to right, #531fa7, #6826b4);" 
                        data-bs-dismiss="modal"
                    >
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Komentar Gagal -->
    <div class="modal fade" id="commentModalGagal" tabindex="-1" aria-labelledby="modalGagalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGagalLabel">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Gagal mengirim komentar</p>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        class="btn text-light" 
                        style="background: linear-gradient(to right, #531fa7, #6826b4);" 
                        data-bs-dismiss="modal"
                    >
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
