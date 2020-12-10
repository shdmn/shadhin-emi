<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
	public function index(){
		
	}
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required'
    	]);
    	$user = new \App\User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	$user->save();
    	// return redirect()->back()->with('success','Successfully saved');
    }

    public function login( Request $request ){
    	$this->validate($request,[
    		'email'=>'required',
    		'password'=>'required',
    	]);
 		
 		$email = $request->email;
 		$password = $request->password;

 		if( Auth::attempt(['email'=>$email,'password'=>$password]) ){
 			return redirect(route('user.index'));
 		}else{
 			return redirect()->back()->with('error_login','Email or password is wrong');
 		}

    }
}
