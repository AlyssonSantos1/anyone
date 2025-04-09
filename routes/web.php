<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AssociatesController;
use Illuminate\Auth\Middleware\Authenticate;
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
    return view('auth.login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.submit');


Route::middleware(['auth', 'checkHierarchy:executive'])->group(function () {  
Route::get('/executives/create', [ExecutiveController::class, 'create'])->name('executive.create');
Route::post('/executive', [ExecutiveController::class, 'store'])->name('executive.store');
Route::get('/executive/index', [ExecutiveController::class, 'index'])->name('executive.index');
Route::get('/executive/editing', [ExecutiveController::class, 'edition'])->name('executive.editing');
Route::put('/edit', [ExecutiveController::class, 'changed'])->name('Done-Deal');
Route::get('/executive/project-build', [ExecutiveController::class, 'newproject'])->name('executive-build');
Route::post('/executive-new', [ExecutiveController::class, 'congrats']);
Route::get('/new-squad', [ExecutiveController::class, 'tower'])->name('team-build');
Route::post('/group', [ExecutiveController::class, 'construction']);
Route::get('/get-review-author', [ExecutiveController::class, 'getReviewAuthors'])->name('executive.review-authors');
});

Route::middleware(['auth', 'checkHierarchy:manager'])->group(function () {
    Route::get('/managers/index', [ManagerController::class, 'index'])->name('managers.index');
    Route::get('/manager/trade-member', [ManagerController::class, 'traded'])->name('temporarytrade');
    Route::put('/trade', [ManagerController::class, 'trading'])->name('traded');
    Route::get('/seeallreviews', [ManagerController::class, 'catch'])->name('manager-all');
});

Route::middleware(['auth', 'checkHierarchy:associate'])->group(function () {
    Route::get('/associate/index', [AssociatesController::class, 'index'])->name('associates.index');
    Route::get('/associates/swap-role', [AssociatesController::class, 'map'])->name('tradetoadv');
    Route::put('/swap-role', [AssociatesController::class, 'swapuser'])->name('swap-positions');
    Route::get('/associates/review-team', [AssociatesController::class, 'swan'])->name('complete');
});

Route::middleware(['auth', 'checkHierarchy:internaladvisor'])->group(function () {
    Route::get('/internaladvisors', [AdvisorController::class, 'index'])->name('internaladvisor.index');
    Route::post('/advisors', [AdvisorController::class, 'newest'])->name('gived');
    Route::get('/advisors/give-review', [AdvisorController::class, 'newreview'])->name('giving');
    Route::get('/advisors/review-team', [AdvisorController::class, 'target'])->name('vision');
});


Route::middleware(['auth', 'checkHierarchy:user'])->group(function () {
    Route::get('/users/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/delete-review/{id}', [UserController::class, 'trash'])->name('getting-review');
    Route::post('/deleted/{id}', [UserController::class, 'turndown'])->name('delete-review');
    Route::get('/user/edit-review/{id}', [UserController::class, 'edited'])->name('editing-review');
    Route::put('/edited/{id}', [UserController::class, 'change']);
});

Route::middleware(['auth', 'checkHierarchy:user'])->group(function () {
    Route::get('/users/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/delete-review', [UserController::class, 'trash'])->name('getting-review');
    Route::post('/deleted', [UserController::class, 'turndown'])->name('delete-review');
    Route::get('/user/edit-review', [UserController::class, 'edited'])->name('editing-review');
    Route::put('/edited', [UserController::class, 'change']);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
