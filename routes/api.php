<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TanentController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/test', function () {
//     return response()->json([
//         'message' => 'Hello World!',
//     ], 200);
// });

Route::get('tanent', [TanentController::class, 'index']);// this is for GET
Route::get('tanent/{id}', [TanentController::class, 'show']);// this is for GET with the ID only
Route::post('tanent', [TanentController::class, 'store']);// this is for POST
Route::put('tanent/{id}', [TanentController::class, 'update']);// this is for PUT
Route::delete('tanent/{id}', [TanentController::class, 'destroy']);// this is for DELETE