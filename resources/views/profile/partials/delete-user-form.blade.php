<section class="d-flex flex-column gap-4">

    <header>
        <h2 class="h5 fw-semibold text-body">
            {{ __('Delete Account') }}
        </h2>

        <p class="small text-secondary mb-0">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    {{-- Open Confirmation Modal --}}
    <div>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    {{-- Confirmation Modal --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-4 p-md-5">
            @csrf
            @method('delete')

            <h2 class="h5 fw-semibold text-body">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="small text-secondary mt-2">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            {{-- Password --}}
            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1"
                    placeholder="{{ __('Password') }}"
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            {{-- Actions --}}
            <div class="d-flex justify-content-end gap-2 mt-4">

                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>