<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\CourseSearchController;
use App\Http\Controllers\Admin\ProfileController;
use App\Admin\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Post;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\TestUser;
use App\Livewire\SearchCourses;
use App\Http\Controllers\OrderController;


Route::get('/', [HomeController::class, 'index']);

//Auth::routes();

// Inside your Route::middleware(['guest']) or similar
Route::get('/admin', function () {
    return redirect()->route('login');
})->name('admin');


// web.php or api.php
Route::post('/send-message', [App\Http\Controllers\HomeController::class, 'sendMessage']);


Route::get('signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup'); 
Route::post('user_signup', [App\Http\Controllers\UserController::class, 'user_signup'])->name('user_signup');
Route::get('ulogin', [App\Http\Controllers\UserController::class, 'ulogin'])->name('ulogin');
Route::post('user_login', [App\Http\Controllers\UserController::class, 'user_login'])->name('user_login');
Route::get('dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->middleware('auth')
->name('dashboard');
Route::post('ulogout', function () { Auth::logout(); return redirect()->route('ulogin'); })->name('ulogout');
Route::get('edit_profile', [App\Http\Controllers\UserController::class, 'edit_profile'])->middleware('auth')->name('edit_profile');
Route::post('update_profile', [App\Http\Controllers\UserController::class, 'update_profile'])->middleware('auth')->name('update_profile');


Route::get('test_ajax',[App\Http\Controllers\CourseSearchController::class, 'index']);
Route::get('ajax-search',[App\Http\Controllers\CourseSearchController::class, 'search']);
Route::get('/course-detail/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
Route::get('/category-courses/{cat_id}', [App\Http\Controllers\CategoryController::class, 'category_courses'])->name('category-courses');




//only for practice//
Route::get('store_user',[App\Http\Controllers\Admin\UserController::class, 'store_static_user']);
Route::get('update_user',[App\Http\Controllers\Admin\UserController::class, 'update_static_user']);
Route::get('show_user_post',[App\Http\Controllers\Admin\UserController::class, 'show_user_post']);
Route::get('show_comments',[App\Http\Controllers\VideoController::class, 'index']);
Route::get('show_video_comments/{id}',[App\Http\Controllers\VideoController::class, 'show']);
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('show_best_c', [VideoController::class, 'show_best'])->name('posts.show_best');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('create_post_with_tag',[App\Http\Controllers\PostController::class, 'create']);
Route::get('show_tag_posts',[App\Http\Controllers\TagController::class, 'index']);
Route::get('show_user_posts',[App\Http\Controllers\UserController::class, 'index']);
Route::get('delete_user_posts',[App\Http\Controllers\UserController::class, 'create']);
Route::get('active_users',[App\Http\Controllers\UserController::class, 'get_user']);


    Route::get('home',[App\Http\Controllers\HomeController::class, 'show'])->name('home')->middleware(['IsUserValid:admin', TestUser::class]);

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// Alias admin.login as login, so route('login') works
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('send-email',[EmailController::class,'sendEmail']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', function () {
        return view('admin.dashboard');  // Or whatever view you want
    })->name('admin.home');

    Route::prefix('courses')->group(function(){
        Route::get('/add', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('courses.add');
        Route::get('/', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('courses');
        Route::get('/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('courses.show');
        Route::post('/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('courses.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('courses.edit');    
    });

    Route::get('sub_categories/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('sub_categories.show');
    Route::get('sub_categories/add/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'create'])->name('sub_categories.add');

    Route::get('categories', function () { return view('admin.categories.index'); })->name('categories');
    Route::get('categories/add', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.add');
    Route::get('categories/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('Categories/view/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('categories.show');
    Route::get('settings/profile/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'edit'])->name('settings.profile.edit');

    Route::get('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'edit'])->name('password.edit');
    Route::post('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'update'])->name('password.update');
    Route::get('profile',[ProfileController::class, 'index'])->name('profile.index');
    Route::get('users',[UserController::class, 'index'])->name('users.index');
    Route::get('user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}',[UserController::class, 'update'])->name('user.update');
    Route::get('user/add',[UserController::class, 'create'])->name('user.add');
    Route::post('user/store',[UserController::class, 'store'])->name('user.store');
    
});
