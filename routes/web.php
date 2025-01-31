<?php
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\PastPresidentController;
use App\Http\Controllers\DirectorProfilesController;
use App\Http\Controllers\DirectorsPresidentsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
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

// Route::get('/test', function () {
//     return view('welcome');
// });

//login route

// Route::get('/login', function () {
//     return view('admin.login');
// });

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->name('admin.logout');

//Route for home section
Route::get('/', [HomeController::class, 'index'])->name('home');


//ADMIN routes

Route::middleware(['auth', 'preventBackHistory'])->group(function(){
    //admin routes
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');

    
//banner controller route admin routes
Route::prefix('admin')->group(function () {
    Route::get('/banners', [BannerController::class, 'view'])->name('banners.view');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');

    // Route to export banners data in CSV format, pdf format
    Route::get('/banners/export/csv', [BannerController::class, 'exportCsv'])->name('banners.export.csv');
    Route::get('/banners/export/pdf', [BannerController::class, 'exportPdf'])->name('banners.export.pdf');

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
// Route to view all events with filter functionality
Route::get('events', [EventController::class, 'view'])->name('events.view');


// Routes for Press Release Management
Route::prefix('admin/press_releases')->group(function () {
    Route::get('/', [PressReleaseController::class, 'index'])->name('press_releases.view');
    Route::get('/create', [PressReleaseController::class, 'create'])->name('press_releases.create');
    Route::post('/store', [PressReleaseController::class, 'store'])->name('press_releases.store');
    Route::get('/edit/{id}', [PressReleaseController::class, 'edit'])->name('press_releases.edit');
    Route::put('/update/{id}', [PressReleaseController::class, 'update'])->name('press_releases.update');
    Route::delete('/destroy/{id}', [PressReleaseController::class, 'destroy'])->name('press_releases.destroy');
    // Route::get('/', [PressReleaseController::class, 'view'])->name('press_releases.view');
});

//route for the director profiles 
Route::prefix('admin')->group(function () {
    Route::get('/director-profiles', [DirectorProfilesController::class, 'index'])->name('director_profiles.view');
    Route::get('/director-profiles/create', [DirectorProfilesController::class, 'create'])->name('director_profiles.create');
    Route::post('/director-profiles', [DirectorProfilesController::class, 'store'])->name('director_profiles.store');
    Route::get('/director-profiles/{id}/edit', [DirectorProfilesController::class, 'edit'])->name('director_profiles.edit');
    Route::put('/director-profiles/{id}', [DirectorProfilesController::class, 'update'])->name('director_profiles.update');
    Route::delete('/director-profiles/{id}', [DirectorProfilesController::class, 'destroy'])->name('director_profiles.destroy');
});


//route for past preidents
Route::get('past_presidents', [PastPresidentController::class, 'view'])->name('past_presidents.view');
Route::get('past_presidents/create', [PastPresidentController::class, 'create'])->name('past_presidents.create');
Route::post('past_presidents', [PastPresidentController::class, 'store'])->name('past_presidents.store');
Route::get('past_presidents/{past_president}/edit', [PastPresidentController::class, 'edit'])->name('past_presidents.edit');
Route::put('past_presidents/{past_president}', [PastPresidentController::class, 'update'])->name('past_presidents.update');
Route::delete('past_presidents/{past_president}', [PastPresidentController::class, 'destroy'])->name('past_presidents.destroy');

//route for magazines
Route::prefix('admin')->group(function () {
    // Route to view magazines
    Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines.view');

    // Route to create a magazine
    Route::get('/magazines/create', [MagazineController::class, 'create'])->name('magazines.create');

    // Route to store a new magazine
    Route::post('/magazines', [MagazineController::class, 'store'])->name('magazines.store');

    // Route to edit a magazine
    Route::get('/magazines/edit/{id}', [MagazineController::class, 'edit'])->name('magazines.edit');

    // Route to update a magazine
    Route::put('/magazines/update/{id}', [MagazineController::class, 'update'])->name('magazines.update');

    // Route to delete a magazine
    Route::delete('/magazines/delete/{id}', [MagazineController::class, 'destroy'])->name('magazines.destroy');
});

});

Route::get('/become-a-member', function () {
    return view('become_member'); // Assuming the Blade view is 'resources/views/become_member.blade.php'
});

//route for the about in the navbar.
// About Us page
Route::view('/about-us', 'about.aboutus');

// Finer Foundation page
Route::view('/finer-foundation', 'about.finer_foundation');

// route for board of directors in the Directors & Past Presidents page 


//route for the Past Presidents section in the directors_presidents page
Route::get('/directors-&-past-presidents', [PastPresidentController::class, 'past_presidents']);


//routes for events page

Route::get('/upcoming-events', [EventController::class, 'upcoming_events'])->name('events.upcoming');

Route::get('/past-events', [EventController::class, 'past_events'])->name('events.past');

// Route to display the press release.
// view_press_releases
Route::get('/press-releases', [PressReleaseController::class, 'view_press_releases']);

//route for contact us form in the navbar
Route::get('/Contact-Us', function () {
    return view('Contact_us'); 
});

Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');


//route for magazine 
Route::get('/magazines', [MagazineController::class, 'magazines']);

Route::get('/under-construction', function () {
    return view('under_construction'); // Assuming the Blade file is named 'under-construction.blade.php'
});




