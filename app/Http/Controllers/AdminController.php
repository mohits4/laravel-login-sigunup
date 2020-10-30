<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function adminDashboard(Request $request)
	{
		//$users = User::all();
		//$users = User::paginate(25);		
		//$users = User::where('id', '!=', 1)->get();			
		$users = User::where('id', '!=', 1)->paginate(10);
		return view('admin_dashboard', compact('users'));
	}
	public function status(Request $request){		
		$post = User::find($request->id);
		if($post->status == 1){
			$changestatus = 0;
		}else{
			$changestatus = 1;
		}
		$post->status = $changestatus;
		$post->save();		
	}

	public function getUserData(Request $request)
    {
        $users = User::findorFail($request['id']);

        return $users;
	}   

	public function delete($id){		
			User::where('id', $id)->delete();	
			return redirect('admin-dashboard')->with('success', 'Service deleted successfully!');	
		
	}
	
	// public function destroy($id){
		
	// 	//echo "delete data";
	// 	//DB::table("user")->delete($id);
    // 	Session::put('success', 'Your Record Deleted Successfully.');
	// 	return redirect()->route('admin1_deshboard');
		

	// 	// $user = User::find($id);
	// 	// $user->delete();
	// 	//Session::flash('success', 'The project was successfully deleted!');
    //     // return redirect()->route('student.index')->with('success', 'Data Deleted');
	// }
	
}
