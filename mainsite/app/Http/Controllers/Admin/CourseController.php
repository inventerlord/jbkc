<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SettingsContract;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    //Course Category Start
    public function courseCategoryIndex()
    {
        if (Gate::allows('course_category_read')) {
            $theme = SettingsContract::backendTheme();
            $title = "Course Categories | Dashboard";
            $courseCategories = CourseCategory::latest()->get();
            return view('admin.' . $theme . '.course.category.index', compact('title', 'courseCategories'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseCategoryStore(Request $request)
    {
        if (Gate::allows('course_category_create')) {
            $validator = $this->categoryValidator($request->all());
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
            $courseCate = new CourseCategory();
            $courseCate->name = $request['name'];
            $courseCate->slug = Str::slug($request['name']);
            $courseCate->parent = (int) $request['parent'];
            $courseCate->save();
            $notification = [
                'title' => 'Success',
                'message' => "Course Category Added Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseCategoryEdit($id)
    {
        $theme = SettingsContract::backendTheme();
        if (Gate::allows('course_category_update')) {
            if (!$courseCategory = CourseCategory::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Course Category Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $title = "Edit Course Categories | Dashboard";
            return view('admin.' . $theme . '.course.category.edit', compact('title', 'courseCategory'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseCategoryUpdate(Request $request, $id)
    {
        if (Gate::allows('course_category_update')) {
            if (!$courseCategory = CourseCategory::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Course Category Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $validator =  Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:course_categories,name,' . $courseCategory->id]
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
                    'title' => 'Error',
                    'message' => $errorsOut,
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $courseCategory->name = $request['name'];
            $courseCategory->slug = Str::slug($request['name']);
            $courseCategory->parent = (int) $request['parent'];
            $courseCategory->update();
            $notification = [
                'title' => 'Success',
                'message' => "Course Category Update Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->route('admin.course.category')->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseCategoryDelete($id)
    {
        $theme = SettingsContract::backendTheme();
        if (Gate::allows('course_category_update')) {
            if (!$courseCategory = CourseCategory::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Course Category Does Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $courseCategory->delete();
            $notification = [
                'title' => 'Success',
                'message' => "Course Category Deleted Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    protected function categoryValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:course_categories,name']
        ]);
    }

    //Course Category End

    //Course Start
    public function courseIndex()
    {
        if (Gate::allows('course_read')) {
            $theme = SettingsContract::backendTheme();
            $title = "Courses | Dashboard";
            $courses = Course::latest()->get();
            return view('admin.' . $theme . '.course.index', compact('title', 'courses'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseCreate()
    {
        if (Gate::allows('course_create')) {
            $theme = SettingsContract::backendTheme();
            $title = "New Course | Dashboard";
            return view('admin.' . $theme . '.course.add', compact('title'));
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseStore(Request $request)
    {
        // dd($request->all());
        if (Gate::allows('course_create')) {
            $validator = $this->categoryValidator($request->all());
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
            $course = new Course();
            $course->user_id = auth()->id();
            $course->name = $request['name'];
            $course->slug = Str::slug($request['name']);
            $course->category_id = (int) $request['category'];
            $course->content = $request['content'];
            $course->description = substr($request['description'], 0, 190);
            $course->services = $request['services'];
            if ($request->has('img')) {

                $imgFile = $request->file('img');
                $image = Image::make($imgFile);
                $imageName = Str::slug($request->name);
                $imgExt = $imgFile->getClientOriginalExtension();
                $imagePath = public_path('/') . "assets/storage/images/course";
                if (!Storage::disk('jbizdisk')->exists('assets/storage/images/course')) {
                    Storage::disk('jbizdisk')->makeDirectory('assets/storage/images/course');
                    $image->resize(650, 500)->save($imagePath . '/' . $imageName . '.' . $imgExt);
                    if (!Storage::disk('jbizdisk')->exists('assets/storage/images/course/thumb')) {
                        Storage::disk('jbizdisk')->makeDirectory('assets/storage/images/course/thumb');
                        $image->resize(200, 200)->save($imagePath . '/thumb/' . $imageName . '.' . $imgExt);
                    }
                    $course->image = $imageName . '.' . $imgExt;
                }
            }
            $course->status = (int) $request['status'];
            $course->save();
            $notification = [
                'title' => 'Success',
                'message' => "Course Added Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->route('admin.course')->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    public function courseDelete($id)
    {
        if (Gate::allows('course_create')) {
            if (!$course = Course::where('id', $id)->first()) {
                $notification = [
                    'title' => 'Error',
                    'message' => "Course Not Exist",
                    'alert_type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
            $course->delete();
            $notification = [
                'title' => 'Success',
                'message' => "Course Deleted Successfully",
                'alert_type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if (str_contains(url()->previous(), url('/admin'))) {
            //            return redirect()->route('admin.error.403');
        }
    }
    protected function courseValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:courses,name'],
            'category' => ['required'],
        ]);
    }

    //Course End
}
