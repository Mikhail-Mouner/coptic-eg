<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function lock(){
        session()->put('locked', true);
        return view('errors.lock');
    }

    public function unlock(Request $request)
    {
        $password = $request->password;

        if(Hash::check($password,Auth::user()->password)){
            session()->forget('locked');
            return redirect()->route('home');
        }
        return redirect()->route('lockscreen')->withErrors('Password does not match. Please try again.','password');
    }
}
