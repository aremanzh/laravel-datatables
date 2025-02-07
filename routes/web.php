<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController; 

Route::resource('/peserta', PesertaController::class)
->parameters(['peserta' => 'peserta'])
->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);  
Route::get('/peserta/get-client-data', [PesertaController::class, 'getClientData'])->name('peserta.getClientData');
Route::get('/peserta/get-server-data', [PesertaController::class, 'getServerData'])->name('peserta.getServerData');