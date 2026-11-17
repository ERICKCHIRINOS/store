<nav x-data="{ open: false }" class="navbar navbar-expand-sm bg-body border-bottom">

    <div class="container">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <x-application-logo class="d-block" style="height: 36px; width: auto;" />
        </a>

        {{-- Hamburger --}}
        <button
            type="button"
            class="navbar-toggler"
            @click="open = ! open"
            :aria-expanded="open.toString()"
            aria-controls="responsive-navbar"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigation Content --}}
        <div
            id="responsive-navbar"
            class="collapse navbar-collapse"
            :class="{ 'show': open }"
        >

            {{-- Primary Navigation Links --}}
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>

            </ul>

            {{-- Settings Dropdown --}}
            <div class="navbar-nav">

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            type="button"
                            class="btn btn-outline-secondary border-0 d-flex align-items-center gap-2"
                            aria-label="User menu"
                        >
                            <span>{{ Auth::user()->name }}</span>

                            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        {{-- Authentication --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>

            </div>

            {{-- Responsive Settings Options --}}
            <div class="d-sm-none border-top mt-3 pt-3">

                <div class="px-3 mb-3">
                    <div class="fw-medium text-body">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="small text-secondary">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </li>

                    {{-- Authentication --}}
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>