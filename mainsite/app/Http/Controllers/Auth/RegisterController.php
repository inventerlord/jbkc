<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
    }
    public function showForm()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Register";
        return view('client.' . $theme . '.register', compact('title'));
    }
}
