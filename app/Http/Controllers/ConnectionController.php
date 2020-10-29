<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;

class ConnectionController extends Controller
{
    public function index(Request $request)
	{
        //$users = User::all();
		//$users = User::paginate(25);		
		//$users = User::where('id', '!=', 1)->get();			
		$connections = Connection::all();
		return view('connection_list', compact('connections'));
	}
}
