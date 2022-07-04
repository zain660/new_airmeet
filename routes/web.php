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
    return view('landing');
});
// Auth routes
Auth::routes();
// Login
Route::post('/login_check', [App\Http\Controllers\Auth\LoginController::class, 'login_check'])->name('login_check');
// Google login
Route::get('login/google', [App\Http\Controllers\SocialLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\SocialLoginController::class, 'handleGoogleCallback']);

// facebook login
Route::get('auth/facebook', [App\Http\Controllers\SocialLoginController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [App\Http\Controllers\SocialLoginController::class, 'handleFacebookCallback']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Meetings
Route::post('create-meeting', [App\Http\Controllers\MeetingController::class, 'createMeeting']);
Route::post('delete-meeting', [App\Http\Controllers\MeetingController::class, 'deleteMeeting']);
Route::post('edit-meeting', [App\Http\Controllers\MeetingController::class, 'editMeeting']);
Route::post('send-invite', [App\Http\Controllers\MeetingController::class, 'sendInvite']);
Route::get('get-invites', [App\Http\Controllers\MeetingController::class, 'getInvites']);
Route::get('meeting/{id}', [App\Http\Controllers\MeetingController::class, 'meeting'])->middleware('checkPlan');
Route::post('check-meeting', [App\Http\Controllers\MeetingController::class, 'checkMeeting']);
Route::post('check-meeting-password', [App\Http\Controllers\MeetingController::class, 'checkMeetingPassword']);
Route::post('get-details', [App\Http\Controllers\MeetingController::class, 'getDetails']);


// ADMIN
Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

// Package Type
Route::get('admin/packages/all-package-type', [App\Http\Controllers\PackageTypeController::class, 'index'])->name('all_package_type');
Route::get('admin/packages/create-type', [App\Http\Controllers\PackageTypeController::class, 'add_packge_type'])->name('add_package_type');
Route::post('admin/packages/create_package_type', [App\Http\Controllers\PackageTypeController::class, 'create'])->name('create_package_type');
Route::get('admin/packages/edit-package-type/{id}', [App\Http\Controllers\PackageTypeController::class, 'edit'])->name('edit_package_type');
Route::post('admin/packages/update_package_type/{id}', [App\Http\Controllers\PackageTypeController::class, 'update'])->name('update_package_type');
Route::get('admin/packages/remove_package_type/{id}', [App\Http\Controllers\PackageTypeController::class, 'destroy'])->name('remove_package_type');

// Package & subscription
Route::get('admin/packages', [App\Http\Controllers\PackageSubscriptionController::class, 'index'])->name('packge_subscription');
Route::get('admin/packages/create', [App\Http\Controllers\PackageSubscriptionController::class, 'create_package'])->name('create_package');
Route::post('admin/packages/add_package', [App\Http\Controllers\PackageSubscriptionController::class, 'add_package'])->name('add_package');
Route::get('admin/packages/packages/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'all_packages'])->name('packages');
Route::get('admin/packages/packages/edit/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'edit'])->name('edit');
Route::post('admin/packages/packages/package_update/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'package_update'])->name('package_update');
Route::get('admin/packages/destroy_package/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'destroy_package'])->name('destroy_package');
Route::get('admin/packages/subscription/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'all_subscription'])->name('subscription');
Route::get('admin/packages/create-subscription', [App\Http\Controllers\PackageSubscriptionController::class, 'add_subscription'])->name('add_subscription');
Route::post('admin/packages/create_subscription', [App\Http\Controllers\PackageSubscriptionController::class, 'create_subscription'])->name('create_subscription');
Route::get('admin/packages/subscription-edit/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'edit_subscription'])->name('subscription_edit');
Route::get('admin/packages/subscription-delete/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'subscription_delete'])->name('subscription_delete');
Route::post('admin/packages/update_subscription/{id}', [App\Http\Controllers\PackageSubscriptionController::class, 'update_subscription'])->name('update_subscription');

//Admin Inquiry
Route::get('admin/inquiry', [App\Http\Controllers\InquiryController::class, 'index'])->name('all_inquiry');
Route::post('admin/send_inquiry/{inquiry_id}/{user_id}', [App\Http\Controllers\InquiryController::class, 'send_inquiry'])->name('send_inquiry');

// User routed
Route::get('user/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('user.dashboard');

// Front Inquiry
Route::get('user/inquiry', [App\Http\Controllers\InquiryController::class, 'userinquiry'])->name('user.inquiry');
Route::get('user/inquiry-details/{id}', [App\Http\Controllers\InquiryController::class, 'userinquiry_details'])->name('user.inquiry_details');
// Other pasges
Route::get('user/privacy-policy', [App\Http\Controllers\OtherPages::class, 'privacy_policy'])->name('user.privacy_policy');

// Team invitation
Route::get('user/organization/team', [App\Http\Controllers\TeamController::class, 'team'])->name('user.team');
Route::post('user/send_invitation', [App\Http\Controllers\TeamController::class, 'send_invitation'])->name('user.send_invitation');

// Organization account upgrade
Route::get('user/organization/upgrade-account', [App\Http\Controllers\UpgradeController::class, 'index'])->name('user.packages');
Route::get('user/organization/get_packages_ajax/{id}', [App\Http\Controllers\UpgradeController::class, 'get_packages_ajax'])->name('user.get_packages_ajax');
Route::get('user/upgrade-plan/card-payment/{id}', [App\Http\Controllers\UpgradeController::class, 'card_payment'])->name('user/upgrade-plan/card-payment');
Route::post('user/upgrade-plan/payment', [App\Http\Controllers\UpgradeController::class, 'payment'])->name('user.payment');

// Events
Route::get('user/organization/events', [App\Http\Controllers\EventController::class, 'index'])->name('user.events');
Route::post('user/organization/create_events', [App\Http\Controllers\EventController::class, 'create_events'])->name('user.create_event');
