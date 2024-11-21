<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if ($validator->passes()) {
            // Find the user by email
            $admin = Admin::where('email', $request->email)->first();
        
            // Check if the admin exists and is of the correct type
            if ($admin && $admin->type == 1) {
                // Now attempt to log the user in with the provided credentials
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('admin.dashboard');  // Success, redirect to dashboard
                } else {
                    // Authentication failed, wrong password
                    return redirect()->route('admin.login')->with('error', 'Either email or password is incorrect.');
                }
            } elseif ($admin && $admin->type != 1) {
                // The user exists but is not authorized to access the admin panel
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access the admin panel.');
            } else {
                // Admin with this email doesn't exist
                return redirect()->route('admin.login')->with('error', 'No account found with that email.');
            }
        } else {
            // Validation failed, return with errors
            return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }
}
