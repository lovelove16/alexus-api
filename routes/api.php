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

Route::group(['prefix'=>'hospitals'] ,function () {
    //List of all hospitals
    Route::get('/', 'HospitalController@index');
    //List of single hospital
    Route::get('/{id}', 'HospitalController@show');
    //Create Hospital Detail
    Route::post('/', 'HospitalController@create');
    //Update single data Hopital
    Route::put('/{id}', 'HospitalController@update');
    //Deletete Hospital
    Route::delete('/{id}', 'HospitalController@destroy');
});

Route::group(['prefix'=>'auth'] ,function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('forgotpassword', 'AuthController@forgotPassword');
    Route::post('resetpassword', 'AuthController@resetPassword');
});

Route::group(['prefix'=>'users'] ,function () {
    Route::get('/', 'UserController@getAllUsers');
    Route::get('/{id}', 'UserController@getUser');
    Route::put('/{id}', 'UserController@updateUser');
    Route::delete('/{id}', 'UserController@deleteUser');
});

Route::group(['prefix'=>'probes'] ,function () {
    Route::get('/', 'ProbeController@getAllProbes');
    Route::post('/', 'ProbeController@AddProbe');
    Route::get('/{id}', 'ProbeController@getSingleProbe');
    Route::put('/{id}', 'ProbeController@updateProbe');
    Route::delete('/{id}', 'ProbeController@deleteProbe');    
});

Route::group(['prefix'=>'hospitalRooms'] ,function () {
    Route::get('/', 'HospitalRoomController@getHospitalRooms');
    Route::get('/{id}', 'HospitalRoomController@getSingleHospRoom');
    Route::post('/', 'HospitalRoomController@addHospitalRoom');
    Route::put('/{id}', 'HospitalRoomController@updateHospitalRoom');
    Route::delete('/{id}', 'HospitalRoomController@deleteHospitalRoom');
});

Route::group(['prefix'=>'procedures'] ,function () {
    Route::get('/', 'ProcedureController@getAllProcedures');
    Route::get('/{id}', 'ProcedureController@getSingleProcedure');
    Route::post('/', 'ProcedureController@addProcedure');
    Route::put('/{id}', 'ProcedureController@updateProcedure');
    Route::delete('/{id}', 'ProcedureController@destroyProcedure');
});

Route::group(['prefix'=>'patients'] ,function () {
    Route::post('/', 'PatientController@addPatient');
    Route::get('/', 'PatientController@getAllPatients');
    Route::get('/{id}', 'PatientController@getSinglePatient');
    Route::put('/{id}', 'PatientController@updatePatient');
    Route::delete('/{id}', 'PatientController@deletePatient');
});

Route::group(['prefix'=>'doctors'] ,function () {
    Route::get('/', 'DoctorController@getAllDoctors');
    Route::get('/{id}', 'DoctorController@getSingleDoctor');
    Route::post('/', 'DoctorController@addDoctor');
    Route::put('/{id}', 'DoctorController@updateDoctor');
    Route::delete('/{id}', 'DoctorController@deleteDoctor');
});



