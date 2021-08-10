<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return view('frontend.index');
});
Route::get("/admin", function(){
    return view("admin.index");
});
//create
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category',[CategoryController::class,'store']);


//route to category
Route::get('/category', [CategoryController::class,'index']);
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}',[CategoryController::class,'delete'])->name('category.destroy');

//StackOver
// Route::get('/post','PostController@index')->name('post.index');
//     Route::get('/post/create','PostController@create')->name('post.create');
//     Route::post('/post','PostController@store')->name('post.store');
//     Route::get('/post/{post}','PostController@show')->name('post.show');
    Route::delete('/post/{post}','PostController@destroy')->name('post.destroy');
//     Route::get('/post/{post}/edit','PostController@edit')->name('post.edit');
//     Route::put('/post/{post}','PostController@update')->name('post.update');
//     Route::resource('category', 'CategoryController');