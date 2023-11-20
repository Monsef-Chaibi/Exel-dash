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

Route::get('/AddALJUF', [Controller::class, 'AddALJUF'])->name('AddALJUF');

Route::post('/importimage', [Controller::class, 'importimage'])->name('importimage');

Route::get('/ViewData', [Controller::class, 'ViewData'])->name('ViewData');

Route::post('/StoreUser', [Controller::class, 'StoreUser'])->name('StoreUser');

Route::get('/ShowUpdateData', [Controller::class, 'ShowUpdateData'])->name('ShowUpdateData');

Route::get('/deleteuser/{id}', [Controller::class, 'deleteuser'])->name('deleteuser');

Route::put('/edituser/{id}', [Controller::class, 'edituser'])->name('edituser');
});

// Route for user 1 role 0
Route::group(['middleware' => ['checkUserRole:0', 'auth' ]], function () {
    Route::get('/actionA', [Controller::class, 'actionA'])->name('actionA');
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
    Route::get('/pdf',[Controller::class, 'PDF'])->name('pdf');
    Route::post('/Addcolor',[Controller::class, 'Addcolor']);
    Route::get('/editusercontrat',[Controller::class, 'editusercontrat']);
    Route::get('/editportcontrat',[Controller::class, 'editportcontrat']);
    Route::get('/editbrandcontrat',[Controller::class, 'editbrandcontrat']);
    Route::get('/editcolorcontrat',[Controller::class, 'editcolorcontrat']);
    Route::get('/deleteusercontrat/{id}',[Controller::class, 'deleteusercontrat']);
    Route::get('/deleteportcontrat/{id}',[Controller::class, 'deleteportcontrat']);
    Route::get('/deletebrandcontrat/{id}',[Controller::class, 'deletebrandcontrat']);
    Route::get('/deletecolorcontrat/{id}',[Controller::class, 'deletecolorcontrat']);



});
// Route for user 2 role 4
Route::group(['middleware' => ['checkUserRole:4', 'auth' ]], function () {
    Route::get('/actionA1', [Controller::class, 'actionA1'])->name('actionA1');
    Route::get('/ShowForA1/{id}', [Controller::class, 'ShowForA1'])->name('ShowForA1');
    Route::get('/StatusA1/{id}', [Controller::class, 'Status'])->name('Status');
    Route::get('/SemiCheckA1', [Controller::class, 'SemiCheckA1'])->name('SemiCheckA1');
    Route::get('/AddContrat', [Controller::class, 'AddContrat'])->name('AddContrat');
    Route::post('/AddPort', [Controller::class, 'AddPort'])->name('AddPort');
    Route::post('/AddBrand', [Controller::class, 'AddBrand'])->name('AddBrand');
    Route::post('/AddContratUser', [Controller::class, 'AddContratUser'])->name('AddContratUser');
    Route::get('/getUserData/{id}',[Controller::class, 'getUserData']);
    Route::get('/getBrandData/{id}',[Controller::class, 'showBrandInfo']);
    Route::get('/generate-pdf',[Controller::class, 'generatePDF']);
    Route::get('/pdf',[Controller::class, 'PDF'])->name('pdf');
    Route::post('/Addcolor',[Controller::class, 'Addcolor']);
    Route::get('/editusercontrat',[Controller::class, 'editusercontrat']);
    Route::get('/editportcontrat',[Controller::class, 'editportcontrat']);
    Route::get('/editbrandcontrat',[Controller::class, 'editbrandcontrat']);
    Route::get('/editcolorcontrat',[Controller::class, 'editcolorcontrat']);
    Route::get('/deleteusercontrat/{id}',[Controller::class, 'deleteusercontrat']);
    Route::get('/deleteportcontrat/{id}',[Controller::class, 'deleteportcontrat']);
    Route::get('/deletebrandcontrat/{id}',[Controller::class, 'deletebrandcontrat']);
    Route::get('/deletecolorcontrat/{id}',[Controller::class, 'deletecolorcontrat']);
    Route::get('/Noncheck', [Controller::class, 'Noncheck'])->name('Noncheck');
    Route::get('/NonCheckItems', [Controller::class, 'NonCheckItems'])->name('NonCheckItems');



});


// Route for user 2 role 2
Route::group(['middleware' => ['checkUserRole:2', 'auth' ]], function () {
    Route::get('/actionB', [Controller::class, 'actionB'])->name('actionB');
    Route::get('/notcheck', [Controller::class, 'notcheck'])->name('notcheck');
    Route::get('/Setcheck', [Controller::class, 'Setcheck'])->name('Setcheck');
    Route::get('/ShowForB/{id}', [Controller::class, 'ShowForB'])->name('ShowForB');
    Route::get('/SemiCopie', [Controller::class, 'SemiCopie'])->name('SemiCopie');
    Route::get('/export-data/{conditionValue}', [Controller::class, 'export'])->name('export.data');
    Route::get('/SemiExport', [Controller::class, 'SemiExport'])->name('SemiExport');

});

// Route for user 3 role 3

Route::group(['middleware' => ['checkUserRole:3', 'auth' ]], function () {
    Route::get('/dashboardC', [Controller::class, 'dashboardC'])->name('dashboardC');
    Route::get('/getlast', [Controller::class, 'getlast'])->name('getlast');
    Route::get('/notchecktr', [Controller::class, 'notchecktr'])->name('notchecktr');
    Route::get('/checktr', [Controller::class, 'notchecktr'])->name('checktr');

});

// Route for user 5 role 5 Upholder

Route::group(['middleware' => ['checkUserRole:5', 'auth' ]], function () {
    Route::post('/importup', [Controller::class, 'import']);

});

Route::get('/SowChekUser/{boldoc}', [Controller::class, 'SowChekUser'])->middleware(['auth'])->name('SowChekUser');


Route::get('/SowChekUserA1/{boldoc}', [Controller::class, 'SowChekUserA1'])->middleware(['auth'])->name('SowChekUserA1');

Route::get('/SowChekUserA/{boldoc}', [Controller::class, 'SowChekUserA'])->middleware(['auth'])->name('SowChekUserA');

Route::get('/test', [Controller::class, 'test'])->middleware(['auth'])->name('test');

Route::get('/getdata/{id}', [Controller::class, 'getdata'])->middleware(['auth'])->name('getdata');

Route::get('/Showsetuser/{nameuser}/{boldoc}/{dateset}', [Controller::class, 'Showsetuser'])->middleware(['auth'])->name('Showsetuser');

Route::get('/ShowsetuserA1/{user2}/{boldoc}/{dateuser2}', [Controller::class, 'ShowsetuserA1'])->middleware(['auth'])->name('ShowsetuserA1');



Route::get('/get-live-value', [Controller::class, 'getLiveValue'])->name('live.value');

Route::get('/NumNonCheck', [Controller::class, 'NumNonCheck'])->name('NumNonCheck');
