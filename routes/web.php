<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateUserController;

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

Route::group(['middleware'=>'guest'], function(){
    Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('register',[AuthController::class, 'register_view'])->name('register');
    Route::post('register',[AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('home',[AuthController::class, 'home'])->name('home');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('userdetails',[CreateUserController::class, 'userdetails'])->name('user.detail');
    Route::get('create/user',[CreateUserController::class, 'create'])->name('user.create');
    Route::post('createpost',[CreateUserController::class, 'createUser'])->name('create.user');
    Route::get('users/{id}/edit',[CreateUserController::class, 'useredit']);
    Route::put('users/{id}/update',[CreateUserController::class, 'userupdate'])->name('useru.pdate');
    Route::delete('users/{id}/delete',[CreateUserController::class, 'destroy']);
});

