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
    return view('login');
});

Route::post('/login', 'UserController@login')->name('login');
Route::get('/register', 'UserController@registerIndex')->name('register.index');
Route::post('/register', 'UserController@register')->name('register');
Route::get('/signout', 'UserController@signout')->name('signout');
Route::get('/ownerSignout', 'UserController@ownerSignout')->name('ownerSignout');

Route::get('/ownerLogin', 'UserController@ownerLoginView')->name('ownerLoginView');
Route::post('/ownerLogin', 'UserController@ownerLogin')->name('ownerLogin');
Route::get('/ownerRegister', 'UserController@ownerRegisterView')->name('ownerRegisterView');
Route::post('/ownerRegister', 'UserController@ownerRegister')->name('ownerRegister');
Route::get('/ownerSignout', 'UserController@ownerSignout')->name('ownerSignout');


Route::get('/review', 'ReviewController@index')->name('review.index');
Route::post('/review', 'ReviewController@review')->name('review');
Route::get('/allReviews', 'ReviewController@allReviews')->name('allReviews');
Route::get('/myRestaurantReview', 'ReviewController@myRestaurantReview')->name('myRestaurantReview');
Route::put('/reviewUpdate/{id}', 'ReviewController@reviewUpdate')->name('review.update');



