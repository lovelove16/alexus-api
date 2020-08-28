<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List of hospitals
Route::get('hospitals', 'HospitalController@index');
//List of single hospital
Route::get('hospitals/{id}', 'HospitalController@show');

Route::post('hospitals', 'HospitalController@create');

Route::put('hospitals/{id}', 'HospitalController@store');

Route::delete('hospitals/{id}', 'HospitalController@destroy');

Route::group(['prefix'=>'auth'] ,function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});






