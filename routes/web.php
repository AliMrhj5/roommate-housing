<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdsController;
use Illuminate\Support\Facades\Route;



// مسارات غير محمية
Route::controller(UserController::class)->group(function(){
    Route::get('/users/register', 'register')->name('register');
    Route::post('/users/register', 'store');
    Route::get('/cities/{country_id}', 'getCitiesByCountry');
    Route::get('/users/login', 'showLoginForm')->name('login');
    Route::post('/users/login', 'login');


    Route::get('/users/profile/{id}', 'viewprofile')->name('users.viewprofile');
    Route::get('/users/home', 'index')->name('home');

});
Route::controller(AdsController::class)->group(function(){
    Route::get('/users/ads', 'showAds')->name('ads');
    Route::get('/ads/details/{id}', 'viewdetails')->name('ads.viewdetails');

});
// مسارات محمية بميدل وير auth
Route::middleware(['auth'])->group(function () {
    // مسارات الإعلانات
    Route::controller(AdsController::class)->group(function(){

        Route::get('/users/create-ads', 'createAdIndex')->name('ads.create');
        Route::post('/users/create-ads', 'store')->name('ads.store');

    });

    // مسارات المستخدمين المحمية
    Route::controller(UserController::class)->group(function(){
        Route::post('/logout', 'logout')->name('logout');
    });


    // إضافة مسارات الموارد المحمية
    Route::resource('users', UserController::class);
});
