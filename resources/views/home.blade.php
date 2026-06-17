@extends('app')

@section('title', 'Home - Donasiku')

@section('content')

<div class="text-center py-20 mb-8 max-w-4xl mx-auto px-4">
    <h1 class="text-5xl font-bold text-slate-900 mb-4 tracking-tight">
        Selamat Datang di Ayo Donasi
    </h1>
    <p class="text-xl text-gray-500 mb-8">
        Mari berbagi kebaikan dan bantu sesama melalui donasi
    </p>
    
    <a href="{{ route('donasi.index') }}" class="inline-block bg-[#00C853] text-white font-bold text-lg px-8 py-4 rounded-xl hover:bg-green-600 transition shadow-md hover:shadow-lg transform active:scale-[0.98]">
        Donasi Sekarang
    </a>
</div>

@endsection