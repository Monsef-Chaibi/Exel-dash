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

Route::get('/action', [Controller::class, 'action'])->middleware(['auth'])->name('action');

Route::get('/actionB', [Controller::class, 'actionB'])->middleware(['auth'])->name('actionB');

Route::get('/test', [Controller::class, 'test'])->middleware(['auth'])->name('test');

Route::get('/Show/{id}', [Controller::class, 'Show'])->middleware(['auth'])->name('Show');

Route::get('/ShowForB/{id}', [Controller::class, 'ShowForB'])->middleware(['auth'])->name('ShowForB');

Route::get('/Status/{id}', [Controller::class, 'Status'])->middleware(['auth'])->name('Status');

Route::get('/SemiCheck', [Controller::class, 'SemiCheck'])->middleware(['auth'])->name('SemiCheck');

Route::get('/SemiCopie', [Controller::class, 'SemiCopie'])->middleware(['auth'])->name('SemiCopie');

Route::get('/getdata/{id}', [Controller::class, 'getdata'])->middleware(['auth'])->name('getdata');

Route::get('/Showsetuser/{nameuser}/{boldoc}/{dateset}', [Controller::class, 'Showsetuser'])->middleware(['auth'])->name('Showsetuser');

Route::get('/SowChekUser/{boldoc}', [Controller::class, 'SowChekUser'])->middleware(['auth'])->name('SowChekUser');

Route::get('/ShowUpdateData', [Controller::class, 'ShowUpdateData'])->middleware(['auth'])->name('ShowUpdateData');

Route::get('/export-data/{conditionValue}', [Controller::class, 'export'])->middleware(['auth'])->name('export.data');

Route::get('/SemiExport', [Controller::class, 'SemiExport'])->middleware(['auth'])->name('SemiExport');

