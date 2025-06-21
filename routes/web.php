<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

// Inside your Route::middleware(['guest']) or similar
Route::get('/admin', function () {
    return redirect()->route('login');
})->name('admin');

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// Alias admin.login as login, so route('login') works
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('send-email',[EmailController::class,'sendEmail']);





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', function () {
        return view('admin.dashboard');  // Or whatever view you want
    })->name('admin.home');

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
