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
					<a href="#">Add Manufacturer</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacturer</h2>
						
					</div>
					<p class="text-center text-success">
						{{Session::get('message')}}
					</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL('/store-manufacturer')}}" method="post">
							{{csrf_field()}}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Manufacturer Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacturer_name" required="">
							  </div>
							</div>
    
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacturer Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacturer_description" rows="3" required=""></textarea>
							  </div>
							</div>

								<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Manufacturer</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				</div>

@endsection