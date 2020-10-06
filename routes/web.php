<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'HomeController');

Route::get('/about', function(Request $request) {
    // return $request->fullUrl(); // mengambil semua url
    // return $request->path(); // hanya mengambil url ujungnya saja
    // return $request->is('about') ? 'benar' : 'salah'; // mengecek apakah kita berada dihalaman about atau tidak

    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('posts', 'PostController@index');
Route::get('posts/create', 'PostController@create');
Route::post('posts/store', 'PostController@store');
Route::get('posts/{slug}', 'PostController@show');

// route wild card atau biasa disebut route yang ada parameternya
// Route::get('posts/{slug}', 'PostController@show');


