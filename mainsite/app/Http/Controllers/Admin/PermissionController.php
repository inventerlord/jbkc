<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {

        if (Gate::allows('permission_read') or Gate::allows('permission_create')) {
            $theme = SettingsContract::backendTheme();
            $title = "Permissions | Dashboard";
            $permissions = Permission::latest('name')->get();
            return view('admin.' . $theme . '.user_management.permission.index', compact('title', 'permissions'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('permission_create')) {
            $validator = $this->valudator($request->all());
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
                    'title' => 'Error',
                    'message' => $errorsOut,
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $permission = new Permission();
            $permission->name = $request['name'];
            $permission->save();
            $notification = [
                'title' => 'Success',
                'message' => "Permission Added Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function delete($id)
    {
        if (Gate::allows('permission_delete')) {

            if (!$permission = Permission::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Permission Not Exist",
                    'alert_type' => 'error'
                ];
            }
            $permission->delete();
            $notification = [
                'title' => 'Success',
                'message' => "Permission Deleted Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    protected function valudator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:permissions,name']
        ]);
    }
}
