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
use Carbon\Carbon;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login', 'recoverPasswordSend', 'recoverPassword']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Password or email not valid', 'success' => false], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out', 'success' => true]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function recoverPasswordSend(User $User, Request $request) {
        $email = $request->only(['email']);
        $user = $User->where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => "This user doesn't exist", 'success' => false]);
        }

        $token_id = Str::random(10);
        Mail::to($user)->send(new MailNotify($user, $token_id));
        if (Mail::failures()) {
           return response()->json(['message' => 'Sorry! Please try again latter', 'success' => false]);
        }

        $new_time = Carbon::now()->subHours(5);
        $User->where('email', $email)->update(['restore_token' => $token_id, 'restore_token_date_limit' => $new_time]);

        return  response()->json(['message' => 'Great! Successfully send in your mail', 'success' => true]);
    }

    public function recoverPassword(User $User, Request $request) {
        $body = $request->only(['password', 'token']);
        $user = $User->where('restore_token', $body['token'])->first();

        // TODO: validate date valid token
    //    if (Carbon::parse($User['restore_token_date_limit'])->isAfter(Carbon::now()->subHours(2000))) {
    //         return response()->json(['message' => 'Token expired', 'success' => false]);
    //    }

        if (empty($user)) {
            return response()->json(['message' => 'User do not exist with that token', 'success' => false]);
        }

        $token = $body['token'];
        $wasUpdated = $User->where('restore_token', $token)->update(['password' => Hash::make($body['password'])]);

        if (!$wasUpdated) {
            return response()->json(['message' => 'The token is invalid', 'success' => false]);

        }
        $User->where('email', $user['email'])->update(['restore_token' => null]);

        return response()->json(['message' => 'Password was successfully updated', 'success' => true]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            "data" => [
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
