<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::get('/', function() {
    return view('home', [
        'title' => 'home'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); 

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/user', 'index')->name('dashboard.user');
    Route::put('/dashboard/user/update', 'update')->name('dashboard.user.update');
    Route::get('/dashboard/user/edit', 'edit')->name('dashboard.user.edit');
    Route::get('/dashboard/user/show', 'show')->name('dashboard.user.show');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard/admin', 'index')->name('dashboard.admin');
    Route::post('/dashboard/admin/add', 'store')->name('dashboard.admin.add');
    Route::get('/dashboard/internal/create-user', 'create')->name('dashboard.admin.create');
    Route::put('/dashboard/admin/update', 'update')->name('dashboard.admin.update');
    Route::get('/dashboard/admin/edit/{id}', 'edit')->name('dashboard.admin.edit');
    Route::get('/dashboard/admin/show/{id}', 'show')->name('dashboard.admin.show');
    Route::delete('/dashboard/admin/{id}', 'destroy')->name('dashboard.admin.delete');
});

// Route::resource('/dashboard/admin', AdminController::class);