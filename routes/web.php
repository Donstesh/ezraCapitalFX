<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\KycVerifyController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\UserPlanController;
use App\Http\Controllers\SetupController;
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

Route::get('/trigger-queue', [HomeController::class, 'triggerQueue']);


Route::get('/clear-cache', [SetupController::class, 'clearCache']);
Route::get('/clear-config', [SetupController::class, 'clearConfig']);
Route::get('/clear-view', [SetupController::class, 'clearView']);

Auth::routes();

Route::get('/otp-verify', [HomeController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/otp-verify', [HomeController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::post('/request-otp', [HomeController::class, 'requestOtp'])->name('request.otp');

Route::post('/reset-password', [HomeController::class, 'resetPassword'])->name('reset-password');
Route::get('/start-trading/{userId}', [TradeController::class, 'startTrading']);


Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email', function ($message) {
            $message->to('rosetstesh@gmail.com')
                    ->subject('Test Email');
        });
        return 'Email sent successfully!';
    } catch (Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});

Route::get('/api/crypto-prices', [HomeController::class, 'getCryptoPrices']);
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

    Route::get('/plans', [UserPlanController::class, 'index'])->name('plans');
    Route::get('/copy-trading', [HomeController::class, 'copyTrading'])->name('copy-trading');
    Route::get('/trading-room', [TradeController::class, 'index'])->name('trading-room');
    Route::get('/open-trade', [HomeController::class, 'openTrades'])->name('open-trade');
    Route::get('/close-trade', [HomeController::class, 'closedTrades'])->name('close-trade');
    Route::get('/mining', [HomeController::class, 'miningHome'])->name('mining');
    Route::get('/mining-plans', [HomeController::class, 'miningPlans'])->name('mining-plans');
    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal');
    Route::post('/submit-withdrawal', [WithdrawalController::class, 'withdrawalRequest'])->name('withdrawals.store');
    Route::get('/my-account', [HomeController::class, 'userAccount'])->name('my-account');
    Route::get('/kyc', [KycVerifyController::class, 'index'])->name('kyc');
    Route::post('/kyc', [KycVerifyController::class, 'personaDetails'])->name('kyc.store');
    Route::post('/selfie', [KycVerifyController::class, 'selfie'])->name('kyc.selfie');
    Route::post('/proof-of-residence', [KycVerifyController::class, 'proofOfResidence'])->name('kyc.proof-of-residence');

    Route::post('/select-plan', [UserPlanController::class, 'store'])->name('selecet-plan');

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');

    Route::get('/adminHome', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/new-orders', [HomeController::class, 'userPlans'])->name('admin.new-orders');
    Route::put('/update-order', [HomeController::class, 'updateOrder'])->name('admin.updateOrder');
    Route::put('/cancel-order', [HomeController::class, 'cancelOrder'])->name('admin.cancelOrder');
    Route::get('/complete-orders', [HomeController::class, 'completeOrders'])->name('admin.complete-orders');
    Route::get('/view-products', [HomeController::class, 'viewProducts'])->name('admin.view-products');
    Route::post('/save-product', [HomeController::class, 'saveProduct'])->name('save-product.store');
    Route::get('delete-product/{id}',[HomeController::class, 'deleteProduct'])->name('admin.product.delete');
    Route::get('/user-deposits', [HomeController::class, 'userDeposit'])->name('admin.user-deposits');
    Route::put('/update-status', [HomeController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::get('/user-withdrawals', [HomeController::class, 'userWithdrawal'])->name('admin.user-withdrawals');
    Route::put('/update-with-status', [HomeController::class, 'updateWithdrawalStatus'])->name('admin.updateWithdrawalStatus');
    Route::get('/category-setup', [HomeController::class, 'categorySetup'])->name('admin.category-setup');
    Route::post('/save-m-category', [HomeController::class, 'saveMCategory'])->name('save-m-category.store');
    Route::post('/save-category', [HomeController::class, 'saveCategory'])->name('save-category.store');
    Route::get('delete-m-category/{id}',[HomeController::class, 'deleteMCategory'])->name('admin.m-category.delete');
    Route::get('delete-category/{id}',[HomeController::class, 'deleteCategory'])->name('admin.category.delete');
    Route::get('/view-wallets', [HomeController::class, 'viewWallets'])->name('admin.view-wallets');
    Route::post('/save-wallet', [HomeController::class, 'saveWallet'])->name('save-wallet.store');
    Route::get('delete-wallet/{id}',[HomeController::class, 'deleteWallet'])->name('admin.wallet.delete');
    Route::get('/view-users', [HomeController::class, 'viewUsers'])->name('admin.view-users');
    Route::get('delete-user/{id}',[HomeController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('/site-setup',[HomeController::class, 'viewSetup'])->name('admin.site-setup');
    Route::post('/support-settings', [HomeController::class, 'saveSupportSettings'])->name('admin.support.save');

    Route::get('/admin/user/{id}', [HomeController::class, 'getUser']);
    Route::post('/admin/email/send', [HomeController::class, 'storeEmail'])->name('admin.email.send');
    Route::post('/admin/balance/store', [HomeController::class, 'storeDirectBalance'])->name('admin.balance.store');

    Route::get('/kyc-verification',[HomeController::class, 'viewUsersKYC'])->name('admin.kyc-verification');
    Route::post('/kyc-verify', [HomeController::class, 'verifyKYC'])->name('admin.kyc-verify');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user', 'otp'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');



});
