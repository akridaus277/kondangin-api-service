<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

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


Route::get('/register', function () {
    return view('register');
});


// Route::get('/amethystSatu', function () {
//     return view('amethystSatu');
// });

Route::get('/amethystSatu', [TenantController::class, 'index']);

Route::get('/amethystDua', [TenantController::class, 'index']);



Route::get('/email/verify/success', function () {
    return view('emailVerifySuccess');
});

Route::get('/email/verify/failed', function () {
    return view('emailVerifyFailed');
});

Route::get('/email/verify/wait', function () {
    return view('emailVerifyWait');
});

Route::get('/password/forgot', function () {
    return view('passwordForgot');
});


Route::get('/daftarTamu', function () {
    return view('dashboard');
});

Route::get('/ucapan', function () {
    return view('dashboard');
});

Route::get('/tema', function () {
    return view('dashboard');
});

Route::get('/fotoBackground', function () {
    return view('dashboard');
});


Route::get('/acara', function () {
    return view('dashboard');
});

Route::get('/quote', function () {
    return view('dashboard');
});

Route::get('/hadiah', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('dashboard');
});

Route::get('/galery', function () {
    return view('dashboard');
});

Route::get('/memberArea', function () {
    return view('memberArea');
});

Route::get('/prosesPesan', function () {
    return view('prosesPesan');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/diamondSatu', function () {
    return view('diamondSatu');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/diamondDua', function () {
    return view('diamondDua');
});

Route::get('/diamondTiga', function () {
    return view('diamondTiga');
});

Route::get('/silver', function () {
    return view('silver');
});

Route::get('/bronzeSatu', function () {
    return view('bronzeSatu');
});

Route::get('/bronzeTiga', function () {
    return view('bronzeTiga');
});

Route::get('/goldSatu', function () {
    return view('goldSatu');
});

Route::get('/goldDua', function () {
    return view('goldDua');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/silverSatu', function () {
    return view('silverSatu');
});

Route::get('/silverDua', function () {
    return view('silverDua');
});

Route::get('/silverTiga', function () {
    return view('silverTiga');
});

Route::get('/goldTiga', function () {
    return view('goldTiga');
});

Route::get('/bronzeDua', function () {
    return view('bronzeDua');
});
// Route::view('/{path?}', 'homepage');

Route::get('assets/{path}', function ($path) {
    return response()->file(public_path("assets/$path"));
});

Route::get('wp-content/{path}', function ($path) {
    return response()->file(public_path("wp-content/$path"));
});
Route::view('forgot_password', 'resetPassword');

Route::get('wp-includes/{path}', function ($path) {
    return response()->file(public_path("wp-includes/$path"));
});
// Route::get('silver_files/{path}', function ($path) {
//     return response()->file(public_path("silver_files/$path"));
// });