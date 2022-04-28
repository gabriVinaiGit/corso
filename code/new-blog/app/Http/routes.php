<?php

Route::get('/', function(){
    return view('welcome');
});

Route::get('/about', function(){
    return 'Hi about page';
});

Route::get('/contact', function(){
    return 'Hi contact page';
});

?>
