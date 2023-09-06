<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\ApiCode;

class VerificationController extends Controller
{
    public function verify($user_id, Request $request){
        $user = User::findOrFail($user_id);

        if(!$request->hasValidSignature()){
            $user->sendEmailVerificationNotification();
            // return $this->respondUnAuthorizedRequest(ApiCode::INVALID_EMAIL_VERIFICATION_URL);
            return redirect()->to('/email/verify/failed');

        }

        

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }else{
            // return $this->respondBadRequest(ApiCode::EMAIL_ALREADY_VERIFIED);
            return redirect()->to('/email/verify/failed');
        }

        return redirect()->to('/email/verify/success');

    }

    public function resend(Request $request){
        $user = User::where('email', $request->email)->firstOrFail();



        if ($user->hasVerifiedEmail()) {
            return $this->respondBadRequest(ApiCode::EMAIL_ALREADY_VERIFIED);
        }

        $user->sendEmailVerificationNotification();

        return $this->respondWithMessage("Email verification link has been sent to your email",200);
        

    }
    //
}
