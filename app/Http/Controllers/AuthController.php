<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthController extends Controller{

    public function showLoginForm() : View{
        return view('auth.login');
    }

    public function login(Request $request) : RedirectResponse{
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('courses.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request) : RedirectResponse{
        Auth::logout();
        return redirect()->route('courses.index');
    }

    public function showRegisterForm() : View{
        return view('auth.register');
    }

    public function register(Request $request) : RedirectResponse{
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:student,instructor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
