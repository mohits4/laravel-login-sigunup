<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Connection;
use App\Goalscorer;
use Illuminate\Database\QueryException;

class ConnectionController extends Controller
{
    public function index(Request $request)
	{        			
		$connections = Connection::all();
		return view('connection_list', compact('connections'));
	}
	public function store(Request $request)
	{
		$request->validate([
		'destination' => 'required',
		'gateway' => 'required',		
		],
		[
			'destination.required' => 'The destination field is required.',
			'gateway.required' => 'gateway',
		]);

		$post = new Connection;
		$post->destination = $request->input('destination');
		$post->gateway = $request->input('gateway');
		$post->genmask = $request->input('genmask');

		$post->save();
		
		return redirect('connection-list')->with('success', 'Connection updated successfully');	
	}
	public function store1(Request $request)
    {
		//dd('test');

         $validator = \Validator::make($request->all(), [
            'destination' => 'destination',
            'gateway' => 'gateway',            
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $goalscorer= new Connection();
        $goalscorer->destination=$request->get('destination');
        $goalscorer->gateway=$request->get('gateway');        
        $goalscorer->save();
   
        return response()->json(['success'=>'Data is successfully added']);
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
		$connection->genmask  = $request->get('genmask');
		$connection->metric  = $request->get('metric');
		$test1 = $connection->update();
		//dd($test1);
		return redirect('connection-list')->with('success', 'Connection updated successfully');	
	}

	public function delete($id){		
		Connection::where('id', $id)->delete();	
		return redirect('connection-list')->with('success', 'Connection deleted successfully!');	
	
	}
	/* 
	Extra testing
	*/
	public function create()
    {
        return view('create');
	}
	public function store2(Request $request)
    {

         $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'club' => 'required',
            'country' => 'required',
            'score' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $goalscorer= new Goalscorer();
        $goalscorer->name=$request->get('name');
        $goalscorer->club=$request->get('club');
        $goalscorer->country=$request->get('country');
        $goalscorer->score=$request->get('score');
        $goalscorer->save();
   
        return response()->json(['success'=>'Data is successfully added']);
    }
}
