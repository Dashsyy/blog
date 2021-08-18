<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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


//route for category
Route::get('/category', [CategoryController::class,'index']);
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}',[CategoryController::class,'delete'])->name('category.destroy');

//route for Post
Route::resource('/post', 'PostController');

//auth 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
