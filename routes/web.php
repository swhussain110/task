<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesManagement;
use App\Http\Controllers\RegisterationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //User Routes
    Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser');
    Route::post('/storeuser', [UserController::class, 'storeuser'])->name('storeuser');
    Route::get('/userslist', [UserController::class, 'userslist'])->name('userslist');
    Route::get('/edituser/{id?}', [UserController::class, 'edituser'])->name('edituser');
    Route::post('/updateuser', [UserController::class, 'updateuser'])->name('updateuser');
    Route::get('/deleteuser/{id?}', [UserController::class, 'deleteuser'])->name('deleteuser');
    Route::get('/searchuser/{name?}', [UserController::class, 'searchuser'])->name('searchuser');
    //Roles controller Routes
    Route::get('/users',[RolesManagement::class, 'index'])->name('usersindex');
    Route::get('user/{id?}', [RolesManagement::class, 'editrole'])->name('editrole');
    Route::post('/updaterole', [RolesManagement::class, 'assignrole'])->name('assignrole');

});
 //Login Routes
 Route::get('/login', [LoginController::class, 'login'])->name('login');
 Route::post('/login', [LoginController::class, 'auth'])->name('loginpost');
 Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

 //Registration Routes
 Route::get('/register', [RegisterationController::class, 'register'])->name('register');
 Route::post('/register', [RegisterationController::class, 'store'])->name('registeruserpost');