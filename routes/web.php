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



//To prevent insecure links -->

if (App::environment('production')) {

    URL::forceScheme('https');
    
}

//Index page route handler
//Route::get('/test','PagesController@index');

Route::get('/test','PagesController@index');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/terms-and-conditions', 'HomeController@terms')->name('terms');

Auth::routes();
/*Override register form route... For Referral purpose*/
Route::get('/register/{ref?}', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/',function (){
    return view('welcome');
})->name('welcome');

/**
 * Bank
 */
Route::get('/register-bank-details', 'BankDetailsController@bankDetails')->name('bank.details')->middleware('bank.rules');
Route::post('/store-bank-details', 'BankDetailsController@storeBankDetails')->name('bank.store')->middleware('bank.rules');

/*Reset Password .. Link to generate reset password*/
Route::get('/password-reset/{misc_token}', 'Admin\AllUsers@passwordResetPage')->name('password.reset.page');
Route::post('/save-password-reset/{misc_token}', 'Admin\AllUsers@savePasswordReset')->name('save.password.reset');

Route::middleware(['auth'])->group(function (){
    /**
     * User
     */
    /*Dashboard*/
    Route::get('/dashboard', 'UserController@userDashboard')->name('dashboard')->middleware('bank.redirect');
    Route::post('/pay-activation-fee', 'UserController@payActivationFee')->name('pay.activation.fee');
    Route::post('/pay-reactivation-fee', 'UserController@payReactivationFee')->name('pay.reactivation.fee');
    Route::post('/pay-sanction-fine', 'UserController@paySanctionFine')->name('pay.sanction.fine');
    Route::delete('/cancel-activation-fee/{token}', 'UserController@cancelActivationFee')->name('cancel.activation.fee');
    Route::delete('/cancel-provide-help/{token}', 'UserController@cancelProvideHelp')->name('cancel.provide.help');
    Route::delete('/cancel-get-help/{token}', 'UserController@cancelGetHelp')->name('cancel.get.help');
    Route::get('/user-details', 'UserController@userDetails')->name('user.details');
    Route::post('/change-password/{user_token}', 'UserController@changePassword')->name('change.password');
    /*Upload payment receipt*/
    Route::post('/upload-receipt/{ph_id}/{gh_id}', 'UserController@uploadPaymentReceipt')->name('upload.payment.receipt');
    /*Flag Receipt As fake*/
    Route::post('/flag-receipt-as-fake/{receipt_token}', 'UserController@flagReceipt')->name('flag.receipt.as.fake');
    /*Payment Confirmation*/
    Route::post('/payment-confirmation/{ph_token}/{gh_token}', 'UserController@paymentConfirmation')->name('payment.confirmation');
    /*User Transactions Page*/
    Route::get('/transactions', 'TransactionController@showTransactions')->name('transactions');
    /*User Referral Page*/
    Route::get('/referrals', 'ReferralController@showReferrals')->name('show.referrals');
    /*News*/
    Route::get('/news', 'NewsController@showNews')->name('show.news');
    Route::get('/single-news/{news_token}', 'NewsController@singleNews')->name('single.news');
    /*Messages*/
    Route::get('/messages', 'MessagesController@showMessages')->name('show.messages');
    Route::get('/single-message/{token}', 'MessagesController@singleMessages')->name('single.message');
    Route::post('/save-message', 'MessagesController@saveMessages')->name('save.message');

});

