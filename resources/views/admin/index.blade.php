@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Welcome to Admin Panel</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3>List of appications</h3>
		<table class="table">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Amount</th>
					<th>Duration</th>
					<th>Rate</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($LoanApply as $apply)
				<tr>
					<td>{{$apply->user_info->name}}</td>
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
					<td><a href="{{url('admin/moderate/application/'.$apply->id.'/1')}}" class="btn btn-success">Approve</a> <a class="btn btn-danger" href="{{url('admin/moderate/application/'.$apply->id.'/2')}}">Reject</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection