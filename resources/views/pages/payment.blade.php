@extends('layout')
@section('content')

<section id="cart_items">
<div class="container col-sm-12">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">Shopping Cart</li>
		</ol>
	</div>
	<div class="table-responsive cart_info">
		<?php
		$contents=Cart::content();
		/*echo "<pre>";
		print_r($contents);
	echo "</pre>";*/
	
		?>
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Image</td>
					<td class="description">Name</td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contents as $content) {?>
					
				
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{URL::to($content->options->image)}}" style="height: 80px; weight 80px;" alt=""></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{$content->name}}</a></h4>
						
					</td>
					<td class="cart_price">
						<p>{{$content->price}}</p>
					</td>
	<td class="cart_quantity">
		<div class="cart_quantity_button">
				<form action="{{URL::to('/update-cart')}}" method="post">
					{{csrf_field()}}
				<input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2" required="">

			<input  type="hidden" name="rowId" value="{{$content->rowId}}">

		<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
		</form>
			</div>
			</td>
					<td class="cart_total" >

						<p class="cart_total_price">{{$content->total}}</p> 
						
					
					</td>
			<td class="cart_delete">
				<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cat/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
			</td>

				</tr>
				<?php } ?>
				
					
				</tr>
			</tbody>
		</table>
	</div>
</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
			<div class="headingWrap">
					<h3 class="headingTop text-center">Select Your Payment Method</h3>	
					<p class="text-center">Created with bootsrap button and using radio button</p>
			</div>
			
			<form action="{{URL::to('/order-place')}}" method="post">
						{{csrf_field()}}
		            
		            	
		                <input type="radio" name="payment_method"  value="handcash">HandCash<br> 
		            
		           
		            	
		                <input type="radio" name="payment_method" value="cart" > Debit Cart<br> 
		          
		            
		                <input type="radio" name="payment_method" value="bkash">Bkash<br> 
		           
			            		
				      <input type="submit" class="btn btn-success" value="Done" > 
				            
					</form>
				         
				        </div>        
					</div>
		
</section><!--/#do_action-->

@endsection