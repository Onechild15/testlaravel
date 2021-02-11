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

 Route::get('/chart', function () {
    return view('chart');
}); 
 Route::get('/dashboard', function () {
    return view('dashboard');
}); 

 Route::get('/milbrnch', function () {
    return view('milbrnch');
}); 
/*
Route::get('/export', function () {
    return view('milbrnch');
});
*/
Route::get('/export', 'TestController@export');

Route::resource('sharks', 'sharkController');
Route::get('/sharks/{id}', ['uses' => 'sharkController@show']);
Route::get('/sharks/edit/{id}', ['uses' => 'sharkController@edit']);