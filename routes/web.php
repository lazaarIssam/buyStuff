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

//Gestion des Restaurants
Route::get('/restaurants', 'RestaurantController@index')->name('restaurants.index');
Route::post('/restaurants/storeTestaurants', 'RestaurantController@store')->name('restaurants.store');
Route::post('/updateRestaurants', 'RestaurantController@update')->name('restaurants.update');
Route::post('/restaurants/{id}', 'RestaurantController@destroy')->name('restaurants.destroy');
//fin de la liste

//Gestion des types 
Route::get('/types', 'TypeController@index')->name('types.index');
Route::post('/types/storeTypes', 'TypeController@store')->name('types.store');
Route::post('/updateTypes', 'TypeController@update')->name('types.update');
Route::post('/types/{id}', 'TypeController@destroy')->name('types.destroy');
//fin de la liste

//Gestion des typesproduits 
Route::get('/typeproduits', 'TypeproduitController@index')->name('typeproduits.index');
Route::post('/typeproduits/storeTypeproduits', 'TypeproduitController@store')->name('typeproduits.store');
Route::post('/updateTypeproduits', 'TypeproduitController@update')->name('typeproduits.update');
Route::post('/typeproduits/{id}', 'TypeproduitController@destroy')->name('typeproduits.destroy');
//fin de la liste