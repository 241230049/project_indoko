<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <main class="max-w-xl w-full text-center">
            
            <header class="mb-8">
                <h1 class="text-3xl font-semibold tracking-tight">Selamat Datang</h1>
                <p class="text-gray-500 mt-2">Mahasiswa @ {{ config('app.name') }}</p>
            </header>
        
                <div class="mt-6 flex gap-3 justify-center">
                    <a href="/" class="px-4 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-gray-800 transition">Beranda</a>
                    <button disabled type="button" class="bg-green-500 text-white px-5 py-2 rounded-lg font-bold opacity-70 cursor-not-allowed">Donasi Sekarang</button>
                </div>

            <footer class="mt-12 text-xs text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </footer>

        </main>
    </div>

</body>
</html>