<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\TaskController;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [AuthController::class ,'login']);
Route::post('register', [AuthController::class ,'register']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('Task', TaskController::class);

    Route::get('/getTasksByUserId/{id}', [TaskController::class, 'getTasksByUserId']);
    Route::get('/getTaskById/{id}', [TaskController::class, 'getTaskById']);
    
});
