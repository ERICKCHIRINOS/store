<x-guest-layout>

    <div class="text-center mb-4">
        <h1 class="h3">Crear una cuenta</h1>
        <p class="text-secondary">Completa tus datos para registrarte.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">
                {{ __('Name') }}
            </label>

            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                value="{{ old('name') }}" required autofocus autocomplete="name">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Email Address --}}
        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('Email') }}
            </label>

            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                name="email" value="{{ old('email') }}" required autocomplete="username">

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
                name="password" required autocomplete="new-password">

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>

            <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                type="password" name="password_confirmation" required autocomplete="new-password">

            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <a href="{{ route('login') }}" class="link-primary">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn-solid theme-primary">
                {{ __('Register') }}
            </button>

        </div>

    </form>

</x-guest-layout>
