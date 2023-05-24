<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', function() {
    return redirect()->route('login');
});

Route::resource('users', 'UserController')->names('users');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('pets', 'PetController')->names('pets');
Route::resource('services', 'serviceController')->names('services');
Route::resource('sales', 'SaleController')->names('sales');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
