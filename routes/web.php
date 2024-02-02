<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecitController;
use App\Http\Controllers\DestinationController;
use App\Models\Recit;
use Illuminate\Support\Facades\Route;






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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/ajoutRecit', [DestinationController::class, 'index'])->name('ajoutRecit');
    // Route::post('/ajoutRecit', [RecitController::class, 'store_recit'])->name('recit.store');
});
Route::get('/', [RecitController::class, 'filterPosts'])->name('filterPosts');
Route::get('/ajoutRecit', [DestinationController::class, 'index'])->name('ajoutRecit');
Route::post('/ajoutRecit', [RecitController::class, 'store_recit'])->name('recit.store');
Route::get('/filter-posts', [RecitController::class, 'filterPosts'])->name('filterPosts');


require __DIR__.'/auth.php';
    