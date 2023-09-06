<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiCode;

class AuthController extends Controller
{
    public function _construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(){
        $credentials = request(['email','password']);

        if(! $token = auth()->attempt($credentials)){
            return $this->respondUnAuthorizedRequest(ApiCode::INVALID_CREDENTIALS);
        }
        
        if (!auth()->user()->hasVerifiedEmail()) {
            return $this->respondWithError(ApiCode::EMAIL_NOT_VERIFIED, 403);
        }

        return $this->respondWithToken($token);
    }

    public function respondWithToken($token){
        return $this->respond([
            'token' => $token,
            'access_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);

    }

    public function logout(){
        auth()->logout();
        return $this->respondWithMessage('User successfully logged out',200);


    }

    public function refresh(){
        return $this->respondWithToken(auth()->refresh());
    }

    public function me(){

        $user = auth()->user();
        $tenants = [];
        

        

        foreach ($user->tenants as $tenant) {
            $accountTenant = ([
                'id' => $tenant->id,
                'subdomain' => $tenant->domains()->first()->domain,
                'domain' => $tenant->domains()->first()->domain.'.'.array_slice(config('tenancy.central_domains'), -1)[0],
                'paket' => $tenant->paket()->first()->nama,
                'active'=> $tenant->active

            ]);
            $tenants[] = $accountTenant;
        }

        $response = ([
            'name' => $user->name,
            'role_name' => $user->role->name,
            'role_level' => $user->role->level,
            'undangans' => $tenants            
        ]);

        // return $this->respond(auth()->user());

        return $this->respond($response,"Success");

    }

    
    //
}
