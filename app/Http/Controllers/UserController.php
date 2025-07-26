<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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
