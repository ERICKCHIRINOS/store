<x-guest-layout>

    <div class="text-center mb-4">
        <h1 class="h3">Iniciar sesión</h1>
        <p class="text-secondary">Ingresa tus credenciales para continuar.</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email Address --}}
        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('Email') }}
            </label>

            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                name="email" value="{{ old('email') }}" required autofocus autocomplete="username">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">
                {{ __('Password') }}
            </label>

            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"
                name="password" required autocomplete="current-password">

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">

            <label class="form-check-label" for="remember_me">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link-primary">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn-solid theme-primary">
                {{ __('Log in') }}
            </button>

        </div>

    </form>

</x-guest-layout>