Route::middleware(['auth', 'not.admin'])->group(function (){
    /**
     * Admin
     */
    Route::get('/admin/all-users', 'Admin\AllUsers@showUsers')->name('show.users');
    Route::get('/admin/generate-password-reset-link/{user_token}', 'Admin\AllUsers@generatePasswordResetLink')->name('generate.password.reset.link');

    /*Edit User.. Only CEO Can change user role*/
    Route::get('/admin/edit-user-details/{user_token}', 'Admin\AllUsers@editUserDetails')->name('edit.user.details');
    Route::put('/admin/save-user-details/{user_token}', 'Admin\AllUsers@saveUserDetails')->name('save.user.details');
    Route::put('/admin/save-bank-details/{bank_token}', 'Admin\AllUsers@saveBankDetails')->name('save.bank.details');
    /*Merge*/
    Route::get('/admin/merge-pending-ph/{gh_token?}', 'Admin\MergeController@showPendingPh')->name('show.pending.ph')->middleware('is.admin.only');
    Route::get('/admin/merge-pending-gh/{ph_token?}', 'Admin\MergeController@showPendingGh')->name('show.pending.gh')->middleware('is.admin.only');
    Route::post('/admin/merge-pending-ph-with-pending-gh/{ph_token}/{gh_token}', 'Admin\MergeController@mergePendingPh')->name('merge.pending.ph')->middleware('is.admin.only');
    Route::post('/admin/merge-pending-gh-with-pending-ph/{gh_token}/{ph_token}', 'Admin\MergeController@mergePendingGh')->name('merge.pending.gh')->middleware('is.admin.only');
    /*Messages from admin*/
    Route::get('/admin/messages', 'MessagesController@showAdminMessages')->name('show.admin.messages');
    Route::get('/admin/single-message/{chat_token}', 'MessagesController@singleAdminMessages')->name('single.admin.message');
    /*News*/
    Route::get('/admin/news', 'NewsController@adminShowNews')->name('admin.show.news');
    Route::get('/admin/single-news/{news_token}', 'NewsController@adminSingleNews')->name('admin.single.news');
    Route::get('/admin/create-news', 'NewsController@createNews')->name('create.news');
    Route::put('/admin/update-news/{news_token}', 'NewsController@updateNews')->name('update.news');
    Route::post('/admin/save-news', 'NewsController@saveNews')->name('save.news');
    /*Admin Dashboard*/
    Route::get('/admin/dashboard', 'Admin\ActivitiesController@dashboard')->name('admin.dashboard');
    /*Resolve Fake Receipt Issues Page*/
    Route::get('/admin/fake-receipt-issues', 'Admin\ResolveIssuesController@fakeReceiptIssues')->name('fake.receipt.issues')->middleware('is.admin.only');
    /*Resolve Unconfirmed Receipt Issues Page*/
    Route::get('/admin/unconfirmed-user-payment', 'Admin\ResolveIssuesController@unconfirmedUserPayment')->name('unconfirmed.user.payment')->middleware('is.admin.only');
    /*FAKE RECEIPT ISSUES*/
    Route::post('/clear-fake-payment-issue/{token}', 'Admin\ResolveIssuesController@clearFakePaymentIssue')->name('clear.fake.payment.issue')->middleware('is.admin.only');
    Route::post('/block-ph-user-fake-payment-issue/{token}', 'Admin\ResolveIssuesController@blockPhUserFakePaymentIssue')->name('block.ph.user.fake.payment.issue')->middleware('is.admin.only');
    Route::post('/block-gh-user-fake-payment-issue/{token}', 'Admin\ResolveIssuesController@blockGhUserFakePaymentIssue')->name('block.gh.user.fake.payment.issue')->middleware('is.admin.only');
    Route::post('/confirm-fake-payment-issue/{token}', 'Admin\ResolveIssuesController@confirmFakePaymentIssue')->name('confirm.fake.payment.issue')->middleware('is.admin.only');
    Route::post('/unmerge-fake-payment-issue/{token}', 'Admin\ResolveIssuesController@unmergeUsersFakePaymentIssue')->name('unmerge.users.fake.payment.issue')->middleware('is.admin.only');

});

Route::middleware(['auth', 'not.activated', 'has.pending'])->group(function (){
    /*Provide Help*/
    Route::get('/provide-help', 'ProvideHelpController@gotoProvideHelp')->name('goto.provide.help');
    Route::post('/provide-help', 'ProvideHelpController@saveProvideHelp')->name('save.provide.help');
    /*Get Help*/
    Route::get('/get-help', 'GetHelpController@gotoGetHelp')->name('goto.get.help');
    Route::post('/get-help', 'GetHelpController@saveGetHelp')->name('save.get.help');
    Route::post('/ceo/get-help', 'GetHelpController@saveCeoGetHelp')->name('save.ceo.get.help');
});
