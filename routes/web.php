<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController; // Added
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', [MemberController::class, 'index'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated users admin only
Route::middleware(['auth', 'admin'])->group(function () {

    // Member Management
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');  // Add this line!
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::get('/members/{member}/destroy', [MemberController::class, 'destroyConfirm'])->name('members.destroyConfirm');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');


    // Event Management
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/{event}/destroy', [EventController::class, 'destroyConfirm'])->name('events.destroyConfirm');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

}); // <-- THIS closes the admin middleware group

// Authenticated users general profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
