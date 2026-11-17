<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-body-tertiary">

    <main class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-4">

        {{-- Application Logo --}}
        <div class="mb-4">
            <a href="/" class="d-inline-block">
                <x-application-logo style="width: 5rem; height: 5rem;" />
            </a>
        </div>

        {{-- Authentication Content --}}
        <div class="container" style="max-width: 28rem;">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>

        </div>

    </main>

</body>

</html>