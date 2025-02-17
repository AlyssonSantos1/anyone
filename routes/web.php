<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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


Route::get('/login', [LoginController::class, 'loginform'])->name('login');
Route::post('/login', [LoginController::class, 'loginok'])->name('loginsucess');



Route::get('/executives/create',[ExecutiveController::class, 'create']);
Route::post('/executives',[ExecutiveController::class, 'store']);
Route::get('/executive/editing/{id}',[ExecutiveController::class, 'edition']);
Route::put('/executive/edited/{id}',[ExecutiveController::class, 'changed'])->name('memberedited');
Route::get('/executive/project-build',[ExecutiveController::class, 'newproject']);
Route::post('/executive/project-build',[ExecutiveController::class, 'congrats'])->name('projectcreated');
Route::get('/executive/see-everything',[ExecutiveController::class, 'vision']);
// Routes Only can acess by Executives in the Company


Route::get('/manager/trade-member/{id}',[ManagerController::class, 'swapuser']);
Route::put('/manager/trade-member/{id}',[ManagerController::class, 'traded'])->name('trademember');
Route::get('/manager/seeallreviews',[ManagerController::class, 'avaliation']);
// Routes Only can acess by Managers in the Company

Route::get('/advisors/give-review',[AdvisorController::class, 'newreview']);
Route::post('/advisors/give-review',[AdvisorController::class, 'newest'])->name('wrote');
Route::get('/advisors/review-team',[AdvisorController::class, 'pyramids']);
Route::get('/advisors/review-team',[AdvisorController::class, 'target'])->name('everything');
// Routes Only can acess by Advisors in the Company

Route::get('/associates/swap-role/{id}',[AssociatesController::class, 'swapuser']);
Route::post('/associates/swap-role/{id}',[AssociatesController::class, 'greatest'])->name('tradetoadvisor');
Route::get('/associates/review-team',[AssociatesController::class, 'swan']);
Route::post('/associates/reviews',[AssociatesController::class, 'glasses'])->name('reviewssofaround');
// Routes Only can acess by Associates in the Company


Route::get('/user/delete-review/',[UserController::class, 'trash']);
Route::put('/user/delete-review',[Usercontroller::class, 'turndown'])->name('Deleted');
Route::get('/user/edit-review/{id}',[UserController::class, 'edited']);
Route::put('/user/edited-review/{id}',[Usercontroller::class, 'change'])->name('editedbyuser');
// Routes Only can acess by Users in the Company












