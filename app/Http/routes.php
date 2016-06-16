<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

Route::get('/',[
    'as'=>'info',
    'uses'=>'AngularController@show_angular_page'
]);
Route::post('save',[
    'as'=>'save',
    'uses'=>'AngularController@save'
]);
//--------------Using angular show data with pagination
Route::get('angular/show/{pagID}',[
    'as'=>'angular.show',
    'uses'=>'AngularController@show_angular'
]);//Response URL

Route::get('totalItemsLength',[
    'as'=>'totalItemsLength',
    'uses'=>'AngularController@totalItemsLength'
]);
//-------------------------
Route::post('update', [
    'as'=>'update',
    'uses'=> 'AngularController@update'
]);
Route::get('delete/{id}',[
    'as'=>'delete',
    'uses'=> 'AngularController@delete'
]);

Route::get('shopping/cart',[
    'as'=>'shopping.cart',
    'uses'=>'AngularController@shopping_cart_create'
]);

});