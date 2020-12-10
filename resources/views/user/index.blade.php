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
            <input type="number" name="rate" class="form-control" placeholder="Interest Rate" value="" />
        </div>
        <input type="submit" class="btn"  value="Apply"/>
    </form>
	</div>
<div>
@endsection