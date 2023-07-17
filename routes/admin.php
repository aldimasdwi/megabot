<?php

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

Route::get('/login', 'admin\AuthController@showAdminLogin')->name('login')->middleware('guest');
Route::post('/index', 'admin\AuthController@login')->name('admin.login');

Route::group(['middleware' => ['auth', 'demo']], function () {

    Route::get('dashboard', 'admin\DashboardController@index')->name('dashboard');

    // Account
    Route::get('account/profile', 'admin\AccountController@profile')->name('account.profile');
    Route::put('account/profile/update', 'admin\AccountController@updateProfile')->name('account.profile.update');
    Route::put('account/password/update', 'admin\AccountController@updatePassword')->name('account.password.update');

    // Users
    Route::resource('user', 'admin\UserController', ['except' => ['show']]);
    Route::put('user/{id}/password/update', 'admin\UserController@updatePassword')->name('user.password.update');
    Route::put('user/{id}/status', 'admin\UserController@status')->name('user.status');

    //Characters
    Route::resource('character', 'admin\CharacterController', ['except' => ['show']]);

    //suggestioncategory
    Route::resource('category', 'admin\SuggestionCategoryController', ['except' => ['show']]);

    //suggestions
    Route::resource('suggestion', 'admin\SuggestionController', ['except' => ['show']]);

    //chathistories
    Route::resource('chathistories', 'admin\ChatHistoriesController', ['except' => ['show', 'update', 'edit', 'store', 'create', 'destroy']]);

    //Settings
    Route::get('settings', 'admin\SettingsController@index')->name('admin.settings');
    Route::get('settings/json', 'admin\SettingsController@getSettings')->name('admin.getsettings');
    Route::put('settings/generalSetting', 'admin\SettingsController@generalSetting')->name('admin.general.settings');
    Route::put('settings/adssetting', 'admin\SettingsController@adsSetting')->name('admin.ads.settings');
    Route::put('settings/email', 'admin\SettingsController@emailSetting')->name('admin.email.settings');
    Route::put('settings/appupdatepopup', 'admin\SettingsController@appUpdatePopup')->name('admin.appupdatepopup.settings');

    Route::get('logout', 'admin\AuthController@logout')->name('logout');
});
