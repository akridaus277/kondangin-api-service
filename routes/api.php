<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\InvoiceUndanganController;
use App\Http\Controllers\ProfilPasanganController;
use App\Http\Controllers\TenantController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function ($router){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me'])->middleware('log.route');
    

    Route::post('register', [RegistrationController::class, 'register']);

    Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');;
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::post('password/email', [ForgotPasswordController::class, 'forgot']);
    Route::post('password/reset', [ForgotPasswordController::class, 'reset']);

    Route::get('undangan/{kode_undangan}/to/{nama_tamu}', [TenantController::class, 'show']);
    Route::post('undangan/create', [TenantController::class, 'create']);
    Route::put('undangan/edit-domain', [TenantController::class, 'editDomain'])->middleware('auth:api');
    Route::get('undangan/show-domain/{id}', [TenantController::class, 'domain'])->middleware('auth:api');
    

    Route::post('invoice/create-paid-invoice-undangan', [InvoiceUndanganController::class, 'createPaid']);

    Route::post('invoice/create-bill', [InvoiceUndanganController::class, 'createBill']);
    Route::post('invoice/accept-payment-callback', [InvoiceUndanganController::class, 'acceptPaymentCallback']);
    Route::post('invoice/recurring-payment-callback', [InvoiceUndanganController::class, 'recurringPaymentCallback']);
    Route::post('invoice/payaccount-payment-callback', [InvoiceUndanganController::class, 'payaccountPaymentCallback']);
});

