<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

/*
|--------------------------------------------------------------------------
| Eloquent One To Many relationship CRUD
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

//create post for first user
Route::get('/create', function () {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first post', 'body'=>'First body with onetomany relationship']);
    $user->posts()->save($post);
});

//read all title of first user
Route::get('/read', function () {
    $user = User::findOrFail(1);
    foreach ($user->posts as $post) {
        echo $post->title. "<br>";
    }
});

//update title and body of the first user
Route::get('/update', function () {
    $user = User::find(1);
    $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awesome']);
});

//delete first post of user where user id = 1
Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(1)->delete();
    return "done";
});
