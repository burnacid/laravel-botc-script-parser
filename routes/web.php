<?php

use App\Http\Controllers\BotcJinxController;
use App\Http\Controllers\BotcRolesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::post('/', [FrontEndController::class, 'process'])->name('home');
Route::get('/nightorder', [FrontEndController::class, 'nightOrder'])->name('nightorder');

Route::get('/jinxes', [FrontEndController::class, 'jinxes'])->name('jinxes');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/botcroles/import', [BotCRolesController::class, 'import'])->name('settings.botcroles.import');
    Route::post('/botcroles/import', [BotCRolesController::class, 'importPost'])->name('settings.botcroles.import');
    Route::get('/botcroles/grep', [BotCRolesController::class, 'grepIcon'])->name('settings.botcroles.grep');

    Route::get('/botcroles', [BotCRolesController::class, 'index'])->name('settings.botcroles');
    Route::get('/botcroles/{botcRole}', [BotCRolesController::class, 'destroy'])->name('settings.botcroles.delete');
    Route::get('/botcroles/{botcRole}/edit', [BotCRolesController::class, 'edit'])->name('settings.botcroles.edit');
    Route::post('/botcroles/{botcRole}/edit', [BotCRolesController::class, 'update'])->name('settings.botcroles.edit');

    Route::get('/botcroles/{botcRole}/image', [BotCRolesController::class, 'getImage'])->name('settings.botcroles.image');

    Route::get('/botcjinx', [BotcJinxController::class, 'index'])->name('settings.botcjinx');
    Route::get('/botcjinx/{role}/{with}', [BotcJinxController::class, 'edit'])->name('settings.botcjinx.edit');
    Route::post('/botcjinx/{role}/{with}', [BotcJinxController::class, 'update'])->name('settings.botcjinx.edit');
});

require __DIR__.'/auth.php';
