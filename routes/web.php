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
    Route::get('/dashboard/user', 'index');
    Route::put('/dashboard/user/update', 'update');
    Route::get('/dashboard/user/edit', 'edit');
    Route::get('/dashboard/user/show', 'show');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard/admin', 'index');
    Route::post('/dashboard/admin/add', 'store');
    Route::get('/dashboard/internal/create-user', 'create')->name('dashboard.admin.create');
    Route::put('/dashboard/admin/update', 'update');
    Route::get('/dashboard/admin/edit/{id}', 'edit')->name('dashboard.admin.edit');
    Route::get('/dashboard/admin/show/{id}', 'show');
    Route::delete('/dashboard/admin/{id}', 'destroy');
});

// Route::resource('/dashboard/admin', AdminController::class);