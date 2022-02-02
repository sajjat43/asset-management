<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminUserController;

class AdminUserController extends Controller
{
    
    public function logout()
    {
        $user=Auth::user();
        Auth::logout($user);
        return redirect()->route('admin.login')->with('logoutmessage','Logged Out');
    }

    public function login()
    {
        
        return view('admin.fixed.login');
        
    }

    public function LoginView(Request $req)
    {
        // @dd($req->all());


        if( Auth::attempt([ 'email'=>$req->email,'password'=>$req->password]))
        {

            //dd(Auth::user()->id);

            if(Auth::user()->role=='admin')
            {

                return redirect()->route('home')->with('loginmessage','Logged In');
                
            }

            return redirect()->route('home')->with('loginmessage','Logged In');
        }  
        else
        {
            return redirect()->back()->with('invalid','Invalid Username or Password');
        }
    }

    
    
}
