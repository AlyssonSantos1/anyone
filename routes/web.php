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
Route::put('/executive/edited/',[ExecutiveController::class, 'changed']);
Route::get('/executive/project-build',[ExecutiveController::class, 'newproject'])->name('executive.project-build');
Route::post('/executive/created',[ExecutiveController::class, 'congrats'])->name('created');
Route::get('executive/{squad_id}/review-authors',[ExecutiveController::class, 'getReviewAuthors'])->name('executive.review-authors');
});
//End of Executive

// Managers Route
Route::group(['middleware' =>['manager']], function(){
Route::get('/manager/trade-member/{id}',[ManagerController::class, 'traded'])->name('manager-swap');
Route::put('/manager/traded/{id}',[ManagerController::class, 'swapuser'])->name('trademember');
Route::get('/manager/seeallreviews',[ManagerController::class, 'catch'])->name('manager-all');
Route::get('/manager/seeallreviews',[ManagerController::class, 'found'])->name('manager-all');
});
//End of Managers Area 

// Routes by Internal Advisorss can acess by  in the Company
Route::group(['middleware' =>['internaladvisor']], function(){
Route::get('/advisors/give-review',[AdvisorController::class, 'newreview'])->name('gave-review');
Route::post('/advisors/gave',[AdvisorController::class, 'newest'])->name('wrote');
Route::get('/advisors/review-team',[AdvisorController::class, 'target'])->name('see-review');
Route::post('/advisors/review-team',[AdvisorController::class, 'pyramids']);
});
// End of Internal Advisors Space


// Routes Only can acess by Associates in the Company
Route::group(['middleware' =>['associate']], function(){
Route::get('/associates/swap-role/{id}',[AssociatesController::class, 'map'])->name('tradetoadv');
Route::post('/associates/swap-role/{id}',[AssociatesController::class, 'swapuser'])->name('tradetoadvisor');
Route::get('/associates/review-team',[AssociatesController::class, 'swan'])->name('catch-review');
Route::post('/associates/reviews',[AssociatesController::class, 'glasses'])->name('reviewtheirteam');;
});
// End of associates area

// user default space
Route::group(['middleware' =>['user']], function(){
Route::get('/user/delete-review/',[UserController::class, 'trash'])->name('delete-user');
Route::put('/user/delete-review',[Usercontroller::class, 'turndown'])->name('Deleted');
Route::get('/user/edit-review/{id}',[UserController::class, 'edited'])->name('editing-review');
Route::put('/user/edited-review/{id}',[Usercontroller::class, 'change'])->name('editedbyuser');
});
// End of users space












