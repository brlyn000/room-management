<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomRequestController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('rooms', RoomController::class);
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

Route::resource('users', UserController::class);

Route::get('/room-requests', [RoomRequestController::class, 'index'])
->middleware(['auth', 'verified'])
->name('room-requests.index');
Route::post('/room-requests', [RoomRequestController::class, 'store']) ->middleware(['auth', 'verified'])->name('room-requests.store');
Route::get('/request-access/{room_id}', [RoomController::class, 'requestAccess'])->name('request-access');
Route::delete('/room-requests/{roomRequest}', [RoomRequestController::class, 'destroy'])->name('room-requests.destroy');
Route::post('room-requests/{roomRequest}/accept', [RoomRequestController::class, 'accept'])->name('room-requests.accept');
Route::put('/room-requests/{roomRequest}/edit-status', [RoomRequestController::class, 'editStatus'])->name('room-requests.edit-status');

require __DIR__.'/auth.php';
