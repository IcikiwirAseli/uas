@extends('layouts.app')

@section('content')
<div class="iris-login-wrapper">
    
    <div class="iris-login-left">
        <h1 class="iris-login-logo">IRIS</h1>
    </div>

    <div class="iris-login-right">
        <div class="iris-login-card">
            <h2 class="iris-login-title">MASUK</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="iris-input-group">
                    <label for="email">Nama Pengguna/Email</label>
                    <input id="email" type="email" class="iris-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nama Pengguna" required autocomplete="email" autofocus>
                    
                    @error('email')
                        <span class="iris-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="iris-input-group">
                    <label for="password">Kata Sandi</label>
                    <div class="iris-password-wrapper">
                        <input id="password" type="password" class="iris-input @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                        
                        <span class="iris-toggle-password" onclick="togglePassword()">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16" fill="#555">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 92.9-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.8-35.7-46.1-87.7-92.9-131.1C433.5 68.8 368.8 32 288 32zM128 256a160 160 0 1 1 320 0 160 160 0 1 1 -320 0zm160-80a80 80 0 1 0 0 160 80 80 0 1 0 0-160z"/>
                            </svg>
                        </span>
                    </div>

                    @error('password')
                        <span class="iris-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="iris-checkbox-group">
                    <input class="iris-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="iris-checkbox-label" for="remember">Ingatkan Saya</label>
                </div>

                <div class="iris-submit-group">
                    <button type="submit" class="iris-btn-masuk">MASUK</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
</script>
@endsection