<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function adminDeshboard(Request $request)
	{
		$users = User::all();			
		return view('admin_deshboard', compact('users'));
	}
	public function status(Request $request){
		
		$post = User::find($request->id);

		if($post->status == 1){
			$changestatus = 0;
		}
		else{
			$changestatus = 1;
		}
		$post->status = $changestatus;
		$post->save();
		
		die();
	}
}
