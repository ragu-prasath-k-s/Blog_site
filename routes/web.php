<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('register');
});

Route::get('register',function (){
    return view('register');
})->middleware('guest');

Route::get('login',function (){
    return view('login');
})->name('login')->middleware('guest');

Route::post("authenticateduser",[UserController::class,'login']);

Route::resource('user',UserController::class);

Route::get('home',function (){
    return view('dashboard');
})->middleware('auth');

Route::get('logout',[UserController::class,'logout']);

Route::get('create',function (){
    return view('Blog/create');
});

Route::get('post', function () {
    $user = Auth::user();
    $posts = Blog::where('user_id',$user->id)->where('status','active')->get();

    return view('Blog/index', compact('posts'))->with('success', session('success'));
})->name('post');

Route::resource('blog',BlogController::class);
