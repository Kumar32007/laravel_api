<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\V1', 'middleware'=>'auth:sanctum'], function(){
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);


    Route::post('invoice/bulk', ['uses'=> 'InvoiceController@bulkStore']);

});