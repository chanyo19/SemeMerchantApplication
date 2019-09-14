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
        Route::get('/merchant/{id}/{date}',[
            'uses'=>'Api\MerchantController@getMerchantData'
        ]);
        Route::get('/services/{mid}',[
            'uses'=>'Api\MerchantController@getMerchantServices'
        ]);
        Route::post('/merchantsearch',[
            'uses'=>'Api\MerchantController@getMerchantByQuery'
        ]);
        Route::get('/get-merchant-by-service/{id}',[
            'uses'=>'Service\ServiceController@getMerchantsByService'
        ]);
    });

    Route::group(['prefix'=>'customer'],function (){

        Route::post('/add-appointment',[
            'uses'=>'Api\AppointmentController@addAppointmentFromCustomer'
        ]);
        Route::get('/my-appointments',[
            'uses'=>'Api\AppointmentController@getMyAppointments'
        ]);
        Route::get('/logout','Api\CustomerRegistrationController@logoutCustomer');
    });
    Route::group(['prefix'=>'services'],function (){

        Route::get('/getservices','Service\ServiceController@getAllActiveServices');
    });

});

//register new customer and generate api_token
Route::post('/register-customer', [
    'uses'=>'Api\CustomerRegistrationController@addCustomerUser'
]);
//register new customer and generate api_token
Route::post('/login-customer', [
    'uses'=>'Api\CustomerRegistrationController@loginCustomerUser'
]);
