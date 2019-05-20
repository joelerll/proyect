<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\MailNotify;
use Mail;
use App\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login', 'recoverPasswordSend', 'recoverPassword']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Password or email not valid'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function recoverPasswordSend(User $User) {
        $email = request(['email']);
        $user = $User->where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => "This user doesn't exist", 'success' => false]);
        }

        $token_id = Str::random(32);
        Mail::to($user)->send(new MailNotify($user, $token_id));

        if (Mail::failures()) {
           return response()->json(['message' => 'Sorry! Please try again latter', 'success' => false]);
        }
        $new_time = date("Y-m-d H:i:s", strtotime('+5 hours'));
        $User->where('email', $email)->update(['restore_token' => $token_id, 'restore_token_date_limit' => $new_time]);
        return  response()->json(['message' => 'Great! Successfully send in your mail', 'success' => true]);
    }

    public function recoverPassword(User $User, Request $request) {
        $data = request(['password', 'token']);
        error_log($data['token']);
        $wasUpdated = $User->where('restore_token', $data['token'])->update(['password' => Hash::make($data['password'])]);
        error_log($wasUpdated);
        if (!$wasUpdated) {
            return response()->json(['message' => 'The token is invalid', 'success' => false]);
        }

        return response()->json(['message' => 'Password was successfully updated', 'success' => true]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
