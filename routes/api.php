<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'App\Http\Controllers\api\AuthController@login');
Route::get('/logout', 'App\Http\Controllers\api\AuthController@logout');
Route::post('/register', 'App\Http\Controllers\api\AuthController@register');
Route::post('/verifyOtp', 'App\Http\Controllers\api\AuthController@verifyOtp');
Route::post('/phone/login', 'App\Http\Controllers\api\AuthController@phoneLogin');
Route::post('/social/login', 'App\Http\Controllers\api\AuthController@socialLogin');
Route::post('/verify-token', 'App\Http\Controllers\api\AuthController@verifyToken');
Route::post('/update-password', 'App\Http\Controllers\api\AuthController@updatePassword');
Route::post('/forgot-password', 'App\Http\Controllers\api\AuthController@forgotPassword');
Route::get('/frontSettings', 'App\Http\Controllers\api\SettingsController@frontSettings')->name('frontSettings');
Route::get('/characters', 'App\Http\Controllers\api\CharacterController@index')->name('characters');
Route::get('suggestion', 'App\Http\Controllers\api\SuggestionController@suggestionsByCategory')->name('suggestion');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/coins', 'App\Http\Controllers\api\ChatController@coins');
    Route::get('/self', 'App\Http\Controllers\api\AuthController@self')->name('self');
    Route::post('/chat/save', 'App\Http\Controllers\api\ChatController@saveChatHistory');
    Route::get('/chat/history', 'App\Http\Controllers\api\ChatController@getChatHistory');
    Route::delete('clear/chathistory', 'App\Http\Controllers\api\ChatController@clearChatHistory');
    Route::get('/settings', 'App\Http\Controllers\api\SettingsController@index')->name('settings');
    Route::post('/clear/chat/sessions', 'App\Http\Controllers\api\ChatController@clearUserChatSessions');
    Route::delete('/clear/chat/{session_id}', 'App\Http\Controllers\api\ChatController@clearChatSession');
    Route::put('/updateProfile', 'App\Http\Controllers\api\AccountController@updateProfile')->name('updateProfile');
    Route::put('/updatePassword', 'App\Http\Controllers\api\AccountController@updatePassword')->name('updatePassword');
    Route::get('deleteAccount', 'App\Http\Controllers\api\AccountController@deleteAccount')->name('deleteAccount');
});
