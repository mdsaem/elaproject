@extends('admin_layout')
@section('admin_content')
   <ul class="breadcrumb">
   	<li>
   	<li class="icon-home"></li>
   <a href="index.html">Home</a>
  </li>
  <li><a href="">Table</a></li>
   </ul>
   <p class="text-align:center text-success">{{Session::get('message')}}</p>
   <div class="row-fluid sortable">
   	 <div class="box span6">
   	 	<div class="box-header">
   	 		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
   	 		
   	 	</div>
   	 	<div class="box-content">
   	 		<table class="table">
   	 			<thead>
   	 				<tr>
   	 					<th>UserName</th>
   	 					<th>Mobile Number</th>
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<tr>
   	 					<?php foreach ($order_by_id as $v_order) {?> 
   	 					<?php } ?>
   	 					<td>{{$v_order->customer_name}}</td>
   	 					<td>{{$v_order->customer_number}}</td>
   	 				</tr>
   	 			</tbody>
   	 		</table>
   	 		
   	 	</div>
   	 	
   	 </div>

   	 <div class="box span6">
   	 	<div class="box-header">
   	 		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
   	 		
   	 	</div>
   	 	<div class="box-content">
   	 		<table class="table">
   	 			<thead>
   	 				<tr>
   	 					<th>User Frist Name</th>
   	 					<th>User Last Name</th>
   	 					<th>Address</th>
   	 					<th>Mobile Number</th>
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<tr>
   	 					<?php foreach ($order_by_id as $v_order) {?> 
   	 					<?php } ?>
   	 					<td>{{$v_order->shipping_fristname}}</td>
   	 					<td>{{$v_order->shipping_lastname}}</td>
   	 					<td>{{$v_order->shipping_address}}</td>
   	 					<td>{{$v_order->shipping_number}}</td>
   	 					
   	 				</tr>
   	 			</tbody>
   	 		</table>
   	 		
   	 	</div>
   	 	
   	 </div>
   	
   </div><!-- row -->

   <div class="row-fluid sortable">
   	<div class="box span12">
   		
   	
   	<div class="box-header">
   	 		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
   	 		
   	 	</div>

   	 	<div class="box-content">
   	 		<table class="table">
   	 			<thead>
   	 				<tr>
   	 					<th>Order Id</th>
   	 					<th>Product Name</th>
   	 					<th>Product Price</th>
   	 					<th>Product Sales Quantity</th>
   	 					<th>Product Sub Total</th>
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				 @foreach ($order_by_id as $v_order) 
   	 				<tr>

   	 					<td>{{$v_order->order_id}}</td>
   	 					<td>{{$v_order->product_name}}</td>
   	 					<td>{{$v_order->product_price}} .TK</td>
   	 			       <td>{{$v_order->product_sales_quantity}}</td>
   	 			       <td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
   	 			     
   	 				</tr>
   	 					@endforeach
   	 				
   	 			</tbody>

   	 			<tfoot>
   	 				
   	 				<tr>
   	 					@foreach ($order_by_id as $v_order) 
   	 					@endforeach
   	 					<td colspan="4">Total With Vat:</td>
   	 					<td><strong>={{$v_order->order_total}} TK</strong></td>
   	 				</tr>
   	 				

   	 			</tfoot>
   	 		</table>
   	 		
   	 	</div>
   </div>
   </div>
@endsection