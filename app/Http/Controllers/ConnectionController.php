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

	public function store(Request $request)
	{
		// $request->validate([
		// 'destination' => 'required',
		// 'gateway' => 'required',		
		// ],
		// [
		// 	'destination.required' => 'The destination field is required.',
		// 	'gateway.required' => 'gateway',
		// ]);


		$post = new Connection;
		$post->destination = $request->input('destination');
		$post->gateway = $request->input('gateway');
		$post->save();
		return redirect('connection-list')->with('success', 'Connection updated successfully');	
	}






	public function getUserData(Request $request)
    {
		$Connection = Connection::find($request['user_id']);
		return $Connection;
		
	}

	public function update(Request $request, $id){  
		//dd($request->all());
		//dd($id);	
		$connection = Connection::find($request->get('selectitem'));
		$connection->destination   = $request->get('destination');
		$connection->gateway  = $request->get('gateway');
		$test1 = $connection->update();
		//dd($test1);
		return redirect('connection-list')->with('success', 'Connection updated successfully');	
	}

	public function delete($id){		
		Connection::where('id', $id)->delete();	
		return redirect('connection-list')->with('success', 'Connection deleted successfully!');	
	
	}
}
