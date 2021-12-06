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

Route::get('/','App\Http\Controllers\MainController@index');
//[UserController::class, 'index']

// Information
Route::get('/Information','App\Http\Controllers\MainController@Information');
Route::post('/StoreInformation','App\Http\Controllers\MainController@StoreInformation');

