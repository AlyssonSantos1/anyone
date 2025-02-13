<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;


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


Route::get('/executive/add-users',[ExecutiveController::class, 'newmember']);
Route::post('/executive/added',[ExecutiveController::class, 'sucess'])->name('newuser');
Route::get('/executive/members-edit/{id}',[ExecutiveController::class, 'changed']);
Route::put('/executive/members-edit/{id}',[ExecutiveController::class, 'edition'])->name('memberedited');
Route::get('/executive/project-build',[ExecutiveController::class, 'congrats']);
Route::post('/executive/project-build',[ExecutiveController::class, 'newproject'])->name('projectcreated');
Route::get('/executive/see-everything',[ExecutiveController::class, 'vision']);
// Routes Only can acess by Executives in the Company


Route::get('/manager/trade-member/{id}',[ManagerController::class, 'swapuser']);
Route::put('/manager/trade-member/{id}',[ManagerController::class, 'traded'])->name('trademember');
Route::get('/manager/seeallreviews',[ManagerController::class, 'avaliation'])->name('eachreview');
// Routes Only can acess by Managers in the Company

Route::get('/advisors/give-review',[AdvisorController::class, 'newreview']);
Route::post('/advisors/give-review',[AdvisorController::class, 'newest'])->name('wrote');
Route::get('/advisors/review-team',[AdvisorController::class, 'bird']);
Route::post('/advisors/reviews',[AdvisorController::class, 'pyramids'])->name('reviewssofaround');
// Routes Only can acess by Advisors in the Company

Route::get('/associates/swap-role/{id}',[AssociatesController::class, 'greatest']);
Route::post('/associates/swap-role/{id}',[AssociatesController::class, 'swapuser'])->name('tradetoadvisor');
Route::get('/associates/review-team',[AdvisorController::class, 'visiondiamond']);
Route::post('/associates/reviews',[AdvisorController::class, 'visiondiamond'])->name('reviewssofaround');
// Routes Only can acess by Associates in the Company

Route::get('/user/delete-review',[UserController::class, 'trash']);
Route::get('/user/edit-review',[UserController::class, 'change']);
Route::put('/user/edited-review',[Usercontroller::class, 'change'])->name('edited-review');
// Routes Only can acess by Users in the Company












