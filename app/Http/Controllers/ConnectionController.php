<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;

class ConnectionController extends Controller
{
    public function index(Request $request)
	{        			
		$connections = Connection::all();
		return view('connection_list', compact('connections'));
	}
	public function getUserData(Request $request)
    {
		$Connection = Connection::findorFail($request['user_id']);
		return $Connection;
		
	}

	public function update(Request $request, $id){  
		die('dsf');         
	 
	 
	 $user         = Connection::find($id);
	 $user->name   = $request->first_name;
	 $user->email  = $request->email;
	 $user->save();
		return redirect('admin-dashboard')->with('success', 'user updated successfully');
	
	}

	public function delete($id){		
		Connection::where('id', $id)->delete();	
		return redirect('connection-list')->with('success', 'Connection deleted successfully!');	
	
	}
}
