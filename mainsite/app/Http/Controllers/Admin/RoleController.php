<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {

        if (Gate::allows('role_read')) {
            $theme = SettingsContract::backendTheme();
            $title = "Roles | Dashboard";
            $roles = Role::latest('name')->get();
            return view('admin.' . $theme . '.user_management.role.index', compact('title', 'roles'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }

    public function create()
    {
        $theme = SettingsContract::backendTheme();
        if (Gate::allows('role_create')) {
            $title = "New Role | Dashboard";
            return view('admin.' . $theme . '.user_management.role.add', compact('title'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function store(Request $request)
    {
        if (Gate::allows('role_create')) {
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

            $role = new Role();
            $role->name = $request['name'];
            $role->slug = Str::slug($request['name']);
            $role->save();
            $role->permissions()->sync($request['permissions']);

            $notification = [
                // 'title' => 'Success',
                'message' => 'Role Created Successfully',
                'alert_type' => 'success'
            ];
            return redirect()->route('admin.usermanagement.role')->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            return redirect()->route('admin.error.403');
        }
    }
    public function edit($id)
    {
        $theme = SettingsContract::backendTheme();
        if (Gate::allows('role_create')) {
            $role = Role::where('id', $id)->first();
            if (!$role) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Role Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $title = "Edit Role | Dashboard";
            return view('admin.' . $theme . '.user_management.role.edit', compact('title', 'role'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('role_update')) {
            $role = Role::where('id', $id)->first();
            $validator = $this->validator($request->all(), $role->id);
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


            $role->name = $request['name'];
            $role->slug = Str::slug($request['name']);
            $role->update();
            $role->permissions()->sync($request['permissions']);

            $notification = [
                // 'title' => 'Success',
                'message' => 'Role Updated Successfully',
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
        if (Gate::allows('role_delete')) {
            $role = Role::where('id', $id)->first();
            if (!$role) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Role Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $role->delete();
            $notification = [
                // 'title' => 'Success',
                'message' => "Role Deleted Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            return redirect()->route('admin.error.403');
        }
    }
    protected function validator(array $data, int $except = null)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:roles,name,' . $except],
            'permissions' => ['required']
        ]);
    }
}
