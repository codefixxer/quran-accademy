<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{




    public function showLoginForm()
    {
        return view('auth.login'); 
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->status == 1) { // Only allow active users to log in
                Auth::login($user);

                // Redirect based on role
                if ($user->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role == 'teacher') {
                    return redirect()->route('teacher.dashboard');
                } elseif ($user->role == 'student') {
                    return redirect()->route('student.dashboard');
                }
            } else {
                return back()->with('error', 'Your account is inactive. Please contact the administrator.');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }














    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }


}
