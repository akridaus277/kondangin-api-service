<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
use App\Models\Role;

class RegistrationController extends Controller
{
    //
    public function register(RegistrationRequest $request){
        // User::create($request->getAttributes())->sendEmailVerificationNotification();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'role_id' => 2
            

        ])->sendEmailVerificationNotification();

        return $this->respondWithMessage('User successfully created ', 200);
    }
}
