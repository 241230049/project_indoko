<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);

Route::resource('campaign', CampaignController::class);

