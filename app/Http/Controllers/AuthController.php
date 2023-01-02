<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $getUser = User::where('email', request('email'))->firstOrFail();
        $getToken = Token::where('user_id', $getUser->id);
        if (count($getToken->get()) > 0) {
            foreach ($getToken->get() as $key => $value) {
                JWTAuth::setToken($value->token)->invalidate();
                Token::destroy($value->id);
            }
            $this->login();
        } else {
            Token::create([
                'user_id'   => $getUser->id,
                'token'     =>  $token
            ]);
        }
        return $this->respondWithToken($getToken->firstOrFail()->token);
    }

    /**
     * Create user given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        $token = JWTAuth::fromUser($user);
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->addMinutes(config('jwt.ttl'))->format('l, j F Y - H:i'),
        ]);
    }
}
