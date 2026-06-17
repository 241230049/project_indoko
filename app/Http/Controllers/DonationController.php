<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign; 
use App\Models\Donation; // Pastikan model Donation Anda di-import di sini

class DonationController extends Controller
{
    /**
     * Menampilkan form donasi yang terhubung dengan Campaign.
     */
    public function index($campaign_id = null)
    {
        $campaign = null;
        if ($campaign_id) {
            $campaign = Campaign::find($campaign_id);
        }

        return view('donation', compact('campaign'));
    }

    /**
     * Menyimpan data transaksi donasi dan memperbarui total terkumpul di Campaign.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'nominal'     => 'required|numeric|min:10000',
            'nama'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'doa'         => 'nullable|string|max:1000',
            'payment'     => 'required|string',
        ]);

        // Cek jika memilih opsi nama samaran (Anonim)
        if ($request->has('anonim')) {
            $validated['nama'] = 'Anonim';
        }

        // 2. LOGIKA UTAMA: Simpan data donasi baru ke database
        // Pastikan nama kolom di bawah ini sesuai dengan nama kolom di migrasi tabel donations Anda
        $donation = Donation::create([
            'campaign_id' => $validated['campaign_id'],
            'nominal'     => $validated['nominal'],
            'nama'        => $validated['nama'],
            'email'       => $validated['email'],
            'doa'         => $validated['doa'],
            'payment'     => $validated['payment'],
        ]);

        // 3. LOGIKA HUBUNGAN: Update nilai 'collected_donation' di tabel campaign
        // Mengambil data campaign terkait
        $campaign = Campaign::find($validated['campaign_id']);
        
        if ($campaign) {
            // Menambahkan nominal donasi baru ke nilai terkumpul yang sudah ada sebelumnya
            $campaign->collected_donation = $campaign->collected_donation + $validated['nominal'];
            $campaign->save(); // Simpan perubahan ke tabel campaigns di database
        }

        // Kembali ke halaman form dengan notifikasi sukses
        return back()->with('success', 'Terima kasih banyak! Donasi Anda berhasil disimpan dan disalurkan ke program ini.');
    }
}