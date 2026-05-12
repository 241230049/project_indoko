@extends('app')

@section('content')
<div class="overflow-x-auto p-6"> 
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Daftar Campaign</h1>
        <a href="/campaign/create" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            + Tambah Campaign
        </a>
    </div>

    <table class="table-auto w-full mt-4 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 text-left"> Judul </th>
                <th class="text-left"> Target </th>
                <th class="text-left"> Terkumpul </th>
                <th class="text-center"> Aksi </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $c)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-2"> {{ $c->title }} </td>
                <td> Rp {{ number_format($c->target_donation) }} </td>
                <td> Rp {{ number_format($c->collected_donation) }} </td>
                <td class="p-2 flex justify-center gap-4">
                    <a href="/campaign/{{ $c->id }}/edit" class="text-blue-500 hover:underline font-semibold">
                        Edit
                    </a>

                    <form action="/campaign/{{ $c->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline font-semibold">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection