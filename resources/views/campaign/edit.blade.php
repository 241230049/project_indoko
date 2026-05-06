@extends('app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 mt-10 shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Campaign</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaign.update', $campaign) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul Campaign</label>
            <input type="text" name="title" value="{{ old('title', $campaign->title) }}" 
                   class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="4" 
                      class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500" required>{{ old('description', $campaign->description) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Target Donasi</label>
                <input type="number" name="target_donation" value="{{ old('target_donation', $campaign->target_donation) }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Terkumpul</label>
                <input type="number" name="collected_donation" value="{{ old('collected_donation', $campaign->collected_donation) }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', $campaign->deadline) }}" 
                   class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('campaign.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection