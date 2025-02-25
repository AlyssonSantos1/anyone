<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\LoginController;


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

//Login authenticator 
Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('sucess');
Route::get('/executive-dashboard', [LoginController::class, 'executiveDashboard'])->name('executive.dashboard');
Route::get('/manager-dashboard', [LoginController::class, 'managerDashboard'])->name('manager.dashboard');
Route::get('/internaladvisor-dashboard', [LoginController::class, 'internalAdvisorDashboard'])->name('internaladvisor.dashboard');
Route::get('/associate-dashboard', [LoginController::class, 'associateDashboard'])->name('associate.dashboard');
Route::get('/user-dashboard', [LoginController::class, 'userDashboard'])->name('user.dashboard');
//End of Login




//Executives routesauthenticate with middleware
Route::group(['middleware' =>['executive']], function(){
Route::get('/executives/create',[ExecutiveController::class, 'create'])->name('executive.create');
Route::post('/executives',[ExecutiveController::class, 'store']);
Route::get('/executive/editing/{id}',[ExecutiveController::class, 'edition'])->name('executive.editing');
Route::put('/edit/{id}',[ExecutiveController::class, 'changed']);
Route::get('/executive/project-build',[ExecutiveController::class, 'newproject'])->name('executive-build');
Route::post('/executive-build',[ExecutiveController::class, 'congrats']);

Route::get('/executives/new',[ExecutiveController::class, 'tower'])->name('build');
Route::post('/built',[ExecutiveController::class, 'construction']);

Route::get('executive/{squad_id}/{project_id}',[ExecutiveController::class, 'getReviewAuthors'])->name('executive.review-authors');
});
//End of Executive

// Managers Route
Route::group(['middleware' =>['manager']], function(){
Route::get('/manager/trade-member/{id}',[ManagerController::class, 'traded'])->name('temporarytrade');
Route::put('/trade/{id}',[ManagerController::class, 'trading']);
Route::get('/seeallreviews/{projectId}/{userId}',[ManagerController::class, 'catch'])->name('manager-all');
});
//End of Managers Area 

// Routes by Internal Advisorss can acess by  in the Company
Route::group(['middleware' =>['internaladvisor']], function(){
Route::get('/advisors/give-review/{projectId}',[AdvisorController::class, 'newreview'])->name('gave-review');
Route::post('/advisors/{projectId}',[AdvisorController::class, 'newest'])->name('done-it');
Route::get('/advisors/review-team/{projectId}',[AdvisorController::class, 'target'])->name('see-review');
});
// End of Internal Advisors Space


// Routes Only can acess by Associates in the Company
Route::group(['middleware' =>['associate']], function(){
Route::get('/associates/swap-role/{id}',[AssociatesController::class, 'map'])->name('tradetoadv');
Route::put('/traded/{id}',[AssociatesController::class, 'swapuser']);
Route::get('/associates/review-team',[AssociatesController::class, 'swan'])->name('catch-review');
Route::post('/associates/reviews',[AssociatesController::class, 'glasses'])->name('reviewtheirteam');
});
// End of associates area

// user default space
Route::group(['middleware' =>['user']], function(){
Route::get('/user/delete-review/{id}',[UserController::class, 'trash'])->name('delete-review');
Route::put('/deleted/{id}',[Usercontroller::class, 'turndown']);
Route::get('/user/edit-review/{id}',[UserController::class, 'edited'])->name('editing-review');
Route::put('/edited/{id}',[Usercontroller::class, 'change']);
});
// End of users space












