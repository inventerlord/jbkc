<?php

use App\Mail\ResetPasswordMail;
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



Route::controller(App\Http\Controllers\FrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/business-consultancy', 'businessConsultancy')->name('business.consultancy');
});

Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->name('login');
    Route::post('/login', 'loginAttempt');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/register', 'showForm')->name('register');
});
Route::controller(App\Http\Controllers\Auth\ForgetPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'forgotPage')->name('forgot.password');
    Route::post('/forgot-password', 'sendResetLink')->name('forgot.password.link');
    Route::get('/reset-password', 'resetPage')->name('reset.password.form');
    Route::put('/reset-password', 'resetPassword');
});
Route::get('/email', function () {
    $data = ['email' => 'd@example.com', 'action_link' => "https://www.google.com"];
    return new ResetPasswordMail($data);
});
