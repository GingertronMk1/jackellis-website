<?php

use App\Http\Controllers\CurriculumVitaeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::redirect('/cv', '/curriculum-vitae');

Route::prefix('/curriculum-vitae')->name('curriculum-vitae.')->group(function () {
    Route::get('/', [CurriculumVitaeController::class, 'show'])->name('show');
    Route::get('/markdown', [CurriculumVitaeController::class, 'downloadMarkdown'])->name('download-markdown');
    Route::get('/pdf', [CurriculumVitaeController::class, 'downloadPdf'])->name('download-pdf');
});

require __DIR__.'/auth.php';
