<?php

use Illuminate\Http\Request;

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



Route::group(['prefix' => 'v1',  'middleware' => 'auth:api'], function()
{
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/merchants',[
        'uses'=>'Api\MerchantController@getMerchants'
    ]);
    Route::get('/merchants',[
        'uses'=>'Api\MerchantController@getMerchants'
    ]);
    Route::get('/merchant/{id}',[
        'uses'=>'Api\MerchantController@getMerchantData'
    ]);
});

//register new customer and generate api_token
Route::post('/register-customer', [
    'uses'=>'Api\CustomerRegistrationController@addCutomerUser'
]);

