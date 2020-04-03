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
Route::group(['middleware'=>['auth']],function(){
    // Route::get('/admin',function(){
    //     return view('admin.dashboard');
    // });
    // Route::get('/apply','ApplyController@index');
    // Route::post('/form','ApplyController@store');
    Route::resource('apply','ApplyController');
    Route::get('/applications',function(){
        $user=Auth::user();
        if(Auth::user()->usertype=='admin')
        return redirect('/home');
        else
        return view('main.application')->with('user',$user);
    });
});

Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/admin','AdminController@index');
    Route::get('/edit/{id}','AdminController@edit');
    Route::put('/update/{id}','AdminController@update');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

