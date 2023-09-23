<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller( SubscriptionController::class)->prefix('user')->group(function () {
    Route::post('{userId}/subscription', 'store');
    Route::get('{userId}/subscription', 'show');
    Route::put('{userId}/subscription/{subscriptionId}', 'update');
    Route::delete('{userId}/subscription', 'destroy');
});
Route::post('user/{userId}/transaction', 'App\Http\Controllers\TransactionController@store');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');