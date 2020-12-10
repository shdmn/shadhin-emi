<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index(){
		$LoanApply = \App\LoanApply::all();
		return view('admin.index',compact('LoanApply'));
	}

	public function modarate_application($apply_id,$status){
		$apply = \App\LoanApply::find($apply_id);
		$apply->status = $status;
		$apply->save();

		return redirect()->back();
	} 
}
