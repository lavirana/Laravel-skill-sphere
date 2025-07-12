<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){

        $user = User::find(1);
echo $user->name; 

       // $user = User::with('post')->find(3);
       // return $user;
    }


    public function create(){

        $result = User::create([
            'name' => 'rahul',
            'email' => 'rahul@example.com',
            'password' => 'secret'  // Will be hashed automatically
        ]);

      //  $user = User::find(6)->delete();
       return $result;
    }

    public function get_user(){
        //User::where('status',1)->get();
        //$users = User::where('role','user')->pluck('email','name');
        $users = User::find([1,2],['name', 'email']);
       //$all_active_users =  User::sort()->get();   //with scopeActive method
        return $users;
     }


     public function signup(){
         return view('signup');
     }

     public function user_signup(Request $request){
           $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        $request->session()->flash('success', 'New User has been created successfully');
        $request->session()->flash('error', 'Something went wrong');

       return redirect()->route('signup');

     }

     public function ulogin(){
            return view('login');
     }

     public function edit_profile(){
        // This method can be used to show the edit profile form
        $user = Auth::user(); // Get the currently authenticated user
        return view('edit_profile', ['user' => $user]);
     }


     public function update_profile(Request $request){
        dd($request->all());
     }

     public function user_login(Request $request){
        // Validate the request
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

          // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        // Redirect to dashboard or home
        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }
     // Redirect back with error
     return back()->withErrors([
         'email' => 'Invalid credentials.',
     ])->withInput();

    
     }

     public function dashboard(){
        $all_categories = category::with('subcategories')->get();
       // You can pass the course data to the view if needed
        return view('dashboard', ['all_categories' => $all_categories]);
     }



}
