<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminFrontEndController extends Controller
{
    public function index()
    {
        $theme = SettingsContract::backendTheme();
        $title = "Home | Dashboard";
        return view('admin.' . $theme . '.index', compact('title'));
        if (Gate::allows('dashboard')) {
            $title = "Home | Dashboard";
            return view('admin.' . $theme . '.index', compact('title'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
}
