<?php

namespace App\Http\Controllers;

use App\ApiCode;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);
        $user = User::where('email', $credentials)->firstOrFail();

        Password::sendResetLink($credentials);

        return $this->respondWithMessage('Reset password link sent on your email id.',200);
    }


    public function reset(ResetPasswordRequest $request) {
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->respondBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        }

        return $this->respondWithMessage("Password has been successfully changed",200);
    }
}
