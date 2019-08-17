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
    Route::group(['prefix'=>'merchant'],function(){

        Route::get('/merchants',[
            'uses'=>'Api\MerchantController@getMerchants'
        ]);
        Route::get('/merchant/{id}',[
            'uses'=>'Api\MerchantController@getMerchantData'
        ]);
        Route::get('/services/{mid}',[
            'uses'=>'Api\MerchantController@getMerchantServices'
        ]);
    });

    Route::group(['prefix'=>'customer'],function (){

        Route::post('/add-appointment',[
            'uses'=>'Api\AppointmentController@addAppointmentFromCustomer'
        ]);
        Route::get('/my-appointments',[
            'uses'=>'Api\AppointmentController@getMyAppointments'
        ]);
    });

});

//register new customer and generate api_token
Route::post('/register-customer', [
    'uses'=>'Api\CustomerRegistrationController@addCutomerUser'
]);

