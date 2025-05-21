<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboards\DashboardController;
use App\Http\Controllers\dashboards\MonteurDashboardController;
use App\Http\Controllers\dashboards\InkoperDashboardController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


// Monteur and planner route
Route::get('/vehicles', [VehiclesController::class, 'index'])->middleware(['auth', 'role:monteur,planner,klant'])->name('vehicles');
Route::post('/vehicles/{id}/show', [VehiclesController::class, 'show'])->middleware(['auth', 'role:monteur,planner,klant'])->name('vehicle.show');

// Monteur routes
Route::post('/monteur/store', [MonteurDashboardController::class, 'store'])->middleware(['auth', 'role:monteur'])->name('monteur.store');
Route::post('/monteur/chassis', [MonteurDashboardController::class, 'chassis'])->middleware(['auth', 'role:monteur'])->name('monteur.chassis');


// Inkoper routes
Route::post('/inkoper/chassis', [InkoperDashboardController::class, 'chassisNew'])->middleware(['auth', 'role:inkoper'])->name('chassis.new');
Route::put('/inkoper/{id}/chassis', [InkoperDashboardController::class, 'chassisUpdate'])->middleware(['auth', 'role:inkoper'])->name('chassis.update');
Route::post('/inkoper/{id}/chassis', [InkoperDashboardController::class, 'chassisDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('chassis.deleteorrestore');

Route::post('/inkoper/drives', [InkoperDashboardController::class, 'drivesNew'])->middleware(['auth', 'role:inkoper'])->name('drives.new');
Route::put('/inkoper/{id}/drives', [InkoperDashboardController::class, 'drivesUpdate'])->middleware(['auth', 'role:inkoper'])->name('drives.update');
Route::post('/inkoper/{id}/drives', [InkoperDashboardController::class, 'drivesDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('drives.deleteorrestore');

Route::post('/inkoper/seats', [InkoperDashboardController::class, 'seatsNew'])->middleware(['auth', 'role:inkoper'])->name('seats.new');
Route::put('/inkoper/{id}/seats', [InkoperDashboardController::class, 'seatsUpdate'])->middleware(['auth', 'role:inkoper'])->name('seats.update');
Route::post('/inkoper/{id}/seats', [InkoperDashboardController::class, 'seatsDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('seats.deleteorrestore');

Route::post('/inkoper/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsNew'])->middleware(['auth', 'role:inkoper'])->name('steeringWheels.new');
Route::put('/inkoper/{id}/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsUpdate'])->middleware(['auth', 'role:inkoper'])->name('steeringWheels.update');
Route::post('/inkoper/{id}/steeringWheels', [InkoperDashboardController::class, 'steeringWheelsDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('steeringWheels.deleteorrestore');

Route::post('/inkoper/wheels', [InkoperDashboardController::class, 'wheelsNew'])->middleware(['auth', 'role:inkoper'])->name('wheels.new');
Route::put('/inkoper/{id}/wheels', [InkoperDashboardController::class, 'wheelsUpdate'])->middleware(['auth', 'role:inkoper'])->name('wheels.update');
Route::post('/inkoper/{id}/wheels', [InkoperDashboardController::class, 'wheelsDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('wheels.deleteorrestore');

Route::post('/inkoper/suitableChassis', [InkoperDashboardController::class, 'suitableChassisNew'])->middleware(['auth', 'role:inkoper'])->name('suitableChassis.new');
Route::put('/inkoper/{id}/suitableChassis', [InkoperDashboardController::class, 'suitableChassisUpdate'])->middleware(['auth', 'role:inkoper'])->name('suitableChassis.update');
Route::post('/inkoper/{id}/suitableChassis', [InkoperDashboardController::class, 'suitableChassisDeleteOrRestore'])->middleware(['auth', 'role:inkoper'])->name('suitableChassis.deleteorrestore');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
