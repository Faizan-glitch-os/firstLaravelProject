<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //to register new users
    public function registerNewUser(Request $request){
$incomingFields = $request->validate([
    'username' => 'required',
    'email' => 'required',
    'password' => 'required',
]);


        User::create($incomingFields);
        
    }
}
