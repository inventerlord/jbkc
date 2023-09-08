<?php

namespace App\Http\Controllers;

use App\Contracts\SettingsContract;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Home";
        return view('client.' . $theme . '.index', compact('title'));
    }
    public function businessConsultancy()
    {
        $theme = SettingsContract::frontendTheme();
        $title = "Business Consultancy";
        $courses = CourseCategory::with('courses')->where('slug', 'business-consultancy')->first()->courses;

        return view('client.' . $theme . '.business_consultancy', compact('title', 'courses'));
    }
}
