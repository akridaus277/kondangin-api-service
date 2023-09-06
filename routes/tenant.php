<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfilPasanganController;
use App\Http\Controllers\SubAcaraController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UcapanController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\MusikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\DaftarMusikController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FotoBackgroundController;
use App\Http\Controllers\AlamatGiftController;
use App\Http\Controllers\RekeningGiftController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function ($router) {
    Route::get('to/{nama_tamu}', function ($nama_tamu) {
        if (tenant('tema_id')==1) {
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('bronzeSatu');
        }
        else if(tenant('tema_id')==2){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('bronzeDua');
        }
        else if(tenant('tema_id')==3){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('bronzeTiga');
        }
        else if(tenant('tema_id')==4){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        else if(tenant('tema_id')==5){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        else if(tenant('tema_id')==6){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        else if(tenant('tema_id')==7){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('goldSatu');
        }
        else if(tenant('tema_id')==8){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('goldDua');
        }
        else if(tenant('tema_id')==9){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
            // return view('goldTiga');
        }
        else if(tenant('tema_id')==10){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        else if(tenant('tema_id')==11){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        else if(tenant('tema_id')==12){
            $controller = new TenantController();
            return $controller->index(tenant(), $nama_tamu);
        }
        // return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id').'with tema id : '.tenant('tema_id');
        // return view('goldTiga');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');

    });
    Route::get('/profile', function () {
        return view('dashboard');

    });
    Route::get('/acara', function () {
        return view('dashboard');

    });

    Route::get('/galery', function () {
        return view('dashboard');

    });

    Route::get('/quote', function () {
        return view('dashboard');
    });

    Route::get('/hadiah', function () {
        return view('dashboard');
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

});

// Route::get('/', function () {
//     dd(Tamu::all());
//     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
// });

Route::middleware([
    'api',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function ($router) {
    Route::get('api/to/{nama_tamu}', function ($nama_tamu) {
        $controller = new TenantController();
        return $controller->show(tenant(), $nama_tamu);
    });
    Route::post('api/submit_ucapan', function (Request $request) {
        $controller = new TenantController();
        return $controller->submitUcapan(tenant(), $request);
    });
    Route::get('api/me', function () {
        $controller = new AuthController();
        return $controller->me();
    })->middleware('auth:api');

    Route::get('api/undangan/profil-pasangan', function () {
        $controller = new ProfilPasanganController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::post('api/undangan/profil-pasangan/edit', function (Request $request) {
        $controller = new ProfilPasanganController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');
    Route::get('api/undangan/profil-pasangan/show/{id}', function ($id) {
        $controller = new ProfilPasanganController();
        return $controller->show(tenant(),$id);
    })->middleware('auth:api');

    Route::get('api/undangan/sub-acara', function () {
        $controller = new SubAcaraController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/sub-acara/edit', function (Request $request) {
        $controller = new SubAcaraController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');
    Route::get('api/undangan/sub-acara/show/{id}', function ($id) {
        $controller = new SubAcaraController();
        return $controller->show(tenant(),$id);
    })->middleware('auth:api');

    Route::get('api/undangan/tamu', function () {
        $controller = new TamuController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::post('api/undangan/tamu/create', function (Request $request) {
        $controller = new TamuController();
        return $controller->create(tenant(), $request);
    })->middleware('auth:api');
    Route::put('api/undangan/tamu/edit', function (Request $request) {
        $controller = new TamuController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');
    Route::get('api/undangan/tamu/show/{id}', function ($id) {
        $controller = new TamuController();
        return $controller->show(tenant(),$id);
    })->middleware('auth:api');
    Route::delete('api/undangan/tamu/delete', function (Request $request) {
        $controller = new TamuController();
        return $controller->destroy(tenant(),$request);
    })->middleware('auth:api');
    Route::post('api/undangan/tamu/import', function (Request $request) {
        $controller = new TamuController();
        return $controller->import(tenant(), $request);
    })->middleware('auth:api');

    Route::get('api/undangan/ucapan', function () {
        $controller = new UcapanController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::delete('api/undangan/ucapan/delete', function (Request $request) {
        $controller = new UcapanController();
        return $controller->destroy(tenant(),$request);
    })->middleware('auth:api');

    Route::get('api/undangan/foto', function () {
        $controller = new FotoController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::post('api/undangan/foto/create', function (Request $request) {
        $controller = new FotoController();
        return $controller->create(tenant(), $request);
    })->middleware('auth:api');
    Route::get('api/undangan/foto/show/{id}', function ($id) {
        $controller = new FotoController();
        return $controller->show(tenant(),$id);
    })->middleware('auth:api');
    Route::delete('api/undangan/foto/delete', function (Request $request) {
        $controller = new FotoController();
        return $controller->destroy(tenant(),$request);
    })->middleware('auth:api');

    Route::get('api/undangan/musik', function () {
        $controller = new MusikController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::get('api/undangan/daftar-musik', function () {
        $controller = new DaftarMusikController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/musik/edit', function (Request $request) {
        $controller = new MusikController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');

    Route::get('api/undangan/quote', function () {
        $controller = new QuoteController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/quote/edit', function (Request $request) {
        $controller = new QuoteController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');

    Route::get('api/undangan/video', function () {
        $controller = new VideoController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::post('api/undangan/video/create', function (Request $request) {
        $controller = new VideoController();
        return $controller->create(tenant(), $request);
    })->middleware('auth:api');
    Route::delete('api/undangan/video/delete', function (Request $request) {
        $controller = new VideoController();
        return $controller->destroy(tenant(),$request);
    })->middleware('auth:api');

    Route::get('api/undangan/foto-background', function () {
        $controller = new FotoBackgroundController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::post('api/undangan/foto-background/edit', function (Request $request) {
        $controller = new FotoBackgroundController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');
    Route::get('api/undangan/foto-backgrouns/show/{id}', function ($id) {
        $controller = new FotoBackgroundController();
        return $controller->show(tenant(),$id);
    })->middleware('auth:api');

    Route::get('api/undangan/tema', function () {
        $controller = new TenantController();
        return $controller->indexTema(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/tema/edit', function (Request $request) {
        $controller = new TenantController();
        return $controller->updateTema(tenant(), $request);
    })->middleware('auth:api');


    Route::get('api/undangan/alamat-gift', function () {
        $controller = new AlamatGiftController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/alamat-gift/edit', function (Request $request) {
        $controller = new AlamatGiftController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');

    Route::get('api/undangan/rekening-gift', function () {
        $controller = new RekeningGiftController();
        return $controller->index(tenant());
    })->middleware('auth:api');
    Route::put('api/undangan/rekening-gift/edit', function (Request $request) {
        $controller = new RekeningGiftController();
        return $controller->update(tenant(), $request);
    })->middleware('auth:api');
    
});

