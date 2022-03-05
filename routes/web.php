<?php

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
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

Route::get('/foo', '\App\Http\Controllers\TestController@foo');
Route::get('/bar', '\App\Http\Controllers\TestController@bar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/user/{id}', function ($id) {
//    return new UserResource(User::findOrFail($id));
//});
//
//Route::get('/users', function () {
//    return  UserResource::collection (User::all());
//});

Route::get('/users', function () {
    return new \App\Http\Resources\User(User::all()->skip(2));
});
