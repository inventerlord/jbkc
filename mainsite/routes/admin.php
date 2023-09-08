<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'hc-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::controller(\App\Http\Controllers\Admin\AdminFrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});


Route::controller(\App\Http\Controllers\Admin\PermissionController::class)->group(function () {
    Route::get('/user-management/permissions', 'index')->name('usermanagement.permission');
    Route::post('/user-management/permissions', 'store');
    Route::delete('/user-management/permissions/{permission}/delete', 'delete')->name('usermanagement.permission.delete');
});


Route::controller(\App\Http\Controllers\Admin\RoleController::class)->group(function () {
    Route::get('/user-management/roles', 'index')->name('usermanagement.role');
    Route::get('/user-management/roles/create', 'create')->name('usermanagement.role.create');
    Route::post('/user-management/roles/create', 'store');
    Route::get('/user-management/roles/{role}/edit', 'edit')->name('usermanagement.role.edit');
    Route::put('/user-management/roles/{role}/edit', 'update');
    Route::delete('/user-management/roles/{role}/delete', 'delete')->name('usermanagement.role.delete');
});


Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function () {
    Route::get('/user-management/users', 'index')->name('usermanagement.user');
    Route::get('/user-management/users/create', 'create')->name('usermanagement.user.create');
    Route::post('/user-management/users/create', 'store');
    Route::get('/user-management/users/{user}/edit', 'edit')->name('usermanagement.user.edit');
    Route::put('/user-management/users/{user}/edit', 'update');
    Route::delete('/user-management/users/{user}/delete', 'delete')->name('usermanagement.user.delete');
});

Route::controller(\App\Http\Controllers\Admin\CourseController::class)->group(function () {
    Route::get('/coures/categories', 'courseCategoryIndex')->name('course.category');
    Route::post('/coures/categories', 'courseCategoryStore');
    Route::get('/coures/categories/{courseCategory}/edit', 'courseCategoryEdit')->name('course.category.edit');
    Route::put('/coures/categories/{courseCategory}/edit', 'courseCategoryUpdate');
    Route::delete('/coures/categories/{courseCategory}/delete', 'courseCategoryDelete')->name('course.category.delete');

    // courses
    Route::get('/coures', 'courseIndex')->name('course');
    Route::get('/coures/create', 'courseCreate')->name('course.create');
    Route::post('/coures/create', 'courseStore');
    Route::delete('/coures/create/{coures}/delete', 'courseDelete')->name('course.delete');
});
