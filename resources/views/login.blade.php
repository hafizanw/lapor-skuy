<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="login-container p-4 shadow rounded">
                    <div class="form-box" id="login-form">
                        {{-- Logika untuk menampilkan pesan error yang berbeda --}}
                        @if ($errors->has('password_error'))
                            <div class="alert alert-warning mb-3">
                                {{-- Menggunakan {!! !!} agar tag <a> bisa dirender sebagai HTML --}}
                                {!! $errors->first('password_error') !!}
                            </div>
                        @elseif ($errors->any())
                            <div class="alert alert-danger mb-3">
                                {{ $errors->first('nim') ?: $errors->first() }}
                            </div>
                        @endif
                        {{-- PERBAIKAN: Menggunakan helper route() untuk action form --}}
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <h2 class="text-center mb-4">Login</h2>
                            <div class="mb-3">
                                <input type="text" name="nim" class="form-control textbox"
                                    placeholder="NIM / NIDN" required autofocus>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control textbox"
                                    placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            @csrf
                            <a href="{{ route('password.email') }}">Lupa Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>