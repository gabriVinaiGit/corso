<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;
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
| Eloquent One To One Relationship CRUD
|--------------------------------------------------------------------------
*/

Route::get('/insert', function () {
    $user = User::findOrFail(1);
    $address = new Address(['name'=>'4435 Paulina av NY NY 11218']);
    $user->address()->save($address);
});

//find user address
Route::get('/update', function () {
    $address = Address::where('user_id', '=', 1)->first();
    $address->name = "4535 Update Av, alaska";
    $address->save();
});

//read address name in table Addresses with id of user table =1
Route::get('/read', function () {
    $user = User::findOrFail(1);
    echo $user->address->name;
});

//delete
Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->address()->delete();
    return "done";
});
