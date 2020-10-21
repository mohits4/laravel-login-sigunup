<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;

class RegisterController extends Controller
{

	public function register()
	{
		return view('auth.signup');
	}
	public function doRegister(Request $request)
	{
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',		 
		  'password' => [
            'required',
            'string',
            'min:8',             
			'confirmed',
            'regex:/[a-z]/',     
            'regex:/[A-Z]/',      
            'regex:/[0-9]/',      
            'regex:/[@$!%*#?&]/',
        ],
          'password_confirmation' => 'required',
      ],
	  [
		'password.regex' => 'Password must contain at least one number and one uppercase and lowercase letters and one special characters.',
	  ]
	  
	  ); 
	  

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      return redirect('login');
	}
}
