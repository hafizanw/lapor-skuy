<x-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="login-container p-4 shadow rounded">
                    <div class="form-box" id="login-form">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <h2 class="text-center mb-4">Login</h2>
                            <div class="mb-3">
                                <input type="text" name="nim" class="form-control textbox" placeholder="NIM"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control textbox"
                                    placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#">Lupa Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
