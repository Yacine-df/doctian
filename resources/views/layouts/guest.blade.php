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
    {{-- style --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/formStepper.css', 'resources/js/app.js', 'resources/js/formStepper.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav x-data="{ open: false }" class="sticky top-0 left-0 right-0 bg-white w-full  shadow-sm">
            <!-- Primary Navigation Menu -->
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a class="w-28" href="/">
                                <x-application-logo class="block h-9 text-gray-800 " />
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                        {{-- languages switch --}}
                        <x-languages></x-languages>
                        @guest
                            <a class="text-doc-tian font-semibold" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                            <a class="bg-doc-tian text-white py-2 px-4 rounded-full " href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        @endguest
                        @auth
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endauth
                    </div>
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                @guest
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    </div>
                @endguest
                @auth

                @endauth
            </div>
        </nav>
        @if (! request()->route()->named(['default','login','register','patient.register','doctor.register']))
            {{-- search form --}}
            <div class="bg-white p-6 rounded shadow">
                <x-doctor-search></x-doctor-search>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>
