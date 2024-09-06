<?php

use App\Http\Controllers\DetallesOrdenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Livewire\Buscador;
use Illuminate\Support\Facades\Route;



Route::get('/',[DetallesOrdenController::class,'index'])->name('home');
Route::Post('/create',[DetallesOrdenController::class,'store'])->name('store');
Route::get('/contacto',Buscador::class)->name('contact');



// Route::get('/articulos', [PostController::class,"index"])->name('articulos.index');
// Route::get('/articulos/create',[PostController::class,"create"])->name('articulos.create');
// Route::post('/articulos', [PostController::class,"store"])->name('articulos.store');
// Route::get('/articulos/{articulo}',[PostController::class,"show"])->name('articulos.show');
// Route::get('/articulos/{articulo}/edit',[PostController::class,"edit"])->name('articulos.edit');
// Route::patch('/articulos/{articulo}',[PostController::class,"update"])->name('articulos.update');
// Route::delete('/articulos/{articulo}',[PostController::class,"destroy"])->name('articulos.destroy');

Route::resource('articulos',PostController::class,
[
    'names' => 'articulos',
    'parameters' => [
        'articulos' => 'articulo',
    ]
    ])->middleware('auth');

Route::view('/login', 'login')->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
