<x-guest-layout>

    <div class="mb-4 text-secondary">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    {{-- Verification Link Status --}}
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">

        {{-- Resend Verification Email --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="btn-solid theme-primary">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        {{-- Log Out --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-link link-secondary text-decoration-underline p-0">
                {{ __('Log Out') }}
            </button>
        </form>

    </div>

</x-guest-layout>