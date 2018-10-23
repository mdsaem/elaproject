@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container">
	
		<div class="register-req">
		<p>Please Give fill up this  From</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
					
<div class="col-sm-12 clearfix">
	<div class="bill-to">
		<p>Shipping Details</p>
		<div class="form-one">
			<form action="{{URL('/save-shipping')}}" method="post">
				{{csrf_field()}}
			<input type="text" name="shipping_email" placeholder="Email*">
			<input type="text" name="shipping_fristname" placeholder="First Name *">
			<input type="text" name="shipping_lastname" placeholder="Last Name *">
			<input type="text" name="shipping_address" placeholder="Address *">
			<input type="text" name="shipping_number" placeholder="Mobile Number *">
			<input type="text" name="shipping_city" placeholder="City*">
			<input type="submit" class="btn btn-default" value="Submit" >
		</form>
		</div>
		
	</div>
</div>
								
	</div>
	</div>
		
</div>
	</section> <!--/#cart_items-->

@endsection