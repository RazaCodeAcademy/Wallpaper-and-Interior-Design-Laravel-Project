<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/interior-designers', 'IndexController@interior_designers')->name('home.interior_designers');
Route::get('/contact', 'IndexController@contact')->name('home.contact');
Route::get('/about', 'IndexController@about')->name('home.about');
Route::get('/home', 'Admin\DashboardController@index')->name('admin.index');
Route::get('/clients/{id}', 'Admin\ClientController@show')->name('clients.show');
Route::get('/', 'IndexController@index');
Route::post('/notifications', 'Admin\NotificationController@store')->name('notifications.store');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', 'Admin\DashboardController@index')->name('admin.index');
    /*
    |--------------------------------------------------------------------------
    | Posts Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/posts', 'Admin\PostController@index')->name('posts.index');
    Route::post('/posts/store', 'Admin\PostController@store')->name('posts.store');
    Route::put('/posts/{id}', 'Admin\PostController@update')->name('posts.update');
    Route::delete('/posts/{id}', 'Admin\PostController@destroy')->name('posts.destroy');
    /*
    |--------------------------------------------------------------------------
    | Categories Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/categories', 'Admin\CategoryController@index')->name('categories.index');
    Route::post('/categories/store', 'Admin\CategoryController@store')->name('categories.store');
    Route::put('/categories/{id}', 'Admin\CategoryController@update')->name('categories.update');
    Route::delete('/categories/{id}', 'Admin\CategoryController@destroy')->name('categories.destroy');
    /*
    |--------------------------------------------------------------------------
    | Employees Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/employees', 'Admin\EmployeeController@index')->name('employees.index');
    Route::post('/employees/store', 'Admin\EmployeeController@store')->name('employees.store');
    Route::put('/employees/{id}', 'Admin\EmployeeController@update')->name('employees.update');
    Route::delete('/employees/{id}', 'Admin\EmployeeController@destroy')->name('employees.destroy');
    /*
    |--------------------------------------------------------------------------
    | Projects Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/projects', 'Admin\ProjectController@index')->name('projects.index');
    Route::post('/projects/store', 'Admin\ProjectController@store')->name('projects.store');
    Route::put('/projects/{id}', 'Admin\ProjectController@update')->name('projects.update');
    Route::delete('/projects/{id}', 'Admin\ProjectController@destroy')->name('projects.destroy');
    /*
    |--------------------------------------------------------------------------
    | Payments Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/payments', 'Admin\PaymentController@index')->name('payments.index');
    Route::post('/payments/store', 'Admin\PaymentController@store')->name('payments.store');
    Route::put('/payments/{id}', 'Admin\paymentController@update')->name('payments.update');
    Route::delete('/payments/{id}', 'Admin\paymentController@destroy')->name('payments.destroy');
    /*
    |--------------------------------------------------------------------------
    | Clients Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/clients', 'Admin\ClientController@index')->name('clients.index');
    Route::post('/clients/store', 'Admin\ClientController@store')->name('clients.store');
    Route::put('/clients/{id}', 'Admin\ClientController@update')->name('clients.update');
    Route::delete('/clients/{id}', 'Admin\ClientController@destroy')->name('clients.destroy');
    /*
    |--------------------------------------------------------------------------
    | Accounts Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/account', 'Admin\AccountController@index')->name('account.index');
    Route::post('/account/store', 'Admin\AccountController@store')->name('account.store');
    Route::put('/accounts/{id}', 'Admin\AccountController@update')->name('accounts.update');
    Route::delete('/accounts/{id}', 'Admin\AccountController@destroy')->name('accounts.destroy');
    /*
    |--------------------------------------------------------------------------
    | Notifications Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/notifications', 'Admin\NotificationController@index')->name('notifications.index');
    Route::post('/notifications/show', 'Admin\NotificationController@show')->name('notifications.show');
});
