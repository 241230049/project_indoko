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
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:0',
            'deadline' => 'required|date',
        ]);

        // LOGIKA PENYEMPURNAAN: Saat campaign baru dibuat, 
        // pastikan nilai 'collected_donation' (Terkumpul) otomatis dimulai dari angka 0
        $validated['collected_donation'] = 0;

        Campaign::create($validated);
        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil dibuat!');
    }

    public function edit($id)
    {
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