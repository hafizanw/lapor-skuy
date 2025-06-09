@extends('layout.app')

@section('title', 'User Profile')

@section('content')
    <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <!-- Foto Profil -->
            <div class="text-center mb-4 position-relative">
                <img src="{{ asset('assets/logo.png') }}" alt="Foto Profil" class="rounded-circle border border-2 border-secondary-subtle" width="120" height="120">
            </div>

            <!-- Info User -->
            <table class="table table-borderless">
                <tr>
                    <th scope="row" style="width: 30%;">Nama</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">Yuafiq Alfin</div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">yuafiq@students.amikom.ac.id</div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Role</th>
                    <td>
                        <div class="border border-secondary-subtle rounded p-2">Mahasiswa</div>
                    </td>
                </tr>
            </table>

              <!-- Button -->
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 fw-bold" type="submit">
                    Edit Profil
                </button>
            </div>

              <!-- Button -->
            <div class="text-center mt-4">
                <button class="btn btn-danger px-4 fw-bold" type="submit">
                    Logout
                </button>
            </div>
        </div>
    </div>
</div>
@endsection