<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdCardController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('idcards', IdCardController::class);
Route::get('/import', [ImportExcelController::class, 'index'])->name('import.index');
Route::post('/import', [ImportExcelController::class, 'store'])->name('import.store');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/idcards/import', [IdCardController::class, 'import'])
    ->name('idcards.import');