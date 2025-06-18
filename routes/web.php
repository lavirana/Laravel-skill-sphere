<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('courses/add', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('courses.add');
    Route::get('courses', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('courses');
    Route::get('courses/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('courses.show');
    Route::post('courses/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('courses.edit');
    Route::get('categories', function () { return view('admin.categories.index'); })->name('categories');
    Route::get('categories/add', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.add');
    Route::get('categories/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('Categories/view/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('categories.show');
Route::get('settings/profile/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'edit'])->name('settings.profile.edit');

});
