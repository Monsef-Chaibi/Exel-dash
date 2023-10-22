<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'Role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/import', [Controller::class, 'import']);

Route::get('/adduser', [Controller::class, 'adduser'])->middleware(['auth', 'Role'])->name('adduser');

Route::get('/Alluser', [Controller::class, 'alluser'])->middleware(['auth', 'Role'])->name('Alluser');

Route::get('/AddData', [Controller::class, 'AddData'])->middleware(['auth', 'Role'])->name('AddData');

Route::get('/ViewData', [Controller::class, 'ViewData'])->middleware(['auth', 'Role'])->name('ViewData');

Route::post('/StoreUser', [Controller::class, 'StoreUser'])->middleware(['auth', 'Role'])->name('StoreUser');

Route::get('/action', [Controller::class, 'action'])->name('action');
