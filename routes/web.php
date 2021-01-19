<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();




Route::group(['prefix'=>'admins','namespace'=>'Admins','middleware'=>['auth']],function(){
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');

   //users
    Route::get('index_user','UserController@index_user')->name('index_user');
    Route::get('create_user','UserController@create_user')->name('create_user');
    Route::post('create_user_store','UserController@create_user_store')->name('create_user_store');
    Route::get('update_user/{id}','UserController@update_user')->name('update_user');
    Route::post('update_user_store/{id}','UserController@update_user_store')->name('update_user_store');
    Route::get('delete_user/{id}','UserController@delete_user')->name('delete_user');

    //permissions
    Route::get('index_permissions','PermissionsController@index_permissions')->name('index_permissions');
    Route::get('create_permissions','PermissionsController@create_permissions')->name('create_permissions');

    Route::get('update_permissions','PermissionsController@update_permissions')->name('update_permissions');

    //roles
    Route::get('index_roles','RolesController@index_roles')->name('index_roles');
    Route::get('create_roles','RolesController@create_roles')->name('create_roles');
    Route::post('create_roles_store','RolesController@create_roles_store')->name('create_roles_store');
    Route::get('update_roles/{id}','RolesController@update_roles')->name('update_roles');
    Route::post('update_roles_store/{id}','RolesController@update_roles_store')->name('update_roles_store');
    Route::get('delete_roles/{id}','RolesController@delete_roles')->name('delete_roles');



    // الراوتس اللي هتعمل عليها البيرميشنز
    // Category , Client , Order , Product و زي ما انتي عايزه بعد كده زودي المهم تحطيه ف
    // config , laratrust seeder
    Route::get('category','PermissionsController@category')->name('category.index');
    Route::get('client','PermissionsController@client')->name('client.index');
    Route::get('order','PermissionsController@order')->name('order.index');
    Route::get('product','PermissionsController@product')->name('product.index');

});
