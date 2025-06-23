{{-- Template Kerangka Situs --}}
@extends('layout.app')

{{-- Judul Situs --}}
@section('title', 'Detail Aduan')

{{-- Isi Konten --}}
@section('content')
    <div class="container my-4">
        <h4 class="fw-bold mb-4">{{ $data->complaint_title }}</h4>

        <div class="card mb-4 shadow-sm border-0">
            <div class="row g-0">
                <div class="col-auto text-center px-3 py-4 border-end">
                    <form action="{{ route('aduan-umum') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="complaint_id" value="{{ $data->complaint_complaint_id }}">
                        <input type="hidden" name="vote_type" value="upvote">
                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                            <i data-feather="chevrons-up" class="text-warning"></i>
                        </button>
                    </form>

                    <div class="fw-bold">{{ $data->total_votes ?? 0 }}</div>

                    <form action="{{ route('aduan-umum') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="complaint_id" value="{{ $data->complaint_complaint_id }}">
                        <input type="hidden" name="vote_type" value="downvote">
                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                            <i data-feather="chevrons-down" class="text-warning"></i>
                        </button>
                    </form>
                </div>

                <div class="col-10 col-md-11">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ $data->complaint_author_profile_picture
                                ? asset('profile_uploads/' . $data->complaint_author_profile_picture)
                                : asset('profile_uploads/profile_default.png') }}"
                                class="rounded-circle me-2 border" width="40" height="40" alt="User">
                            <div>
                                <strong class="d-block">{{ $data->complaint_author_name ?? 'User' }}</strong>
                                <small
                                    class="text-muted">{{ \Carbon\Carbon::parse($data->complaint_created_at)->format('d-m-Y') }}</small>
                            </div>
                        </div>

                        <p class="mb-2">{{ $data->complaint_content }}</p>
                        @if ($data->path_file && Storage::exists('public/' . $data->path_file))
                            <div class="my-3">
                                <img src="{{ asset('storage/' . $data->path_file) }}" class="img-fluid rounded border"
                                    alt="Foto aduan">
                            </div>
                        @endif

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge bg-primary">{{ $data->proses ?? 'Pending' }}</span>
                            {{-- Catatan: 'kategori' tidak ada di stored procedure Anda, mungkin perlu ditambahkan jika dibutuhkan --}}
                            <span class="badge bg-warning text-dark">{{ $data->kategori ?? 'Umum' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h6 class="fw-semibold mb-3"><span>{{ $data->total_comments }}</span> Komentar</h6>

        {{-- PERUBAHAN 3: Gunakan variabel yang berbeda untuk perulangan (misal, $comment) agar tidak konflik dengan $data --}}
        @foreach ($datas as $comment)
            {{-- PERUBAHAN 4: Hanya tampilkan kartu komentar jika ini adalah komentar asli (yaitu, comment_id tidak null) --}}
            @if ($comment->comment_id)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body d-flex">
                        {{-- PERUBAHAN 5: Gunakan kolom baru untuk foto profil pembuat komentar --}}
                        <img src="{{ $comment->comment_author_profile_picture
                            ? asset('profile_uploads/' . $comment->comment_author_profile_picture)
                            : asset('profile_uploads/profile_default.png') }}"
                            alt="User" class="rounded-circle me-3 border" width="40" height="40">
                        <div>
                            {{-- PERUBAHAN 6: Gunakan kolom baru untuk nama pembuat komentar --}}
                            <strong class="mb-0">{{ $comment->comment_author_name }}</strong><br>
                            <small
                                class="text-muted">{{ \Carbon\Carbon::parse($comment->comment_created_at)->format('d-m-Y') }}</small>
                            {{-- PERUBAHAN 7: Gunakan kolom baru untuk deskripsi komentar --}}
                            <p class="mb-0 mt-2">{{ $comment->comment_description }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach


        <h6 class="fw-bold">Tambah Komentar</h6>
        <form>
            <div class="mb-3">
                <textarea id="description" class="form-control" rows="4" placeholder="Tulis komentar"></textarea>
            </div>
            <button id="kirimData" type="" name="{{ $data->complaint_complaint_id }}"
                class="btn btn-primary px-4">Kirim</button>
        </form>

        <div class="modal fade" id="commentModalBerhasil" tabindex="-1" aria-labelledby="loginModalLabel"
            aria-hidden="true">
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
                        <button type="button" class="btn text-light"
                            style="background: linear-gradient(to right, #531fa7, #6826b4);"
                            data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>

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
                        <button type="button" class="btn text-light"
                            style="background: linear-gradient(to right, #531fa7, #6826b4);"
                            data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
