@extends('layouts.app')

@section('content')
<div class="iris-register-wrapper">
    
    <div class="iris-register-left">
        <h1 class="iris-register-logo">IRIS</h1>
    </div>

    <div class="iris-register-right">
        <div class="iris-register-card">
            <h2 class="iris-register-title">DAFTAR</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="iris-input-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="iris-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required autocomplete="name" autofocus>
                    
                    @error('name')
                        <span class="iris-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="iris-input-group">
                    <label for="email">Alamat Email</label>
                    <input id="email" type="email" class="iris-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Alamat Email" required autocomplete="email">
                    
                    @error('email')
                        <span class="iris-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="iris-input-group">
                    <label for="password">Kata Sandi</label>
                    <div class="iris-password-wrapper">
                        <input id="password" type="password" class="iris-input @error('password') is-invalid @enderror" name="password" placeholder="Buat Kata Sandi" required autocomplete="new-password">
                        
                        <span class="iris-toggle-password" onclick="togglePassword('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16" fill="#555">
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

                <div class="iris-input-group">
                    <label for="password-confirm">Konfirmasi Kata Sandi</label>
                    <div class="iris-password-wrapper">
                        <input id="password-confirm" type="password" class="iris-input" name="password_confirmation" placeholder="Ulangi Kata Sandi" required autocomplete="new-password">
                        
                        <span class="iris-toggle-password" onclick="togglePassword('password-confirm')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16" fill="#555">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 92.9-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.8-35.7-46.1-87.7-92.9-131.1C433.5 68.8 368.8 32 288 32zM128 256a160 160 0 1 1 320 0 160 160 0 1 1 -320 0zm160-80a80 80 0 1 0 0 160 80 80 0 1 0 0-160z"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="iris-submit-group">
                    <button type="submit" class="iris-btn-daftar">
                        DAFTAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
@endsection