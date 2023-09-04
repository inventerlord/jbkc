<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function showForm()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Register";
        return view('client.' . $theme . '.login', compact('title'));
    }
    public function login(Request $request)
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Login";
        return view('client.' . $theme . '.login', compact('title'));
    }
    public function loginAttempt(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $errMessages = [];
            foreach ($validator->errors()->messages() as $key => $msg) {
                $errMessages[] = $msg[0];
            }
            $errorsOut = "<ul style=\"list-style:none;padding:0;margin:0\">";
            foreach ($errMessages as $errMsg) {
                $errorsOut .= "<li>" . $errMsg . "</li>";
            }
            $errorsOut .= "</ul>";
            $notification = [
                // 'title' => 'Success',
                'message' => $errorsOut,
                'alert_type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        $credentials = $this->credentials($request->all());
        $user = User::where(array_keys($credentials)[0], array_values($credentials)[0])->first();
        if ($user) {
            if ($user->status == 0) {
                $notification = [
                    'title' => 'Status',
                    'message' => "User is Disabled",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            if (Auth::guard('web')->attempt($credentials, (bool) $request['remember'])) {
                $request->session()->regenerate();
                $notification = [
                    'title' => 'Status',
                    'message' => "Logged In Successfully",
                    'alert_type' => 'success'
                ];
                return redirect()->intended('/')->with($notification);
            }
        }
        $notification = [
            'title' => 'Status',
            'message' => "User Does not Exist",
            'alert_type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }
    protected function credentials(array $data)
    {
        $username = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $username => $data['username'],
            'password' => $data['password']
        ];
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = [
            'title' => 'Status',
            'message' => "Logged Out Successfully",
            'alert_type' => 'success'
        ];
        return redirect()->route('home')->with($notification);
        // return redirect('/');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
