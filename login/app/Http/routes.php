<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // if(Auth::check()){
    //     return "The user is logged in";
    // }
    //
    //admin page
    // $username = 'gabri';
    // $password = 'ciao1234';
    // if(Auth::attempt(['username'=>$username, 'password'=>$password])){
    //     return redirectTo()->intended('/admin');
    // }
});

Route::auth();

Route::get('/home', 'HomeController@index');
