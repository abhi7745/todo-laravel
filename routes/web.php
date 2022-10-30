<?php

use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\TodoController;
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

// Route::get('/', function () {
//     return view('welcome', ['name'=> 'abhijith']);
// });

// case 1 - routing format
// Route::get('/', "App\Http\Controllers\TodoController@home");

// case 1 - routing format
Route::get('/', [TodoController::class, 'home']);


Route::get('/api', [NewController::class, 'api']);


Route::get('/about-us', function(){
    return view('about', ['title'=> 'About Title']);
});

Route::get('contact', function(){
    return view('contact', ['title'=> 'Contact Title']);
});