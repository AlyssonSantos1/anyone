<?php

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
    return view('welcome');
});

Route::get('/',[ExecutiveController::class, 'index']);
// Route of Index

Route::get('/executive/manager-add',[ExecutiveController::class, 'newmember']);
Route::post('/executive/manager-add',[ExecutiveController::class, 'newmember'])->name('newuser');
Route::get('/executive/manager-edit/{id}',[ExecutiveController::class, 'edit']);
Route::put('/executive/manager-edit/{id}',[ExecutiveController::class, 'edit'])->name('memberedited');
Route::get('/executive/manager-building',[ExecutiveController::class, 'newproject']);
Route::post('/executive/manager-building',[ExecutiveController::class, 'newproject'])->name('buildproject');
Route::get('/executive/see-everything',[ExecutiveController::class, 'vision'])->name('vision360');
// Routes Only can acess by Executives in the Company

Route::get('/manager/trade-member',[ExecutiveController::class, 'swapuser']);
Route::post('/manager/trade-member',[ExecutiveController::class, 'swapuser'])->name('trademembers');







