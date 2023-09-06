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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/silver', function () {
    return view('silver');
});
// Route::view('/{path?}', 'homepage');

Route::get('assets/{path}', function ($path) {
    return response()->file(public_path("assets/$path"));
});

Route::get('wp-content/{path}', function ($path) {
    return response()->file(public_path("wp-content/$path"));
});
Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

Route::get('wp-includes/{path}', function ($path) {
    return response()->file(public_path("wp-includes/$path"));
});
// Route::get('silver_files/{path}', function ($path) {
//     return response()->file(public_path("silver_files/$path"));
// });