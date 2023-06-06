
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
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/agora.js'])
</head>

<body>
    @php
        $appointmentId = 13
    @endphp
    <h2 class="text-center p-4 font-bold ">Get started with video calling</h2>
    <div class="row min-h-screen bg-black">
        <div class="w-full flex items-center justify-center absolute bottom-3 z-50">
            <button id="join" class="bg-green-500 text-white py-2 px-4 rounded-full mx-2" type="button" id="join">Join</button>
            <button id="leave" class="bg-red-200 text-white py-2 px-4 rounded-full mx-2 cursor-not-allowed " type="button" id="leave">Leave</button>
        </div>
        <div id="container" class="w-full h-full">

        </div>
    </div>
    <script>
        var app = {{$appointmentId}}
        console.log(app);
    </script>
</body>
