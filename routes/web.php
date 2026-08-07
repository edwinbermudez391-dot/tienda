<?php

use App\Http\Controllers\PrendaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [PrendaController::class, 'index'])->name('prendas.index');
Route::get('/prendas/{prenda}', [PrendaController::class, 'show'])->name('prendas.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/prendas', [PrendaController::class, 'admin'])->name('prendas.admin');
    Route::get('/prendas/crear', [PrendaController::class, 'create'])->name('prendas.create');
    Route::post('/prendas', [PrendaController::class, 'store'])->name('prendas.store');
    Route::get('/prendas/{prenda}/edit', [PrendaController::class, 'edit'])->name('prendas.edit');
    Route::match(['put', 'patch'], '/prendas/{prenda}', [PrendaController::class, 'update'])->name('prendas.update');
    Route::delete('/prendas/{prenda}', [PrendaController::class, 'destroy'])->name('prendas.destroy');
});

Route::get('/ejecutar-seeders', function () {
    try {
        Artisan::call('db:seed', ['--force' => true]);
        return '¡Base de datos poblada con éxito! Ya puedes eliminar esta ruta.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
