<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function forgotPage()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Forgot Password";
        return view('client.' . $theme . '.password.forgot', compact('title'));
    }
    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email']
        ], [
            'email.exists' => ":attribute Does Not Exist In Our Database",
        ], [
            'email' => "Email"
        ]);

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
        // check previous reset link

        if (DB::table('password_reset_tokens')->where('email', '=', $request->email)->exists()) {
            DB::table('password_reset_tokens')->where('email', '=', $request->email)->delete();
        }

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $data = [
            'action_link' => route('reset.password.form', ['token' => $token, 'email' => $request->email]),
            'email' => $request->email,
        ];
        try {
            Mail::to($request->email)
                ->send(new ResetPasswordMail($data));
            $notification = [
                // 'title' => 'Success',
                'message' => "Reset Password Link Has been Sent to " . $request->email,
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            $notification = [
                // 'title' => 'Success',
                'message' => "Something went wrong`",
                'alert_type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        // $action_link = route('reset.password.form', ['token' => $token, 'email' => $request->email]);
        // $body = "We have received a request to reset your password for your <b>App name</b> account with email " . $request->email . "You can reset your password by clicking the link below";

        // Mail::send('email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
        //     $message->from('noreply@gmail.com', 'My App');
        //     $message->to($request->email, 'Your name')
        //         ->subject('Reset Password');
        // });

    }

    public function resetPage()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Reset Password";


        return view('client.' . $theme . '.password.reset', compact('title'));
    }
    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'exists:password_reset_tokens,email'],
            'token' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

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

        $resetData = DB::table('password_reset_tokens')->where('email', '=', $request->email)->first();
        if ($resetData->token !== $request->token) {
            $notification = [
                // 'title' => 'Success',
                'message' => "Invalid Reset Password Token",
                'alert_type' => 'error'
            ];
            return redirect()->route('forgot.password.form')->with($notification);
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('email', '=', $request->email)->delete();
        $notification = [
            // 'title' => 'Success',
            'message' => "Password Updated Successfully",
            'alert_type' => 'success'
        ];
        return redirect()->route('login')->with($notification);
    }
}
