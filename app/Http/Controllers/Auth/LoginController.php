<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Validator;

class LoginController extends Controller
{
    public function login()
	{
		return view('auth.login');
	}
	public function doLogin(Request $request)
    {
        $input = $request->all();

		$remember = ($request->get('remember')) ? true : false;
		$validate = Validator::make($input, [
			'email' 	=> 'required',
			'password' 	=> 'required'
		]);	
		
		if (!$validate->fails()){
			
			$userdata = array(
				'email'  	=> $request->get('email'),
				'password'  => $request->get('password')
			);
			
			if (Auth::attempt($userdata,$remember)) {
				$user = Auth::user();
				if($user->status == 0){
					Auth::logout();
					return Redirect::back()->with('error', 'Your account is not activated.');
				}
				if(($user->role_type == 'admin')){
					//updateLastLogin($user->id);		
					return redirect()->intended('admin-dashboard');
				}else{
					return redirect('home');
				}
			}else{
				return Redirect::back()->with('error', 'Incorrect username or password.');
			}
		}else{
			return Redirect::back()->with('error', 'Incorrect username or password.');
		}
    }
	public function logout() {
		Auth::logout();
		//Auth::guard('admin')->logout();
		return redirect('login');
	}
}
