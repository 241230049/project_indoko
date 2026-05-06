<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        $campaigns = Campaign::all();
        return view('campaign.index', compact('campaigns'));
    }

    public function create() {
        return view('campaign.create'); // Anda perlu buat file create.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:0',
            'deadline' => 'required|date',
        ]);

        \App\Models\Campaign::create($validated);
        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil dibuat!');
    }

    public function edit($id)
    {
    // Mengambil data berdasarkan ID (Sesuai materi hal 15)
    $campaign = Campaign::findOrFail($id); 
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:0',
            'collected_donation' => 'required|numeric|min:0',
            'deadline' => 'required|date',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->update($validated);

        return redirect()->route('campaign.index')->with('success', 'Data berhasil diupdate!');
    }
    public function destroy($id) {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return redirect()->route('campaign.index')->with('success', 'Data berhasil dihapus');
    }
}