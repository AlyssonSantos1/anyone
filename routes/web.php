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
    if(!session()->has('user_id')) {
        return redirect()->route('login');
    }
    return redirect()->route('welcome');
});


Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('sucess');
//login



Route::get('/executive-dashboard', [LoginController::class, 'executiveDashboard'])->name('executive.dashboard');
Route::get('/manager-dashboard', [LoginController::class, 'managerDashboard'])->name('manager.dashboard');
Route::get('/internaladvisor-dashboard', [LoginController::class, 'internalAdvisorDashboard'])->name('internaladvisor.dashboard');
Route::get('/associate-dashboard', [LoginController::class, 'associateDashboard'])->name('associate.dashboard');
Route::get('/user-dashboard', [LoginController::class, 'userDashboard'])->name('user.dashboard');
//

//authenticate with middleware
Route::group(['middleware' =>['executive']], function(){
Route::get('/executives/create',[ExecutiveController::class, 'create'])->name('executive.create');
Route::post('/executives',[ExecutiveController::class, 'store']);
Route::get('/executive/editing/{id}',[ExecutiveController::class, 'edition'])->name('executive.editing');
Route::put('/executive/edited/',[ExecutiveController::class, 'changed']);
Route::get('/executive/project-build',[ExecutiveController::class, 'newproject']);
Route::post('/executive/created',[ExecutiveController::class, 'congrats'])->name('created');
Route::get('executive/{squad_id}/review-authors',[ExecutiveController::class, 'getReviewAuthors']);

});


Route::group(['middleware' =>['manager']], function(){
Route::get('/manager/trade-member/{id}',[ManagerController::class, 'traded']);
Route::put('/manager/traded/{id}',[ManagerController::class, 'swapuser'])->name('trademember');
Route::get('/manager/seeallreviews',[ManagerController::class, 'catch']);
Route::get('/manager/seeallreviews',[ManagerController::class, 'found'])->name('everything');
});

// Routes Only can acess by Managers in the Company

Route::group(['middleware' =>['internaladvisor']], function(){
Route::get('/advisors/give-review',[AdvisorController::class, 'newreview']);
Route::post('/advisors/gave',[AdvisorController::class, 'newest'])->name('wrote');
Route::get('/advisors/review-team',[AdvisorController::class, 'target']);
Route::post('/advisors/review-team',[AdvisorController::class, 'pyramids'])->name('everything');
// Routes Only can acess by Advisors in the Company
});

Route::group(['middleware' =>['associate']], function(){
Route::get('/associates/swap-role/{id}',[AssociatesController::class, 'map']);
Route::post('/associates/swap-role/{id}',[AssociatesController::class, 'swapuser'])->name('tradetoadvisor');
Route::get('/associates/review-team',[AssociatesController::class, 'swan']);
Route::post('/associates/reviews',[AssociatesController::class, 'glasses'])->name('reviewssofaround');
});
// Routes Only can acess by Associates in the Company

Route::group(['middleware' =>['user']], function(){
Route::get('/user/delete-review/',[UserController::class, 'trash']);
Route::put('/user/delete-review',[Usercontroller::class, 'turndown'])->name('Deleted');
Route::get('/user/edit-review/',[UserController::class, 'edited']);
Route::put('/user/edited-review/',[Usercontroller::class, 'change'])->name('editedbyuser');
});
// Routes Only can acess by Users in the Company












