<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

     public function login(){
            return view('login');
     }

     public function user_login(Request $request){
        // Validate the request
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        dd(request()->all());
     }



}
