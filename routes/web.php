<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\AuthController;

Route::prefix('/')->controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::prefix('/contact-us')->group(function () {
        Route::get('/', 'contactUs')->name('contact-us');
        Route::post('/', 'contactUsPost')->name('contact-us.post');
    });
    Route::prefix('/booking')->group(function () {
        Route::get('/', 'booking')->name('booking');
        Route::post('/', 'bookingPost')->name('booking.post');
        Route::delete('/{id}', 'bookingDelete')->name('booking.destroy');
    });
    Route::prefix('/my-account')->group(function () {
        Route::get('/', 'myAccount')->name('my-account');
        Route::post('/', 'myAccountPost')->name('my-account.post');
    });

    Route::post('/get-districts', 'getDistricts')->name('get-districts');
    Route::post('/get-stations', 'getStations')->name('get-stations');
    Route::post('/get-car-models', 'getCarModels')->name('get-car-models');
});

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/', 'loginPost')->name('login.post');
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', 'register')->name('register');
        Route::post('/', 'registerPost')->name('register.post');
    });

    Route::get('/logout', 'logout')->name('logout');
});