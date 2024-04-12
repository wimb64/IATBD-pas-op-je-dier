<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertResponseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'uploadProfilePicture'])->name('profile.uploadProfilePicture');
});

Route::middleware('auth')->group(function () {
    Route::get('/pets/{pet}/respond', [PetController::class, 'respond'])->name('pets.respond');
    Route::get('/my-pets', [PetController::class, 'myPets'])->name('pets.my-pets');

    Route::resource('pets', PetController::class);
});

Route::middleware('auth')->group(function() {
    Route::get('/advert-responses/outbox', [AdvertResponseController::class, 'outbox'])->name('advert-responses.outbox');
    Route::resource('advert-responses', AdvertResponseController::class);
});

require __DIR__ . '/auth.php';
