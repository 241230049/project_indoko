<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Donasi untuk korban banjir',
            'target_donation' => 1000000,
            'collected_donation' => 250000,
            'deadline' => '2026-12-31',
        ]);

        Campaign::create([
            'title' => 'Bantu Korban Gempa',
            'description' => 'Donasi untuk korban gempa',
            'target_donation' => 2000000,
            'collected_donation' => 250000,
            'deadline' => '2026-12-31',
        ]);
    }
}
