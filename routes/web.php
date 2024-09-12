<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Mail;

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

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email', function ($message) {
            $message->to('donstesh@gmail.com')
                    ->subject('Test Email');
        });
        return 'Email sent successfully!';
    } catch (Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

    Route::get('/deposit', [WalletController::class, 'index'])->name('deposit');
    Route::post('/wallet/update', [WalletController::class, 'updateWalletAddress'])->name('wallet.update');
    Route::get('/addresses', [WalletController::class, 'walletAddress'])->name('addresses');
    Route::post('/deposit', [WalletController::class, 'depositRequest'])->name('deposit.request');

    Route::get('/plans', [HomeController::class, 'plansList'])->name('deposit.plans');
    Route::get('/copy-trading', [HomeController::class, 'copyTrading'])->name('copy-trading');
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
