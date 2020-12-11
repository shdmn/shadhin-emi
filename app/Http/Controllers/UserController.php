<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
	public function index(){
		$LoanApply = \App\LoanApply::where('userId',\Auth::user()->id)->get();
		return view('user.index',compact('LoanApply'));
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
 			if( Auth::user()->is_admin == 1 ){
 				return redirect(route('admin.index'));
 			} else {
 				return redirect(route('user.index'));
 			}
 		}else{
 			return redirect()->back()->with('error_login','Email or password is wrong');
 		}
    }

    public function application_store( Request $request ){
    	$this->validate($request,[
    		'amount'=>'required|numeric',
    		'duration'=>'required|numeric',
    		'rate'=>'required|numeric'
    	]);
    	$LoanApply = new \App\LoanApply();
    	$LoanApply->amount = $request->amount;
    	$LoanApply->duration = $request->duration;
    	$LoanApply->rate = $request->rate;

    	$LoanApply->userId = \Auth::user()->id;

    	$total_interest = $LoanApply->amount * $LoanApply->duration * $LoanApply->rate / 100;
      	$LoanApply->emi = ($total_interest + $LoanApply->amount) / $LoanApply->duration;

    	if ( $LoanApply->save() ){
    		return redirect()->back()->with('success','Successfully Applied');
    	} else {
    		return redirect()->back()->with('error_apply','Something went wrong. Please review your application.');
    	}    	
    }
    
    public function emi_details($apply_id){
    	$apply = \App\LoanApply::find($apply_id);
    	return view('user.emi_details',compact('apply'));
    }
}
