<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;


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
    return view('landing-page');
});

/* main route */
Route::get('/main', function () {
    return view('main');
})->name('main');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::delete('/user/delete', [AuthController::class, 'destroy'])->name('user.delete');

// forget-password route
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password');

Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

