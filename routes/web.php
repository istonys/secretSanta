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


Route::middleware(['auth'])->group(function(){
    Route::get('wishes/r/{gift}','App\Http\Controllers\WishController@reserve')->name('wishes.reserve');
    Route::get('wishes/g/{group}','App\Http\Controllers\WishController@wish_pull')->name('wishes.wish_pull');
    Route::resource('wishes', App\Http\Controllers\WishController::class);
});
Route::middleware(['auth'])->group(function(){
    Route::get('groups/members/{group}','App\Http\Controllers\GroupController@members')->name('groups.members');
    Route::get('groups/pull/{group}','App\Http\Controllers\GroupController@pull')->name('groups.pull');
    Route::delete('groups/{group}/{id}','App\Http\Controllers\GroupController@leave')->name('groups.leave');
    Route::resource('groups',App\Http\Controllers\GroupController::class);
});
Route::middleware(['auth'])->group(function(){
    Route::resource('gifts', App\Http\Controllers\GiftsController::class);
});
Route::middleware(['auth'])->group(function(){

    Route::resource('invites',App\Http\Controllers\InviteController::class);

});

Auth::routes();


Route::get('/', function () {

    return redirect('/login');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

