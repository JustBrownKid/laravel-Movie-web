<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard', [MovieController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



// Route::get('/admin/penal',  function () {
//     return view('adminDashboard');
// })->name('admin.penal');






Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');


    Route::get('/admin/penal', [MovieController::class, 'admin'])->name('admin.penal');
Route::get('/admin/{id}/detail', [MovieController::class, 'adminDetail'])->name('admin.detail');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{id}/play', [MovieController::class, 'play'])->name('movies.play');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');


Route::post('/movies/create/actor', [CastController::class, 'createActor'])->name('cast.store');
Route::delete('/casts/{id}', [CastController::class, 'destroy'])->name('casts.destroy');
Route::put('/casts/{id}', [CastController::class, 'update'])->name('casts.update');

Route::post('/movies/create/type', [CategoriesController::class, 'createType'])->name('type.store');
Route::delete('/type/{id}', [CategoriesController::class, 'destroy'])->name('type.destroy');
Route::put('/type/{id}', [CategoriesController::class, 'update'])->name('type.update');

});


require __DIR__.'/auth.php';
