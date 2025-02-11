<?php

use Illuminate\Support\Facades\Route;
use App\http\ExecutiveController;
use App\http\AdvisorController;
use App\http\AssociatesController;
use App\http\ManagerController;
use App\http\UserCont;


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
    return view('welcome');
});

Route::get('/',[ExecutiveController::class, 'index']);
// Route of Index

Route::get('/executive/add-users',[ExecutiveController::class, 'newmember']);
Route::post('/executive/add-users',[ExecutiveController::class, 'newmember'])->name('newuser');
Route::get('/executive/members-edit/{id}',[ExecutiveController::class, 'edit']);
Route::put('/executive/members-edited/{id}',[ExecutiveController::class, 'edit'])->name('memberedited');
Route::get('/executive/project-build',[ExecutiveController::class, 'newproject']);
Route::post('/executive/project-build',[ExecutiveController::class, 'newproject'])->name('buildproject');
Route::get('/executive/see-everything',[ExecutiveController::class, 'vision'])->name('vision360');
// Routes Only can acess by Executives in the Company

Route::get('/manager/trade-member/{id}',[ManagerController::class, 'swapuser']);
Route::put('/manager/trade-member/{id}',[ManagerController::class, 'swapuser'])->name('trademember');
Route::get('/manager/seeallreviews',[ManagerController::class, 'avaliation']);
// Routes Only can acess by Managers in the Company

Route::get('/advisors/give-review',[AdvisorController::class, 'newreview']);
Route::post('/advisors/give-review',[AdvisorController::class, 'newreview'])->name('newestreview');
Route::get('/advisors/edit-review',[AdvisorController::class, 'avaliation'])->name('reviewedited');
// Routes Only can acess by Advisors in the Company

Route::get('/associates/swap-role',[AssociatesController::class, 'swapuser']);
Route::post('/associates/swap-role',[AssociatesController::class, 'swapuser'])->name('tradeforrole');
Route::get('/advisors/edit-review',[AssociatesController::class, 'avaliation'])->name('reviewedited');
// Routes Only can acess by Associates in the Company

Route::get('/user/swap-role',[UserController::class, 'trash']);
Route::get('/user/swap-role',[UserController::class, 'change']);
Route::put('/user/swap-role',[Usercontroller::class, 'change'])->name('edited-review');
// Routes Only can acess by Users in the Company










