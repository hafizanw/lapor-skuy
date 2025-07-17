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
                <!-- Form Upvote -->
                <form action="{{ route('aduan-umum') }}" method="POST" style="display:inline;">
                  @csrf
                  <input type="hidden" name="complaint_id" value="{{ $data->complaint_complaint_id }}">
                  <input type="hidden" name="vote_type" value="upvote">
                  <button type="submit" class="btn p-0 border-0 bg-transparent">
                    <i data-feather="chevrons-up" class="text-warning"></i>
                  </button>
                </form>
    
                <!-- Jumlah Vote -->
                <div class="fw-bold">{{ $data->total_votes ?? 0 }}</div>
    
                <!-- Form Downvote -->
                <form action="{{ route('aduan-umum') }}" method="POST" style="display:inline;">
                  @csrf
                  <input type="hidden" name="complaint_id" value="{{ $data->complaint_complaint_id }}">
                  <input type="hidden" name="vote_type" value="downvote">
                  <button type="submit" class="btn p-0 border-0 bg-transparent">
                    <i data-feather="chevrons-down" class="text-warning"></i>
                  </button>
                </form>
              </div>

            <!-- Konten Aduan -->
            <div class="col-10 col-md-11">
                <div class="card-body">
                    <!-- Profil & Tanggal -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $complaint_data->profile_picture 
                                    ? asset('profile_uploads/' . $complaint_data->profile_picture) 
                                    : asset('profile_uploads/profile_default.png') }}"
                             class="rounded-circle me-2 border"
                             width="40" height="40"
                             alt="User">
                        <div>
                            <strong class="d-block">{{ $complaint_data->name ?? 'User' }}</strong>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}</small>
                        </div>
                    </div>

                    <!-- Isi Aduan -->
                    <p class="mb-2">{{ $data->complaint_content }}</p>

                    <!-- Gambar Aduan (jika ada) -->
                    @if(!empty($data->path_file))
                    <div class="my-3">
                        <img src="{{ asset('storage/' . $data->path_file) }}"
                            class="img-fluid rounded border"
                            alt="Foto aduan">
                    </div>
                    @endif

                    <!-- Info tambahan -->
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge bg-primary">{{ $data->proses ?? 'Pending' }}</span>
                        <span class="badge bg-warning text-dark">{{ $data->complaint_role ?? 'draft' }}</span>
                    </div>
                </div>
            </div>
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

   <!-- Tambah Komentar -->
   <h6 class="fw-bold">Tambah Komentar</h6>
   <form>
       <div class="mb-3">
           <textarea id="description" class="form-control" rows="4" placeholder="Tulis komentar"></textarea>
       </div>
       <button id="kirimData" type="" name="{{ $data->complaint_complaint_id }}" class="btn btn-primary px-4">Kirim</button>
   </form>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
