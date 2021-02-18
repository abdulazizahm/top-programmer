<?php
/* to make auth
composer require laravel/ui
php artisan ui vue --auth
php artisan migrate
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories;
use App\Http\Controllers\HomeController;

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
Route::namespace('App\Http\Controllers\BackEnd')->prefix('admin')->middleware('admin')->group(function ()
{
    Route::get('/','Home@index')->name('admin.home');
    Route::resource('categories','Categories')->except(['show']);
    Route::resource('users','Users')->except(['show']);
    Route::resource('skills','Skills')->except(['show']);
    Route::resource('tags','Tags')->except(['show']);
    Route::resource('pages','Pages')->except(['show']);
    Route::resource('videos','Videos')->except(['show']);
    Route::resource('messages','Messages')->only(['index','destroy','edit']);
    Route::post('messages/replay/{id}',[\App\Http\Controllers\BackEnd\Messages::class,'Massage'])->name('replay.message');


    Route::post('comments','Videos@commentStore')->name('comment.store');
    Route::get('comments/{id}','Videos@commentDelete')->name('comment.delete');
    Route::post('comments/{id}','Videos@commentUpdate')->name('comment.update');
    //Route::post('videos/{video}/edit','videos@edit')->name('videos.edit');

    /*Route::get('users','Users@index');
    Route::get('users/create','Users@create');
    Route::post('users','Users@store');
    Route::get('users/{id}','Users@edit');
    Route::post('users/{id}','Users@update');
    Route::get('users/delete/{id}','Users@delete');*/
});
/*Route::get('contact-us/store',[
    'uses'=>'HomeController@messageStore',
    'as'=>'contact.message',
]);*/

Auth::routes();



Route::get('/',[HomeController::class,'welcome'])->name('frontent.landing');
Route::get('/contact-us',[HomeController::class,'messageStore'])->name('contact.message');
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('skill/{id}', [HomeController::class,'skill'])->name('front.skill');
Route::get('tag/{id}', [HomeController::class,'tag'])->name('front.tag');
Route::get('category/{id}', [HomeController::class,'category'])->name('front.category');
Route::get('page/{id}/{slug?}', [HomeController::class,'page'])->name('front.pages');
Route::get('profile/{id}/{slug?}', [HomeController::class,'profile'])->name('front.profile');
Route::get('video/{id}', [HomeController::class,'video'])->name('frontend.video');
    //Route::get('contact-us/store','HomeController@messageStore')->name('contact.message');





Route::middleware('admin')->group(function ()
{
    Route::post('comments/{id}', [HomeController::class, 'commentUpdate'])->name('frontend.commentUpdate');
    Route::post('comments/store/{id}', [HomeController::class, 'commentStore'])->name('frontend.commentStore');
    Route::post('profile', [HomeController::class,'profileUpdate'])->name('profile.update');
});



