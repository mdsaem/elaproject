@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Order Details</a></li>
			</ul>
			<p class="text-center text-success">
						{{Session::get('message')}}
					</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th> Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						 @<?php foreach ($all_order_info as $all_order_info): ?>
						 	
						
						  <tbody>
							
							<tr>
								<td class="center">{{$all_order_info->order_id}}</td>
								<td class="center">{{$all_order_info->customer_name}}</td>
								<td class="center">{{$all_order_info->order_total}}</td>
								<td class="center">{{$all_order_info->order_status}}</td>
								
								<td class="center">
									@if($all_order_info->order_status==1)
									<a class="btn btn-success" href="{{URL::to('/unactive-order/'.$all_order_info->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>                                            
									</a>
									@else
									<a class="btn btn-danger" href="{{URL::to('/active-order/'.$all_order_info->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>                                            
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/view-order/'.$all_order_info->order_id)}}">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-order/'.$all_order_info->order_id)}}">
										<i class="halflings-icon white trash" onclick="return confirm('Are You Sure Delete');"></i> 
									</a>
								</td>
							</tr>
						
						  </tbody>
						 <?php endforeach ?>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection