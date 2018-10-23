@extends('layout')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">

				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
		<h2>Please Fill Up the Login Form</h2>
						
				<form action="{{URL::to('/customer-login')}}" method="post">
					{{csrf_field()}}
					<input type="email" required="" name="customer_email" placeholder="Email Id" />
					<input type="password" placeholder="Customer Password" name="password" />
					
					<button type="submit" class="btn btn-default">Login</button>
				</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
		<div class="col-sm-5">
			<div class="signup-form">
				<h2>New User Signup!</h2>
				<form action="{{URL::to('/customer-registration')}}" method="post">
					{{csrf_field()}}
					<input type="text" name="customer_name" placeholder="Full Name"/ required="" >
					<input type="email" name="customer_email" placeholder="Email Address"/ required="" >
					<input type="password" name="password" placeholder="Customer Password"/ required="" >
					<input type="number" name="customer_number" placeholder="Customer Number"/ required="" >
					<button type="submit" class="btn btn-default">Signup</button>
				</form>
			</div><!--/sign up form-->
		</div>
			</div>
		</div>
	</section><!--/form-->

@endsection