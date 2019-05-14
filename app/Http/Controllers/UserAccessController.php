<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserAccessController extends Controller
{

    public function getLogin()
    {
        return view('auth.user-login');
    }
    public function postLogin(Request $request)
    {
        // echo $request->username.'<br>'.$request->password;

        if (Auth::guard('user')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])
        ) {

            // Authentication passed...
            return redirect('/user/dashboard');
        }
        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/user');
    }
}
