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
}
