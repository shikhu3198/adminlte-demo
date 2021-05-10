<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/welcome1', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome1');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profiledata'])->name('profile');

Route::get('/user/index', [App\Http\Controllers\HomeController::class, 'userindex'])->name('user.index');

Route::PATCH('/profile/update/{id}', [App\Http\Controllers\HomeController::class, 'profileupdate'])->name('profile.update');

Route::get('/user/create', [App\Http\Controllers\HomeController::class, 'usercreate'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\HomeController::class, 'store'])->name('user.store');
Route::get('/changeuserstatus/{id}', [App\Http\Controllers\HomeController::class, 'isActivated'])->name('isActivated');
Route::get('/deleteusers/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deleteusers');
Route::get('/show-users/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/edit-users/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::PATCH('/update-users/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
