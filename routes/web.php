<?php

use App\Http\Controllers\CheckinController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InitAppController;
use App\Http\Controllers\NavigatorController;
use App\Http\Controllers\PlaceListController;
use App\Http\Controllers\RandomPlaceController;
use App\Http\Controllers\SavingPlaceController;
use App\Http\Controllers\SkipPlaceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/init', InitAppController::class);

Route::inertia('/', 'Welcome', [
    'user' => auth()->user(),
])->name('home');

Route::get('/favorites', FavoriteController::class);
Route::get('/history', HistoryController::class);

Route::inertia('/information', 'Information');

// Route::get('/information/{user}', function () {
//     return Inertia::render('Information');
// })->name('info');

Route::get('/places', [PlaceListController::class, 'placesList'])->name('main');

Route::inertia('/random', 'RandomPlace')->name('random');

Route::post('/navigator', SavingPlaceController::class)->name('save-place');
Route::get('/navigator', NavigatorController::class)->name('navigator');
Route::post('/checkin', CheckinController::class)->name('checkin');
Route::get('/skip', SkipPlaceController::class)->name('skip');

require __DIR__.'/auth.php';
