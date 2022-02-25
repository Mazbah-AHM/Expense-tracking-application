<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function login(){
        // dd(auth()->user());
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");

    }

    public function register_user(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user_save = $user->save();
        if($user_save){
            $message = "Registration Succesfull!";
            return redirect()->route('login')->with( ['message' => $message] );
        }else{
            return back()->with('fail', 'Something went wrong. Please try again!');
        }

    }

    public function login_user(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect('dashboard');
                }else{
                    return "wrong Credentials";
                }
                
            } else{
                return back()->with('fail', "Incorrect username or password");
            }
        }else{
            return back()->with('fail', "Incorrect username or password");
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }
}
