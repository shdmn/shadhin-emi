@extends('front_layout')
@section('content')
<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p><strong>Register first to apply for loan</strong></p>
            <p>Please login if you already have an account</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <div class="col-md-6">
	                        <h3 class="register-heading">Registration</h3>
                        	<form action="{{route('user.registration')}}" method="post">
            					@csrf
	                            <div class="form-group">
	                                <input type="text" name="name" class="form-control" placeholder="Name *" value="" required="required" />
	                            </div>
	                            <div class="form-group">
	                                <input type="email" name="email" class="form-control" placeholder="Email *" value="" required="required" />
	                            </div>
	                            <div class="form-group">
	                                <input type="password" name="password" class="form-control" placeholder="Password *" value="" required="required" />
	                            </div>
	                            <input type="submit" class="btnRegister"  value="Register"/>
                                @if(\Session::has('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif
	                        </form>
                        </div>
                        <div class="col-md-6">
	                        <h3>Login</h3>
                        	<form action="{{route('user.login')}}" method="post">
            					@csrf
	                        	<br>
	                           	<div class="form-group">
	                                <input type="email" name="email" class="form-control" placeholder="Email *" value="" required="required" />
	                            </div>
	                            <div class="form-group">
	                                <input type="password" name="password" class="form-control" placeholder="Password *" value="" required="required" />
	                            </div>
	                            
	                            <input type="submit" class="btnRegister"  value="Login"/>
	                            @if(\Session::has('error_login'))
	                            <p class="text-danger">{{session('error_login')}}</p>
	                            @endif
	                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection