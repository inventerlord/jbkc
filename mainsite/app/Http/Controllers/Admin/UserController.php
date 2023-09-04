<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {

        $theme = SettingsContract::backendTheme();
        if (Gate::allows('user_read')) {
            $title = "Users | Dashboard";
            $users = User::latest()->get();
            return view('admin.' . $theme . '.user_management.user.index', compact('title', 'users'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function create()
    {

        $theme = SettingsContract::backendTheme();
        if (Gate::allows('user_create')) {
            $title = "Users | Dashboard";
            $users = User::latest()->get();
            return view('admin.' . $theme . '.user_management.user.add', compact('title', 'users'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function store(Request $request)
    {
        if (Gate::allows('user_create')) {
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
                // dd($errorsOut);
                $notification = [
                    // 'title' => 'Success',
                    'message' => $errorsOut,
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }



            $user = new User();
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->role_id = $request['role'];
            $user->status = $request['status'];

            $user->save();
            $userDetail = new UserDetail();
            $userDetail->user_id = $user->id;
            $userDetail->first_name = $request['first_name'];
            $userDetail->last_name = $request['last_name'];
            $userDetail->display_name = substr($request['display_name'], 0, 15);
            $userDetail->phone = str_replace('-', '', $request['phone']);

            $userDetail->save();


            $notification = [
                // 'title' => 'Success',
                'message' => "User Created Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->route('admin.usermanagement.user')->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            return redirect()->route('admin.error.403');
        }
    }
    public function edit($id)
    {

        $theme = SettingsContract::backendTheme();
        if (Gate::allows('user_update')) {;
            if (!$user = User::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "User Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $title = "Users | Dashboard";
            $roles = Role::all();
            return view('admin.' . $theme . '.user_management.user.edit', compact('title', 'user', 'roles'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('user_update')) {
            if (!$user = User::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "User Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $validator =
                Validator::make($request->all(), [
                    'username' => ['required', 'string', 'max:100', 'unique:users,username,' . $user->id],
                    'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,' . $user->id],
                    'phone' => ['nullable', 'string', 'unique:user_details,phone,' . $user->details->id],
                    'password' => ['nullable', 'string', 'min:5', 'confirmed'],
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
                // dd($errorsOut);
                $notification = [
                    // 'title' => 'Success',
                    'message' => $errorsOut,
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }



            $user->username = $request['username'];
            $user->email = $request['email'];
            if ($request['password'] != '') {
                $user->password = Hash::make($request['password']);
            }

            $user->role_id = $request['role'];
            $user->status = $request['status'];

            $user->update();
            $userDetail = UserDetail::where('user_id', '=', $user->id)->first();
            $userDetail->first_name = $request['first_name'];
            $userDetail->last_name = $request['last_name'];
            $userDetail->display_name = substr($request['display_name'], 0, 15);
            $userDetail->phone = str_replace('-', '', $request['phone']);

            $userDetail->update();


            $notification = [
                // 'title' => 'Success',
                'message' => "User Updated Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            return redirect()->route('admin.error.403');
        }
    }
    public function delete($id)
    {
        if (Gate::allows('user_delete')) {
            if (!$user = User::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "User Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $user->delete();
            $notification = [
                // 'title' => 'Success',
                'message' => "User Deleted Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            return redirect()->route('admin.error.403');
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:100', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'unique:user_details,phone'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }
}
