@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.login-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.login-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.login-form h2:before, .login-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.login-form h2:before {
	left: 0;
}
.login-form h2:after {
	right: 0;
}
.login-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.login-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .form-group {
	margin-bottom: 20px;
}
.login-form input[type="checkbox"] {
	margin-top: 3px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.login-form .row div:first-child {
	padding-right: 10px;
}
.login-form .row div:last-child {
	padding-left: 10px;
}    	
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.login-form form a:hover {
	text-decoration: underline;
} 
</style>
</head>
<body>
	@if(session()->has('error'))
		<div class="alert alert-danger">
		{{ session()->get('error') }}
		</div>
	@endif
<div class="login-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="text-center">Log in</h2>
		<div class="form-group">		    
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email" autofocus>

				@error('email')
				<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
				</span>
				@enderror			
		</div>

		<div class="form-group">		
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

			@error('password')
			<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
			</span>
			@enderror		
		</div>
		
		<div class="clearfix">
			<input class="float-left form-check-label" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			<label class="form-check-label" for="remember">
			{{ __('Remember Me') }}
			</label>
			<a href="/forget-password" class="float-right">Forgot Password?</a>
		</div>	

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
		
		<!--
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
		-->        
    </form>
    <p class="text-center"><a href="{{ route('register') }}">Create New Account</a></p>
</div>
</body>
</html>
@endsection