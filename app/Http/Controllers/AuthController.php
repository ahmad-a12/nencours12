<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register (){
        return view('Auth.register');
    }

    public function store(AuthRequest $request){
        $user =  User::create([
            'name' => $request -> name,
            'password' => Hash::make($request -> password),
            'email' => $request -> email,
            'phone' => $request -> phone,
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function login (){
        return view('Auth.login');
    }
    public function save(LoginRequest $request)
   {
       $data=$request->only(['email','password']);
       if(Auth::attempt($data)){
           return redirect()->route('home');
       }
       return redirect()-> back()->withErrors(['password' => 'data is wrong']);
   }
   public function logout (){
       Session::flush();
       Auth::logout();
       return redirect()->route('login');
   }
   /**
    * Summary of updatepassword
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\RedirectResponse
    */
   public function updatepassword(Request $request): RedirectResponse
   {
       $validated = $request->validateWithBag('updatePassword', [
           'current_password' => ['required', 'current_password'],
           'password' => ['required', 'confirmed'],
       ]);

       $request->user()->update([
           'password' => Hash::make($validated['password']),
       ]);

       return back()->with('status', 'password-updated');
   }
}