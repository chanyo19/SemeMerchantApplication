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