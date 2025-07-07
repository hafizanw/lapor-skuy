{{-- Template Kerangka Site --}}
@extends('layout.app')

{{-- Title Site --}}
@section('title', 'Kirim Aduan Umum')

{{-- Form aduan --}}
@section('content')
    <section id="formLapor" class="container-lg my-5">
        <h1 class="text-center mb-1 mt-lg-4 fw-bold" style="color: #842FE3">Mari Buat Aduanmu!</h1>
        <form action="{{ route('kirim-aduan-umum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Aduan</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Deskripsi Aduan</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Lampiran (Opsional)</label>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
            </div>
            @auth
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            @endauth
            {{-- // 2 untuk publik --}}
            <input type="hidden" name="visibility_type" value="2"> 
            <button id="kirimButton" type="submit" class="btn btn-primary">Kirim Aduan</button>
        </form>
    </section>

    <!-- Modal kirim aduan berhasil -->
    <div class="modal fade" id="kirimAduanBerhasil" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Notifikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
            <p>Aduan anda berhasil dikirim, Terima kasih.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn text-light" style="background: linear-gradient(to right, #531fa7, #6826b4);" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const button = document.getElementById('kirimButton');
        if(button) {
            button.addEventListener('click', () => {
                try {
                const myModal = new bootstrap.Modal(
                        document.getElementById("kirimAduanBerhasil")
                    );
                    myModal.show();
            } catch (error) {
                alert(error);
            }
            })
        }
    </script>

@endpush

