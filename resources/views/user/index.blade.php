@extends('user_layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Welcome to Shadhin EMI Generator</h2>
	</div>
</div>

<div class="row" style="margin-top: 50px;">
	<div class="col-md-6">
		<h3>Apply for Loan</h3>
		<p>To apply please provide amount, number of months (duration) and interest rate below.</p>
		<form action="{{ route('user.apply') }}" method="post">
			@csrf
	        <div class="form-group">
	            <input type="number" name="amount" class="form-control" placeholder="Amount" value="" required="required" />
	        </div>
	        <div class="form-group">
	            <input type="number" name="duration" class="form-control" placeholder="Duration in months" value="" required="required" />
	        </div>
	        <div class="form-group">
	            <input type="text" name="rate" class="form-control" placeholder="Interest Rate" value="" required="required" />
	        </div>
	        <input type="submit" class="btn btn-info"  value="Apply for Loan"/>
	        @if(\Session::has('success'))
		        <p class="text-success">{{session('success')}}</p>
		        	@endif
		        	@if(\Session::has('error_apply'))
		        <p class="text-danger">{{session('error_apply')}}</p>
	        @endif
	    </form>
	</div>
</div>
<div class="row" style="margin-top: 75px;">
	<div class="col-md-12">
		<h3>List of Appications</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Amount</th>
					<th>Duration</th>
					<th>Rate</th>
					<th>Status</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($LoanApply as $apply)
				<tr>
					<td>{{$apply->amount}}</td>
					<td>{{$apply->duration}}</td>
					<td>{{$apply->rate}}</td>
					<td>
						@if($apply->status == 0)
							Pending
						@elseif($apply->status == 1)
							Approved
						@else
							Rejected
						@endif
					</td>
					<td>
						@if($apply->status == 0)
							
						@elseif($apply->status == 1)
							<a class="btn btn-info" href="{{route('apply.details',$apply->id)}}"> EMI Details</a>
						@else
							
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection