<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DocumentationFileController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::resource('campaign', CampaignController::class);

Route::get('donasi/{campaign_id?}', [DonationController::class, 'index'])->name('donasi.index');
Route::post('donasi', [DonationController::class, 'store'])->name('donasi.store');

Route::get('/documentations', [DocumentationFileController::class, 'index']);
Route::post('/documentations', [DocumentationFileController::class, 'store']);