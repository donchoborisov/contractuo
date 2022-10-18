<?php

use App\Http\Controllers\ContractsController;
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

Route::middleware('auth:api','admin:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->post('/contract/create', [ContractsController::class,'create']);
Route::middleware('auth:api')->get('/user/contracts', [ContractsController::class,'user_contracts']);
Route::middleware('auth:api')->get('/user/contract/{id}', [ContractsController::class,'contract_show']);
Route::middleware('auth:api')->patch('/user/contract/{id}', [ContractsController::class,'contract_update']);
Route::middleware('auth:api')->get('/user/details',[ContractsController::class,'user_details']);







