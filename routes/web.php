<?php

use App\Http\Controllers\Settings;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\Dashboard\CategoryController;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Dashboard\PostController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::middleware(['auth'])->group(function () {
        Route::prefix('dashboard')->middleware(['auth', 'verified'])->name('dashboard.')->group(function () {
            Route::get('', DashboardController::class)->name('index');

            Route::name('categories.')
                ->prefix('categories')
                ->controller(CategoryController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/{id}', 'show')->name('show');
                    Route::post('/', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}', 'update')->name('update');
                    Route::delete('/{id}', 'destroy')->name('destroy');
                });

            Route::name('posts.')
                ->prefix('posts')
                ->controller(PostController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/{id}', 'show')->name('show');
                    Route::post('/', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}', 'update')->name('update');
                    Route::delete('/{id}', 'destroy')->name('destroy');
                });

        });

        Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
        Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
        Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
        Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
        Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
        Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
        Route::get('settings/language', [Settings\LanguageController::class, 'edit'])->name('settings.language.edit');
    });

    Route::middleware('guest')->group(function () {

        Route::view('login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    });
