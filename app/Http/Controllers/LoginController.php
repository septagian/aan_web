<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user=User::where('email', $email)->first();

        if($user) {
            if(Auth::Attempt([
                'email' => $email,
                'password' => $password
            ])) {
                return redirect()->route('index');
            }
            $credentials = $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required|min:5'
            ]);
            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('/');
            }
        }
        return back()->with('loginEror', 'login failed !');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
