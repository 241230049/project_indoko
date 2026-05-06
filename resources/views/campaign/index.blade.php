@extends('app')

@section('content')
<index class= "overflow-x-auto"> 
    <table class="table-auto w-full mt-4 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 text-left"> Judul </th>
                <th class="text-left"> Target </th>
                <th class="text-left"> Terkumpul </th>
                <th class="text-left"> Aksi </th>
            </tr>"
        </thead>
        <tbody>
            @foreach ($campaigns as $c)
            <tr class="border-t">
                <td class="p-2"> {{ $c->title }} </td>
                <td> {{ number_format($c->target_donation) }} </td>
                <td> {{ number_format($c->collected_donation) }} </td>
                <td>
                    <a href="#" class="text-blue-500">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody> {{-- Pastikan tbody ditutup --}}
    </table> {{-- Pastikan table ditutup --}}
</index>
@endsection