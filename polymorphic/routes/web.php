<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;

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
| Eloquent Polymorphic Relationship CRUD
|--------------------------------------------------------------------------
*/

Route::get('/create', function () {
    $staff = Staff::find(1);
    $staff->photos()->create(['path' => 'example.jpg']);
    return "Creation done";
});

Route::get('/read', function () {
    $staff = Staff::findOrFail(1);
    foreach ($staff->photos as $photo) {
        return $photo->path;
    }
});

Route::get('/update', function () {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "Update example.jpg";
    $photo->save();
    return "Update done";
});

Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);
    $staff->photos()->whereId(1)->delete();
    return "Delete done";
});

Route::get('/assign', function () {
    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFail(1);
    $staff->photos()->save($photo);
    return "Asssign done";
});

Route::get('/un-assign', function () {
    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFail(1);
    $staff->photos()->whereId(1)->update(['imageable_id'=>'0','imageable_type'=>'0']);
    return "Un-asssign done";
});


