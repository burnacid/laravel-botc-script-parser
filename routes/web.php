<?php

use App\Http\Controllers\BotcRolesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::post('/', [FrontEndController::class, 'process'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/botcroles/import', [BotCRolesController::class, 'import'])->name('botcroles.import');
    Route::post('/botcroles/import', [BotCRolesController::class, 'importPost'])->name('botcroles.import');

    Route::get('/botcroles/grep', [BotCRolesController::class, 'grepIcon'])->name('botcroles.grep');
});

require __DIR__.'/auth.php';
