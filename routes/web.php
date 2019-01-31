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



//  Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{view?}', function () {
    return view('layouts/master');
})->where('view', '[\/\w\.-]*')->name('master');



Auth::routes();
//Route::post('login', 'API\LoginController@login');
//Route::post('register', 'API\LoginController@register');
//Route::group(['middleware' => 'auth:api'], function(){
//Route::post('details', 'API\LoginController@details');
//});
Route::get('/home', 'HomeController@index')->name('home');

/*Route::middleware('auth')->group(function() {
    Route::get('/{view?}', function () {
        return view('master');
    })->where('view', '[\/\w\.-]*')->name('master');
    
   
});
*/


