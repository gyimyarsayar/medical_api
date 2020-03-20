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

Route::resource('user','Api\UserController');
Route::resource('role', 'Api\RoleController');
Route::resource('doctor', 'Api\DoctorController');
Route::resource('expertise', 'Api\ExpertiseController');
Route::resource('nurse', 'Api\NurseController');
Route::resource('patient', 'Api\PatientController');
Route::resource('symptom', 'Api\SymptomController');
Route::resource('disease', 'Api\DiseaseController');
Route::resource('pharmistist', 'Api\PharmististController');
Route::resource('drug', 'Api\DrugController');
Route::resource('sideeffect', 'Api\SideEffectController');
Route::resource('tretment', 'Api\TretmentController');
