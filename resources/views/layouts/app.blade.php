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
    <!-- style -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @can('patient')
            @include('layouts.patient-nav')
        @endcan
        @can('doctor')
            @include('layouts.doctor-nav')
        @endcan
        {{-- search form --}}
        <div class="bg-white p-6 rounded shadow">
            @cannot('doctor')
                <x-doctor-search></x-doctor-search>
            @endcannot
        </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-flash></x-flash>
    </div>
    @livewireScripts
</body>

</html>
