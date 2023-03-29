<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    public function forgotPassword(Request $request)
    {
        // Verify the email
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response([
                "message" => $validator->errors()->first(),
                "data" => []
            ], 400);
        } else {
            try {
                // Send password reset link
                $response = Password::sendResetLink($request->only("email"));
                // Check the status of response
                switch ($response) {
                    case Password::RESET_LINK_SENT:
                        return response([
                            "message" => trans($response),
                            "data" => []
                        ], 200);
                    case Password::INVALID_USER:
                        return response([
                                "message" => trans($response),
                                "data" => []
                        ], 200);    
                }
            } catch( TransportExceptionInterface $ex) {
                return response([
                    "message" => $ex->getMessage(),
                    "data" => []
                ], 400);
            } catch (\Exception $ex) {
                return response([
                    "message" => $ex->getMessage(),
                    "data" => []
                ]);
            }
        } 
    
    }

    public function handlePasswordReset(Request $request){
        return view('auth.password_reset', ['token' => $request->token]);
    }

    public function processPasswordRequest(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? response([
                    "message" => __($status),
                    "data" => []
                ])
                : response([
                    "message" => [__($status)],
                    "data" => []
                ]);
    }
}
