<x-app-layout>

    <x-slot name="header">
        <h2 class="h4 fw-semibold text-body mb-0">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-5">

        {{-- Update Profile Information --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <div class="mx-auto" style="max-width: 48rem;">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Update Password --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <div class="mx-auto" style="max-width: 48rem;">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- Delete Account --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <div class="mx-auto" style="max-width: 48rem;">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>

</x-app-layout>