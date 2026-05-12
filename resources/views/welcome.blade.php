<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-[#FDFDFC] text-[#1b1b18] flex flex-col min-h-screen">

    <main class="flex-grow flex items-center justify-center p-6">
        <section class="max-w-md w-full text-center">
            
            <header class="space-y-2">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">
                    Selamat Datang
                </h1>
                <p class="text-lg text-gray-500 font-medium">
                    Mahasiswa @ {{ config('app.name') }}
                </p>
            </header>

            <nav class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="/" 
                   class="inline-flex items-center px-6 py-2.5 bg-black text-white text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all duration-200">
                    Beranda
                </a>

                <button type="button" 
                        disabled 
                        class="inline-flex items-center px-6 py-2.5 bg-green-600 text-white text-sm font-bold rounded-lg opacity-50 cursor-not-allowed shadow-none">
                    Donasi Sekarang
                </button>
            </nav>

        </section>
    </main>

    <footer class="py-8 text-center border-t border-gray-100">
        <p class="text-sm text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Seluruh hak cipta dilindungi.
        </p>
    </footer>

</body>
</html>