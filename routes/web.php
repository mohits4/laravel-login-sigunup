<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;

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
//Auth::routes();

Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@doRegister')->name('register');

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@doLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'admin']], function(){
Route::get('admin-dashboard', 'AdminController@adminDashboard')->name('admin-dashboard');
Route::get('admin-dashboard/delete/{id}', 'AdminController@delete');
Route::get('admin-dashboard/{id}/edit', 'AdminController@update')->name('admin-dashboard.update');
Route::post('admin-dashboard/{id}', 'AdminController@edit')->name('admin-dashboard.edit');

Route::get('connection-list', 'ConnectionController@index')->name('connection-list');
Route::get('connection-list/delete/{id}', 'ConnectionController@delete');

Route::get('getUserData', 'ConnectionController@getUserData');
Route::post('connection/update/{id}', 'ConnectionController@update');


Route::post('connection/store','ConnectionController@store');


});



Route::get('/home', 'HomeController@home')->name('home');
Route::get('status', 'AdminController@status')->name('status');

Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');

// Route::group(['middleware'  => ['auth','admin']], function () {
	// Route::get('/dashboard', 'Admin\AdminController@index');
	// Route::get('/user-list', 'Admin\AdminController@userList');
	// Route::get('/register-user', 'Admin\AdminController@registerUser');
	// Route::post('/registeruser', 'Admin\AdminController@storeUser')->name('registeruser'); 
	// Route::delete('/user-delete/{id}', 'Admin\AdminController@deleteUser');   
	// Route::get('/getUserData', 'Admin\AdminController@getUserData');
	// Route::post('/updateUserData', 'Admin\AdminController@updateUserData');
	// Route::post('/updateUserStatus', 'Admin\AdminController@updateUserStatus');
	// Route::get('/upload-file', 'Admin\AdminController@uploadFiles');
	// Route::post('/upload-project', 'Admin\AdminController@uploadProject');
	// Route::get('/project-list', 'Admin\AdminController@projectLists');
// });


