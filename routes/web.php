<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('home.houses');
})->name('home');

Route::get('search', function () {
    return view('search_practice');
});


// landlord side
Route::middleware(['auth', 'role:landlord'])->group(function () {
    Route::get('/landlord/properties/create', [PropertyController::class, 'create'])->name('landlord.properties.create');
    Route::post('/landlord/properties', [PropertyController::class, 'store'])->name('landlord.properties.store');
});

Route::get('/landlord/properties', [PropertyController::class, 'index'])->name('landlord.properties.index');



Route::get('/home', function () {
    return view('home.house_view');
})->middleware(['auth', 'verified'])->name('house_view');

Route::get('/Login_Register', function () {
    return view('home.Login_Register');
})->name('Login_Register');


Route::get('/how-it-works', function () {
    return view('home.how-it-works');
})->name('how-it-works');

Route::get('/contact_us', function () {
    return view('home.contact_us');
})->name('contact_us');

Route::get('/landlord', function () {
    return view('landlord.profile');
})->middleware(['auth', 'verified'])->name('landlord');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
