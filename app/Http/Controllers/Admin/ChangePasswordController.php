<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('admin.profile.change-password');
    }

    public function update(Request $request){

       // dd($request->all());
        // Validate the request
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);
        return back()->with('success', 'Password updated successfully.');
    }
}
