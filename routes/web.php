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

//Route For Admin role 1
Route::group(['middleware' => ['checkUserRole:1', 'auth' ]], function () {

Route::post('/import', [Controller::class, 'import']);

Route::get('/adduser', [Controller::class, 'adduser'])->name('adduser');

Route::get('/Alluser', [Controller::class, 'alluser'])->name('Alluser');

Route::get('/AddData', [Controller::class, 'AddData'])->name('AddData');

Route::get('/ViewData', [Controller::class, 'ViewData'])->name('ViewData');

Route::post('/StoreUser', [Controller::class, 'StoreUser'])->name('StoreUser');

Route::get('/ShowUpdateData', [Controller::class, 'ShowUpdateData'])->name('ShowUpdateData');

Route::get('/deleteuser/{id}', [Controller::class, 'deleteuser'])->name('deleteuser');

Route::put('/edituser/{id}', [Controller::class, 'edituser'])->name('edituser');
});

// Route for user 1 role 0
Route::group(['middleware' => ['checkUserRole:0', 'auth' ]], function () {
    Route::get('/action', [Controller::class, 'action'])->name('action');
    Route::get('/Show/{id}', [Controller::class, 'Show'])->name('Show');
    Route::get('/Status/{id}', [Controller::class, 'Status'])->name('Status');
    Route::get('/SemiCheck', [Controller::class, 'SemiCheck'])->name('SemiCheck');
    Route::get('/AddContrat', [Controller::class, 'AddContrat'])->name('AddContrat');
    Route::post('/AddPort', [Controller::class, 'AddPort'])->name('AddPort');
    Route::post('/AddBrand', [Controller::class, 'AddBrand'])->name('AddBrand');
    Route::post('/AddContratUser', [Controller::class, 'AddContratUser'])->name('AddContratUser');
    Route::get('/getUserData/{id}',[Controller::class, 'getUserData']);
    Route::get('/getBrandData/{id}',[Controller::class, 'showBrandInfo']);
    Route::get('/generate-pdf',[Controller::class, 'generatePDF']);
    Route::get('/pdf',[Controller::class, 'PDF']);
    Route::post('/Addcolor',[Controller::class, 'Addcolor']);
    Route::get('/editusercontrat',[Controller::class, 'editusercontrat']);
    Route::get('/editportcontrat',[Controller::class, 'editportcontrat']);


});


// Route for user 2 role 2
Route::group(['middleware' => ['checkUserRole:2', 'auth' ]], function () {
    Route::get('/actionB', [Controller::class, 'actionB'])->name('actionB');
    Route::get('/notcheck', [Controller::class, 'notcheck'])->name('notcheck');
    Route::get('/ShowForB/{id}', [Controller::class, 'ShowForB'])->name('ShowForB');
    Route::get('/SemiCopie', [Controller::class, 'SemiCopie'])->name('SemiCopie');
    Route::get('/export-data/{conditionValue}', [Controller::class, 'export'])->name('export.data');
    Route::get('/SemiExport', [Controller::class, 'SemiExport'])->name('SemiExport');

});

Route::get('/SowChekUser/{boldoc}', [Controller::class, 'SowChekUser'])->name('SowChekUser');

Route::get('/test', [Controller::class, 'test'])->middleware(['auth'])->name('test');

Route::get('/getdata/{id}', [Controller::class, 'getdata'])->middleware(['auth'])->name('getdata');

Route::get('/Showsetuser/{nameuser}/{boldoc}/{dateset}', [Controller::class, 'Showsetuser'])->middleware(['auth'])->name('Showsetuser');



Route::get('/get-live-value', [Controller::class, 'getLiveValue'])->name('live.value');
