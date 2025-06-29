<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
        //compact() is a PHP function that creates an associative array from variables.

        //In this case, it creates an array with a key 'users' and the value of the $users variable.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add_user');
    }



    /**
     * Store a newly created static user in storage.
     * This method is not used in the current implementation.
     */
    public function store_static_user(){
        User::UpdateOrCreate(
            ['name' => 'Ashish','email' => 'lavi191@gmail.com'],
            [
                "password" => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => null,
             ]
            );      
        // $res = User::get(); 
        // dd($res);
    }

    public function update_static_user(){
        User::upsert(
            [
                "name" => "Ashish R",
                "email" => "ashishrana288@gmail.com",
                "password" => Hash::make('password'),
            ],
            ["email"],
            ["name"]
        );
    }

public function show_user_post(){
    $user_posts =  User::where('id', 3)->withWhereHas('post',function($query){
$query->where('title', 'post 1');
    })->get();

    dd($user_posts);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required|string|min:8',
           //'password_confirmation' => 'required|string|min:8'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role', 'user'); // Default role is 'user'
        $user->password = Hash::make($request->input('password'));
        $user->save();
         // session()->flash('success', 'New User has been created successfully');
         // session()->flash('error', 'Something went wrong');
         // Reset the form fields
        $request->session()->flash('success', 'New User has been created successfully');
        $request->session()->flash('error', 'Something went wrong');

       return redirect()->route('users');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.users.edit_user', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

     $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => ['required','email',Rule::unique('users')->ignore($id),],
            //'password' => 'nullable|string|min:8|confirmed',
            //'password_confirmation' => 'nullable|string|min:8'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
