<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $errMessages = [];
            foreach ($validator->errors()->messages() as $key => $msg) {
                $errMessages[] = $msg[0];
            }
            return response()->json($errMessages);
        }
        $role = Role::where('slug', '=', 'user')->first();
        $user = new User();
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = $role->id;
        $user->status = 1;

        $user->save();
        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;
        $userDetail->save();

        return response()->json($user);
    }
    protected function validator(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }
}
