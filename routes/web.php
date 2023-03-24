<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Models\Hashtag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::any('only-i-can-get-here/bootstrap',function(){
    echo "<h1> i am here ok?</h1>";
    $exitCode = Artisan::call('migrate');
    Artisan::call('db:seed');
    echo "<h2>my work is done.</h2>";
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */


Route::get('/', [TweetController::class,'index']);

Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/login',[AuthenticatedSessionController::class,'store']);

Route::get('/hashtags/{hashtag}',[HashtagController::class,'show'])->name('hashtags.show');

Route::any('/tweets/{tweet}/like',[TweetController::class,'like']);
Route::any('/tweets/{tweet}/unlike',[TweetController::class,'unlike']);

Route::any('/users/login',[UserController::class,'loginOrCreate']);
Route::any('/users/get',[UserController::class,'getUserInfo']);

Route::any('/tweets/store',[TweetController::class,'store']);
Route::get('/users/{id}',[UserController::class,'show']);

Route::get('/users/{user}/follow',[UserController::class,'follow']);
Route::get('/users/{user}/unfollow',[UserController::class,'unfollow']);
Route::get('/users/{user}/followOrUnfollow',[UserController::class,'followOrUnfollow']);

Route::any('tests',function()
{
    // Hashtag::withCount('hashtag')->join('tweet_has_hashtag','=','hashtag')->select('')
    // return DB::table('tweet_has_hashtag')->select('hashtag')->groupBy('hashtag')->orderBy('hashtag','DESC')->get();
    return Hashtag::withCount('tweets')->orderBy('tweets_count','desc')->limit(5)->get();
});
