<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ManagerAccessController extends Controller
{

    public function getLogin()
    {
        return view('auth.manager-login');
    }
    public function postLogin(Request $request)
    {
        // echo $request->username.'<br>'.$request->password;

        if (Auth::guard('manager')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])
        ) {

            // Authentication passed...
            return redirect('/manager/dashboard');
        }
        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/manager');
    }
}
