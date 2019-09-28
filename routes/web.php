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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('/verify', 'UserController@update');

Route::get('/apply-loan/{lender}', 'LoanController@show');
Route::post('/apply-loan/{lender}', 'LoanController@store');
Route::get('/loan-requests', 'LoanController@index');
Route::patch('/loan-request/{loan}', 'LoanController@update');
Route::get('/payment-schedules/{loan}', 'PaymentScheduleController@show');
