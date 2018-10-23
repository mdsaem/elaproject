@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
						
					</div>
					<p class="text-center text-success">
						{{Session::get('message')}}
					</p>
					<div class="box-content">
				<form class="form-horizontal" action="{{URL('/store-product')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				  <fieldset>
					
					<div class="control-group">
					  <label class="control-label" for="date01">Product Name</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" name="product_name" required="">
					  </div>
					</div>

					 <div class="control-group">
					<label class="control-label" for="selectError3">Product Category</label>
						<div class="controls">
						  <select id="selectError3" name="category_id">
				 <?php
	                 $show_category=DB::table('categories')
	                 ->where('publication_status',1)
	                 ->get();
	              foreach ($show_category as $Category) {?>
							<option value="{{$Category->category_id}}">{{$Category->category_name}}</option>
				<?php } ?>
							
						  </select>
						</div>
					  </div>

					 <div class="control-group">
					<label class="control-label" for="selectError3">Manufacturer Category</label>
						<div class="controls">
						  <select id="selectError3" name="manufacturer_id">
				 <?php
	                 $show_manufacturer=DB::table('manufacturers')
	                 ->where('publication_status',1)
	                 ->get();
	                 foreach ($show_manufacturer as $manufacturer) {?>
							<option value="{{$manufacturer->manufacturer_id}}"> {{$manufacturer->manufacturer_name}}</option>
					<?php } ?>
						  </select>
						</div>
					  </div>
    
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Product Short Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="product_short_description" rows="3" required=""></textarea>
					  </div>
					</div>

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Product Long Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="product_logn_description" rows="3" required=""></textarea>
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="date01">Product Price</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" name="product_price" required="">
					  </div>
					</div>

				
			<div class="control-group">
               	<label class="control-label" for="imageInput">File input</label>
		        <input data-preview="#preview" name="product_image" type="file" id="imageInput">
		        
        </div>
					<div class="control-group">
					  <label class="control-label" for="date01">Product Size</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" name="product_size" required="">
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="date01">Product Colour</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" name="product_color" required="">
					  </div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Publication Status</label>
							<div class="controls">
							<input type="checkbox" name="publication_status" value="1">
						  </div>
						</div>
						<div class="form-actions">
						  <button type="submit" class="btn btn-primary">Add Product</button>
						  <button type="reset" class="btn">Cancel</button>
						</div>
					  </fieldset>
					</form>   

				</div>
				</div><!--/span-->
				</div>

@endsection