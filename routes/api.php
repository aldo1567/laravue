<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Htpp\Controller\KaryawanController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/karyawan', 'KaryawanController@index');
Route::post('/karyawan', 'KaryawanController@store');
Route::get('/karyawan/{id}', 'KaryawanController@show');
Route::post('/karyawan/{id}', 'KaryawanController@update');
Route::delete('/karyawan/{id}', 'KaryawanController@destroy');
