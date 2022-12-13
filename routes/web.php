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
    Route::resource('wishes', App\Http\Controllers\WishController::class);
});
Route::middleware(['auth'])->group(function(){
    Route::get('groups/members/{group}','App\Http\Controllers\GroupController@members')->name('groups.members');
    Route::delete('groups/{group}/{id}','App\Http\Controllers\GroupController@leave')->name('groups.leave');
    Route::resource('groups',App\Http\Controllers\GroupController::class);
});

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

