@extends('app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <div class="bg-white p-6 shadow-sm rounded-lg border border-gray-200 mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Unggah Dokumen Baru</h2>
        <form action="/documentations" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Dokumen/Gambar</label>
                <input type="text" name="title" class="mt-1 w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pilih File (PDF, DOC, PNG, JPG, Maks. 5MB)</label>
                <input type="file" name="attachment" class="mt-1 w-full p-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-bold">
                Unggah File
            </button>
        </form>
    </div>

    <h3 class="text-lg font-bold mb-4 text-gray-800">Daftar Dokumen:</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($files as $file)
            <div class="bg-white border p-4 rounded shadow-sm">
                <p class="font-bold text-gray-800 mb-2">{{ $file->title }}</p>
                
                @if(in_array(strtolower($file->file_type), ['png', 'jpg', 'jpeg']))
                    <div class="mt-2 overflow-auto max-h-[300px] border rounded">
                        <img src="{{ asset('storage/' . $file->file_path) }}" alt="{{ $file->title }}" class="block">
                    </div>
                @else
                    <div class="mt-2 p-4 bg-gray-50 rounded text-center border border-dashed">
                        <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="text-blue-600 font-semibold underline">
                            Lihat File ({{ strtoupper($file->file_type) }})
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection