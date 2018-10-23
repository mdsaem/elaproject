@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>
<p class="text-center text-success">
			{{Session::get('message')}}
		</p>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Manufacturer Id</th>
					  <th>Manufacturer Name</th>
					  <th>Manufacturer Description</th>
					  <th>Publication Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>
			 @<?php foreach ($manufactures as $manufacturer): ?>
			 	
			
			  <tbody>
				
				<tr>
					<td class="center">{{$manufacturer->manufacturer_id}}</td>
					<td class="center">{{$manufacturer->manufacturer_name}}</td>
					<td class="center">{{$manufacturer->manufacturer_description}}</td>
					<td class="center">
						
					@if($manufacturer->publication_status==1)
						<span class="label label-success">Active</span>
					@else
						<span class="label label-danger">Unactive</span>

					@endif
					</td>
					<td class="center">
						@if($manufacturer->publication_status==1)
						<a class="btn btn-success" href="{{URL::to('/unactive-manufacturer/'.$manufacturer->manufacturer_id)}}">
							<i class="halflings-icon white thumbs-up"></i>                                            
						</a>
						@else
						<a class="btn btn-danger" href="{{URL::to('/active-manufacturer/'.$manufacturer->manufacturer_id)}}">
							<i class="halflings-icon white thumbs-down"></i>                                            
						</a>
						@endif
						<a class="btn btn-info" href="{{URL::to('/edit-manufacturer/'.$manufacturer->manufacturer_id)}}">
							<i class="halflings-icon white edit"></i>                                            
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete-manufacturer/'.$manufacturer->manufacturer_id)}}">
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