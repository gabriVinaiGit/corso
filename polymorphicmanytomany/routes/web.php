<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
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

/*
|--------------------------------------------------------------------------
| Eloquent Polymorphic Many to Many Relationship CRUD
|--------------------------------------------------------------------------
*/

Route::get('/create', function () {
    $post = Post::create(['name'=>'My first post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);
    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);
    return "Create done";
});

Route::get('/read', function () {

});

Route::get('/update', function () {
    //update the first row of tags tabel where name = PHP
    // $post = Post::findOrFail(1);
    // foreach ($post->tags as $tag) {
    //     return $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
    // }

    //add new taggable
    // $post = Post::find(1);
    // $tag = Tag::find(2);
    // $post->tags()->save($tag);


    $post = Post::findOrFail(1);
    $tag = Tag::find(3);
    $post->tags()->save($tag);
    $post->tags()->attach($tag);
    $post->tags()->sync([1]); //se non trova ne aggiunge uno alla fine

});

Route::get('/delete', function () {
    $post = Post::find(2);
    foreach ($post->tags as $tag) {
        $tag->whereId(2)->delete();
    }
    return "Delete done";
});
