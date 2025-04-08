<?php
namespace App\Http\Middleware;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoriesController;


// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// noaccess rout 
Route::get('/noaccess', function () {
    return view('noaccess');
})->name('youeNotAdmin');


Route::get('/dashboard', [MovieController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Settings
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Admin middelware
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/penal', [MovieController::class, 'admin'])->name('admin.penal');
        Route::get('/admin/{id}/detail', [MovieController::class, 'adminDetail'])->name('admin.detail');
        Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
        Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
        Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
        // Casts selectin
        Route::post('/movies/create/actor', [CastController::class, 'createActor'])->name('cast.store');
        Route::put('/casts/{id}', [CastController::class, 'update'])->name('casts.update');
        Route::delete('/casts/{id}', [CastController::class, 'destroy'])->name('casts.destroy');

        // Categories (Types)
        Route::post('/movies/create/type', [CategoriesController::class, 'createType'])->name('type.store');
        Route::put('/type/{id}', [CategoriesController::class, 'update'])->name('type.update');
        Route::delete('/type/{id}', [CategoriesController::class, 'destroy'])->name('type.destroy');
    });
    

    Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
    Route::get('/movies/{id}/play', [MovieController::class, 'play'])->name('movies.play');


});

require __DIR__.'/auth.php';
