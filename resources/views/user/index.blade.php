@extends('front_layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Welcome to Shadhin EMI Generator</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3>Apply for Loan</h3>
		<form action="{{ route('user.apply') }}" method="post">
			@csrf
	        <div class="form-group">
	            <input type="number" name="amount" class="form-control" placeholder="Amount" value="" />
	        </div>
	        <div class="form-group">
	            <input type="number" name="duration" class="form-control" placeholder="Duration in months" value="" />
	        </div>
	        <div class="form-group">
	            <input type="text" name="rate" class="form-control" placeholder="Interest Rate" value="" />
	        </div>
	        <input type="submit" class="btn"  value="Apply"/>
	        @if(\Session::has('success'))
		        <p class="text-success">{{session('success')}}</p>
		        	@endif
		        	@if(\Session::has('error_apply'))
		        <p class="text-danger">{{session('error_apply')}}</p>
	        @endif
	    </form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3>List of appications</h3>
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
							<a class="btn btn-info" href="{{route('apply.details',$apply->id)}}"> Emi Details</a>
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