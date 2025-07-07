@extends('layout.app')

@section('title', 'User Profile')

@push('styles')
    <style>
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
        }
        /* Hilangkan background putih pada table profil */
        .table, .table-borderless, .table > :not(caption) > * > * {
            background: transparent !important;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <!-- Foto Profil -->
                <div class="text-center mb-4 position-relative">
                    <img src="{{ $data->profile_picture ? asset('profile_uploads/' . $data->profile_picture) : asset('profile_uploads/profile_default.png') }}"
                        id="profilePreview" class="profile-img" alt="Profile Picture">
                </div>

            <!-- Info User -->
            <table class="table table-borderless">

                <tr>
                    <th scope="row" style="width: 20%;">NIM</th>
                    <td style="width: 10%;">:</td>
                    <td>
                        <input value="{{ $data->nim }}" class="border border-secondary-subtle rounded p-2" readonly>
                    </td>
                </tr>
                <tr>
                    <th scope="row" style="width: 20%;">Nama</th>
                    <td style="width: 10%;">:</td>
                    <td>
                        <input value="{{ $data->name }}" class="border border-secondary-subtle rounded p-2" readonly>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td style="width: 10%;">:</td>
                    <td>
                        <input value="{{ $data->email }}" class="border border-secondary-subtle rounded p-2" readonly>
                    </td>
                </tr>
                <tr>
                    <th scope="row">No.Telp</th>
                    <td style="width: 10%;">:</td>
                    <td>
                        <input value="{{ $data->phone_number }}" class="border border-secondary-subtle rounded p-2" readonly>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>
                        <div class="mt-4">
                            <button class="btn btn-primary px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit Profil
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>
                        <div class="mt-4">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger px-4 fw-bold" type="submit">
                                    Logout
                                </button>
                            </form>
                        </div>
                        </div>
                    </td>
                </tr>
            </table>   

                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" method="POST" action="{{ route('user-profile') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 text-center">
                                    <img id="imagePreview" src="" class="profile-img mb-2">
                                    <input class="form-control" type="file" name="profile_picture" accept="image/*"
                                        onchange="previewImage(event)">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No.Telp</label>
                                    <input type="number" name="phone_number" class="form-control"
                                        value="{{ $data->phone_number }}">
                                </div>
                                {{-- <div class="mb-3">
                            <label for="password" class="form-label">Password Baru (opsional)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('imagePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
