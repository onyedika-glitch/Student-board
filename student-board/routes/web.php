<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    HomeController,
    AnnouncementController,
    EventController,
    TimetableController,
    ResultController,
    UserController,
    ProfileController,
};

/*
|--------------------------------------------------------------------------
| Public Routes (accessible to everyone)
|--------------------------------------------------------------------------
*/

// Homepage (dashboard-style overview)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Announcements
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Timetables
Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');

// Results (students must log in to see their results)
Route::middleware('auth')->get('/results', [ResultController::class, 'index'])->name('results.index');


/*
|--------------------------------------------------------------------------
| Authenticated User Routes (via Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
/*
|--------------------------------------------------------------------------
| Admin Routes (restricted to admins only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'can:access-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/', 'dashboard')->name('dashboard');

        Route::resource('announcements', AnnouncementController::class)
            ->except(['index', 'show']);

        Route::resource('events', EventController::class)
            ->except(['index', 'show']);

        Route::resource('timetables', TimetableController::class)
            ->only(['create', 'store', 'destroy']);

        Route::resource('results', ResultController::class)
            ->only(['index', 'store', 'destroy']);
    });

/*
|--------------------------------------------------------------------------
| Breeze Authentication Routes
|--------------------------------------------------------------------------
|
| These include /login, /register, /forgot-password, etc.
| Installed automatically by Breeze.
|
*/
require __DIR__.'/auth.php';
