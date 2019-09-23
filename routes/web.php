<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Jobs\SendPushNotification;

Route::get('/', function () {
   return redirect('/login');
 });
//Auth::routes();

Auth::routes();
//Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/dashboard', 'DashBoardController@index')->name('dashboard');

//Settings admin
//setting up menu
Route::get('/add-menu-item',[

    'uses'=>'Settings\MenuController@index'
])->middleware('auth');
Route::post('addmenu',[
    'uses'=>'Settings\MenuController@addMenu'
])->middleware('auth');

//Add customer to merchant
Route::post('/add-customer-merchant',[
    'uses'=>'Customer\CustomerController@addCutomerToMerchant'
])->name('add-customer-merchant')->middleware('auth');

//view all customers belongs to spa
Route::get('/view-my-customers',[
    'uses'=>'Customer\CustomerController@mycustomers'
]);

//add services
Route::get('/add-service',[
    'uses'=>'Service\ServiceController@index'
]);
Route::post('/addservice',[
    'uses'=>'Service\ServiceController@store'
])->name('addservice');
Route::get('/delete-service/{service_i}',[
    'uses'=>'Service\ServiceController@delete'
]);



Route::get('view-my-history-appointments',[
 'uses'=>'Appointment\AppointmentController@index'
]);
Route::get('view-my-today-appointments',[
    'uses'=>'Appointment\AppointmentController@todaymyappointments'
]);

//view single appointment
Route::get('/view_appointment/{appointment_id}',[
    'uses'=>'Appointment\AppointmentController@viewAppointment'
]);

Route::post('/update-appointment',[
    'uses'=>'Appointment\AppointmentController@updateAppointment'
]);

Route::get('/notify-customer/{email}/{appointment}',[
    'uses'=>'Appointment\AppointmentController@notifyCustomer'
]);
Route::get('/generate-invoice/{app_id}',[
    'uses'=>'Invoice\InvoiceController@index'
]);
Route::post('/send-invoice',[
    'uses'=>'Invoice\InvoiceController@send'
]);

//add staff route
Route::group(['prefix' => 'merchant',  'middleware' => 'auth'], function()
{

    Route::get('/add-staff', [
         'uses'=>'Staff\StaffController@index'
    ]);
    Route::post('/add-staff', [
        'uses'=>'Staff\StaffController@store'
    ]);
    Route::get('/add-facility', [
        'uses'=>'Facility\FacilityController@index'
    ]);
    Route::post('/add-facility', [
        'uses'=>'Facility\FacilityController@store'
    ]);
});
Route::get('/send',function (){

});