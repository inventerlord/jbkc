<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiLoginController extends Controller
{

    public function login(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $errMessages = [];
            foreach ($validator->errors()->messages() as $key => $msg) {
                $errMessages[] = $msg[0];
            }
            $notification = [
                // 'title' => 'Success',
                'message' => $errMessages,
                'alert_type' => 'error'
            ];
            return response()->json($notification);
        }
        $credentials = $this->credentials($request->all());
        $user = User::where(array_keys($credentials)[0], array_values($credentials)[0])->first();
        if ($user) {
            if ($user->status == 0) {
                return response()->json(['alert_type' => 'error', 'title' => 'Unauthorized', 'message' => "User Is Disabled"], 401);
            }
            if ($token = Auth::guard('api')->attempt($credentials)) {
                return $this->respondWithToken($token);
            }
        }
        return response()->json([
            'messages' => 'User Does not Exist',
            'error' => 'Un-Authorized'
        ], 401);
    }
    protected function credentials(array $data)
    {
        $username = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $username => $data['username'],
            'password' => $data['password']
        ];
    }
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'message' => 'Logged In Successfully'
        ]);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
