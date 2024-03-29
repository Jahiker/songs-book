<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetlistCategoryController;
use App\Http\Controllers\SetlistController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Setlist;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(SetlistController::class)->group(function () {
    Route::get('/setlist', 'index')->name('setlist');
})->middleware(['auth']);

Route::controller(SetlistCategoryController::class)->group(function () {
    Route::get('/setlist-categories', 'index')->name('setlist-categories');
    Route::get('/setlist-categories/create', 'create')->name('setlist-categories.create');
    Route::post('/setlist-categories/store', 'store')->name('setlist-categories.store');
    Route::get('/setlist-categories/show', 'show')->name('setlist-categories.show');
    Route::get('/setlist-categories/edit', 'edit')->name('setlist-categories.edit');
    Route::put('/setlist-categories/update', 'update')->name('setlist-categories.update');
    Route::post('/setlist-categories/destroy', 'destroy')->name('setlist-categories.destroy');
})->middleware(['auth']);

require __DIR__ . '/auth.php';
