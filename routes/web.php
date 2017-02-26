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

//Basic
Route::get('/', function () { return view('welcome'); });
Route::get('/terms', function () { return view('terms'); });

//User
Route::group(['middleware' => 'auth'], function () {

    //Monetize
    Route::get('/home', 'MonetizeController@index')->name('home');
    Route::post('/plan', 'PlanController@store')->name('plan.store');
    Route::post('/account', 'AccountController@store')->name('account.store');
    Route::get('/verify', 'AccountController@edit')->name('account.edit');
    Route::put('/account', 'AccountController@update')->name('account.update');
    Route::resource('banks', 'BankController');
    Route::get('/balance', 'BalanceController@index')->name('balance.index');


    //Rewards
    Route::resource('rewards', 'RewardController');

    //Purchases
    Route::get('/purchases', 'PurchaseController@index')->name('purchases.index');
    Route::put('/purchases/{id}', 'PurchaseController@update')->name('purchases.update');

});

Auth::routes();

Route::get('/{id}', 'PurchaseController@create')->name('purchases.create');
Route::post('/{id}', 'PurchaseController@store')->name('purchases.store');
