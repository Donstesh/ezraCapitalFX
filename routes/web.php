<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\OtpVerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contact');
});
Route::get('/faq', function () {
    return view('faq');
});

Auth::routes();

Route::get('/otp-verify', [HomeController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/otp-verify', [HomeController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::post('/request-otp', [HomeController::class, 'requestOtp'])->name('request.otp');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user', 'otp'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});
