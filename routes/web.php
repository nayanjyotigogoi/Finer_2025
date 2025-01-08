<?php


use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PressReleaseController;

use App\Http\Controllers\DirectorProfilesController;
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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

//Route for home section
Route::get('/home', [HomeController::class, 'index'])->name('home');

//banner controller route admin routes
Route::prefix('admin')->group(function () {
    Route::get('/banners', [BannerController::class, 'view'])->name('banners.view');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
});

//routes for events

// Route to view all events
Route::get('events', [EventController::class, 'view'])->name('events.view');

// Route to display the form for adding a new event
Route::get('events/create', [EventController::class, 'create'])->name('events.create');

// Route to store a new event in the database
Route::post('events', [EventController::class, 'store'])->name('events.store');

// Route to display the form for editing an existing event
Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route to update an event's details in the database
Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');

// Route to delete an event from the database
Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Routes for Press Release Management
Route::prefix('admin/press_releases')->group(function () {
    Route::get('/', [PressReleaseController::class, 'index'])->name('press_releases.view');
    Route::get('/create', [PressReleaseController::class, 'create'])->name('press_releases.create');
    Route::post('/store', [PressReleaseController::class, 'store'])->name('press_releases.store');
    Route::get('/edit/{id}', [PressReleaseController::class, 'edit'])->name('press_releases.edit');
    Route::put('/update/{id}', [PressReleaseController::class, 'update'])->name('press_releases.update');
    Route::delete('/destroy/{id}', [PressReleaseController::class, 'destroy'])->name('press_releases.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/director-profiles', [DirectorProfilesController::class, 'index'])->name('director_profiles.view');
    Route::get('/director-profiles/create', [DirectorProfilesController::class, 'create'])->name('director_profiles.create');
    Route::post('/director-profiles', [DirectorProfilesController::class, 'store'])->name('director_profiles.store');
    Route::get('/director-profiles/{id}/edit', [DirectorProfilesController::class, 'edit'])->name('director_profiles.edit');
    Route::put('/director-profiles/{id}', [DirectorProfilesController::class, 'update'])->name('director_profiles.update');
    Route::delete('/director-profiles/{id}', [DirectorProfilesController::class, 'destroy'])->name('director_profiles.destroy');
});




