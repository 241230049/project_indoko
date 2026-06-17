<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">

        <div class="text-xl font-bold text-green-600">
            Ayo Donasi
        </div>

        <nav class="flex items-center space-x-6">
            <a href="/" class="text-gray-700 hover:text-green-600 font-medium">Home</a>
            <a href="/campaign" class="text-gray-700 hover:text-green-600 font-medium">Campaign</a>
            <a href="/kontak" class="text-gray-700 hover:text-green-600 font-medium">Kontak</a>
            <a href="/profil" class="text-gray-700 hover:text-green-600 font-medium">Profil</a>
        </nav>

        <a href="{{ route('donasi.index') }}" class="bg-green-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-green-700 transition shadow-sm">
            Donasi Sekarang
        </a>
    </div>
</header>