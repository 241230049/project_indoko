@extends('app')

@section('title', 'Formulir Donasi - Donasiku')

@section('content')
<div class="min-h-screen bg-slate-50 py-12 px-4">
    <main class="max-w-2xl mx-auto">
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-3">Salurkan Kebaikan</h1>
            @if(isset($campaign))
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full font-medium text-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    Sedang berlangsung: {{ $campaign->title }}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6 md:p-10">
            
            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('donasi.store') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="campaign_id" value="{{ $campaign->id ?? '' }}">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-4">Pilih Nominal Donasi</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach([50000, 100000, 200000, 500000, 1000000] as $amount)
                            <button type="button" data-amount="{{ $amount }}" class="nominal-btn border-2 border-slate-200 rounded-2xl py-3 font-semibold text-slate-600 hover:border-green-500 hover:text-green-600 transition-all active:scale-95">
                                {{ 'Rp ' . number_format($amount, 0, ',', '.') }}
                            </button>
                        @endforeach
                        <button type="button" onclick="focusCustom()" class="border-2 border-dashed border-slate-300 rounded-2xl py-3 font-semibold text-slate-500 hover:border-green-500 hover:text-green-600 transition-all">
                            Lainnya
                        </button>
                    </div>
                </div>

                <div>
                    <label for="nominal" class="block text-sm font-bold text-slate-700 mb-2">Nominal (Rp)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold">Rp</div>
                        <input type="number" name="nominal" id="nominal" required min="10000" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-green-500 focus:bg-white outline-none transition-all font-bold text-lg text-slate-800" 
                            placeholder="10.000">
                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-green-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-2xl focus:border-green-500 outline-none transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-green-600 transition-all shadow-lg shadow-slate-200 active:scale-[0.98]">
                    Lanjut ke Pembayaran
                </button>
            </form>
        </div>
    </main>
</div>

<script>
    document.querySelectorAll('.nominal-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            document.getElementById('nominal').value = this.dataset.amount;
        });
    });
    function focusCustom() { document.getElementById('nominal').focus(); }
</script>
@endsection