<?php

use Illuminate\Support\Facades\Auth;
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

//Index page route handler
//Route::get('/test','PagesController@index');

Route::get('/test','PagesController@ghMerged');



Auth::routes();
/*Override register form route... For Referral purpose*/
Route::get('/register/{ref?}', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/',function (){
    return view('welcome');
})->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register-bank-details', 'BankDetailsController@bankDetails')->name('bank.details')->middleware('bank.rules');
Route::post('/store-bank-details', 'BankDetailsController@storeBankDetails')->name('bank.store')->middleware('bank.rules');



Route::middleware(['auth'])->group(function (){
    /*Dashboard*/
    Route::get('/dashboard', 'UserController@userDashboard')->name('dashboard');
    Route::post('/pay-activation-fee', 'UserController@payActivationFee')->name('pay.activation.fee');
    Route::post('/pay-reactivation-fee', 'UserController@payReactivationFee')->name('pay.reactivation.fee');
    Route::post('/pay-sanction-fine', 'UserController@paySanctionFine')->name('pay.sanction.fine');
    Route::delete('/cancel-activation-fee/{token}', 'UserController@cancelActivationFee')->name('cancel.activation.fee');
    Route::delete('/cancel-provide-help/{token}', 'UserController@cancelProvideHelp')->name('cancel.provide.help');
    Route::delete('/cancel-get-help/{token}', 'UserController@cancelGetHelp')->name('cancel.get.help');

    /*Provide Help*/
   // Route::get('/ph', 'ProvideHelpController@userDashboard')->name('dashboard');


    /*Merge*/
    Route::get('/merge-pending-ph/{gh_token?}', 'Admin\MergeController@showPendingPh')->name('show.pending.ph');
    Route::get('/merge-pending-gh/{ph_token?}', 'Admin\MergeController@showPendingGh')->name('show.pending.gh');
    Route::post('/merge-pending-ph-with-pending-gh/{ph_token}/{gh_token}', 'Admin\MergeController@mergePendingPh')->name('merge.pending.ph');
    Route::post('/merge-pending-gh-with-pending-ph/{gh_token}/{ph_token}', 'Admin\MergeController@mergePendingGh')->name('merge.pending.gh');


    /*Upload payment receipt*/
    Route::post('/upload-receipt/{ph_id}/{gh_id}', 'UserController@uploadPaymentReceipt')->name('upload.payment.receipt');

    /*Flag Receipt As fake*/
    Route::post('/flag-receipt-as-fake/{receipt_token}', 'UserController@flagReceipt')->name('flag.receipt.as.fake');

    /*Payment Confirmation*/
    Route::post('/payment-confirmation/{ph_token}', 'UserController@paymentConfirmation')->name('payment.confirmation');

});
