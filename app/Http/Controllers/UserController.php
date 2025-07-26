<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show homepage based on auth

    public function showCorrectHomepage(){
        if (auth() -> check()){
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }

    //to logout 
    public function logout (Request $request){
        auth() -> logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();
        return redirect('/');
    }

    
    //to login
    public function login(Request $request){
    $incomingFields = $request -> validate([
        'loginusername' => 'required',
        'loginpassword' => 'required'
    ]);

    if (auth() -> attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])){
        $request -> session() -> regenerate();
          return view('homepage-feed');
    }else{
          return 'sorry';
    }
    }


    //to register new users
    public function registerNewUser(Request $request){
    $incomingFields = $request->validate([
    'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
    'email' => ['required', 'email', Rule::unique('users', 'email')],
    'password' => ['required', 'min:8', 'confirmed'],
    ]);
     User::create($incomingFields); 
    }
}
