<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use Carbon\Carbon;

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

// Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function(){
//     return "Hi about page";
// });

// Route::get("/admin/post/example", array('as' => 'admin.home', function(){
//     $url = route('admin.home');
//     return "this url is: " . $url;
// }));

// Route::resource('posts', '\App\Http\Controllers\PostsController');

// Route::get('contact', '\App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}/{name}/{password}', '\App\Http\Controllers\PostsController@show_post');

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|---------------------------------------------------------------------------
*/

// INSERT EXAMPLE
// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?,?)', ['Lavarel is awesome', 'Laravel is the best thing that has happened to PHP, PERIOD']);
// });

// SELECT EXAMPLE
// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?', [1]);
//     return var_dump($results);
//     // foreach($results as $post){
//     //     return $post->title;
//     // }
// });

// UPDATE EXAMPLE
// Route::get('/update', function(){
//     $updated = DB::update('update posts set title="Update Title"where id=?', [1]);
//     return $updated;
// });

// DELETE EXAMPLE
// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id=?', [1]);
//     return $deleted;
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT
|---------------------------------------------------------------------------
*/

//READ WITH ELOQUENT
// Route::get('/read', function(){
//     $posts = Post::all();
//     foreach($posts as $post) {
//         return $post->title;
//     }
// });

// FIND WITH ELOQUENT
// Route::get('/find', function(){
//     $posts = Post::find(2); //2 id of row of table , id=1 not exist
//     return $posts->title;
// });

//FIND WHERE WITH ELOQUENT
// Route::get('/findWhere', function(){
//     $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//     return $posts;
// });

//FIND MORE WITH ELOQUENT
// Route::get('/findMore', function(){
//     // $posts = Post::findOrFail(2);
//     // return $posts;
//     $posts = Post::where('users_count', '<', 50)->findOrFail();
// });

//INSERT WITH ELOQUENT
// Route::get('/basicInsert', function(){
//     $post = new Post;

//     $post->title = 'New eLoquent title insert';
//     $post->content = 'Wow eloquent is really cool, look at this content';

//     $post->save();
// });

//INSERT WITH MODEL AND ELOQUENT
// Route::get('/basicInsert2', function(){
//     $post = Post::find(2);

//     $post->title = 'New eLoquent title insert 2';
//     $post->content = 'Wow eloquent is really cool, look at this content 2';

//     $post->save();
// });

//CREATE WITH ELOQUENT
// Route::get('/create', function(){
//     Post::create(['title'=>'the create method', 'content' => 'WOW I am learning a lot']);
// });

//UPDATE WITH ELOQUENT, WITH WHERE CLAUSE
// Route::get('update', function(){
//     Post::where('id', 2)->where('is-admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'New content update']);
// });

//DELETE SINGLE RECORD WITH ELOQUENT, WITH FIND METHOD
// Route::get('/delete', function(){
//     $post = Post::find(8);
//     $post->delete();
// });

//DELETE SINGLE RECORD WITH ELOQUENT, WITH DESTROT METHOD
// Route::get('/delete2', function(){
//     Post::destroy(3);
// });

// //DELETE MUTIPLE RECORD WITH ELOQUENT, WITH DESTROT METHOD
// Route::get('/delete3', function(){
//     Post::destroy([4,5]);
//     //Post::where('is_admin', 0)->delete(); RECCOMENDED PUT A CLAUSE
// });

// SET VALUE TO deleted_at COLUMN INSTEAD OF NULL
// Route::get('/softDelete', function(){
//     Post::find(7)->delete();
// });

// READ SOFT DELETE THANKS TO TRASHED
// Route::get('/readSoftDelete', function(){
//     // $post = Post::find(6);
//     // return $post;            with this, not show the result

//      $post = Post::onlyTrashed()->where('is-admin', 0)->get();
//      return $post;

//     $post = Post::withTrashed()->where('is-admin', 0)->get();
//     return $post;
// });

// RESTORE delete_at columns from date value to 0
// with trash method I don't delete permanently the column but temporarily
// Route::get('/restore', function(){
//     Post::withTrashed()->where('is-admin', 0)->restore();
// });

// DELETE PERMANENTLY
// Route::get('/forceDelete', function(){
//     Post::onlyTrashed()->where('is-admin', 0)->forceDelete();
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship - one to one
|---------------------------------------------------------------------------
*/

//SEARCH USER BY ID AS PARAMETERS nella tabella post
// Route::get('/user/{id}/post', function($id){
//     return User::find($id)->post;
//     // return User::find($id)->post->content; per estrarre il contenuto di content
// });

//SEARCH USER BY ID AS PARAMETERS nella tabella users
// Route::get('/post/{id}/user', function($id){
//     return Post::find($id)->user->name;
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship - one to many
|---------------------------------------------------------------------------
*/

// SEARCH POST WITH ID = 1
// Route::get('/posts', function(){
//     $user = User::find(1);
//     foreach ($user->posts as $post) {
//         return $post->title . "<br>";
//     }
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship - many to many
|---------------------------------------------------------------------------
*/

// PRINT USER ROLE BY ID
// Route::get('/user/{id}/role', function($id){
//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
//     return $user;
//     // foreach ($user->roles as $role) {
//     //     return $role->name;
//     // }
// });

// Accessing the intermediate table / pivot
// Route::get('user/pivot', function(){
//     $user = User::find(1);
//     foreach ($user->roles as $role) {
//         return $role->pivot->created_at;
//     }
// });

// RETURN TITLE OF POST
// Route::get('/user/country', function(){
//     $country = Country::find(1);
//     foreach ($country->posts as $post) {
//         return $post->title;
//     }
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship - polymorphic relations
|---------------------------------------------------------------------------
*/

// GET PATH OF PHOTO BY USER ID
// Route::get('user/photos', function(){
//     $user = User::find(1);
//     foreach ($user->photos as $photo) {
//         return $photo->path;
//     }
// });

// GET IMAGE PATH BY ID OF POST TABLE
// Route::get('post/{id}/photos', function($id){
//     $post = Post::find($id);
//     foreach ($post->photos as $photo) {
//         echo $photo->path . "<br>";
//     }
// });

// GET POST BY ID
// Route::get('photo/{id}/post', function($id){
//     $photo = Photo::findOrFail($id);
//     return $photo->imageable;

// });

// GET TAG NAME THANKS TO FIND IN POST TABLE
// Route::get('/post/tag', function(){
//     $post = Post::find(1);
//     foreach ($post->tags as $tag) {
//         echo $tag->name;
//     }
// });

// Route::get('/tag/post', function(){
//     $tag = Tag::find(2);
//     foreach ($tag->posts as $post) {
//         echo $post->title;
//     }
// });


Route::group(['middleware'=>'web'], function(){
    Route::resource('/posts', 'App\Http\Controllers\PostsController');
    Route::get('/dates', function(){
        $date = new DateTime('+1 week');
        echo $date->format('m-d-Y');
        echo '<br>';
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo '<br>';
        echo Carbon::now()->subMonths(5)->diffForHumans();
        echo '<br>';
        echo Carbon::now()->yesterday()->diffForHumans();
        echo '<br>';
    });
    Route::get('/getName', function(){
        $user = User::find(1);
        echo $user->name;
    });
    Route::get('/setName', function(){
        $user = User::find(1);
        $user->name = 'william';
        $user->save();
    });
});
