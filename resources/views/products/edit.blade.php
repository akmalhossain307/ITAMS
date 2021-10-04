

@extends('layouts.app')


@section('content')



  
<div class="row-fluid">
    
		@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			
		{{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		 @endif



	<div class="widget-box">
			 <div class="widget-title">
				<span class="icon">
					<i class="icon icon-plus-sign"></i>									
				</span>
				<h5>Add New Product</h5>
			</div>
			
			  <div class="widget-content nopadding">
			  <form action="{{ route('products.update',$product->id) }}" method="POST" class="form-horizontal">
                 @csrf
                 @method('PUT')

				  <div class="control-group">
					<label class="control-label"><span style="color:coral">*</span> Product Category</label>
					<div class="controls">
					  <select name="product_category" >
						<option value="0">--Choose a Category--</option>
                        <option value="{{$product->product_category}}" selected >{{$product->product_category}}</option>
						<option value="Cloud Infrastructure">Cloud Infrastructure</option>
						<option value="Networking">Networking</option>
						<option value="Hardware">Hardware</option>
						<option value="Software">Software</option>
						<option value="Others">Others</option>
					  </select>
					  @if ($errors->has('product_category'))
                 		 <br/>
                 		 <span class="error">
                    	{{ $errors->first('product_category') }}
              		  	</span>
				    	@endif
					</div>
				  </div> 
				  
				  <div class="control-group">
					<label class="control-label"><span style="color:coral">*</span> Product Type</label>
					<div class="controls">
					  <select name="product_type">
						<option value="0">--Choose a Product Type--</option>
                        <option value="{{$product->product_type}}" selected >{{$product->product_type}}</option>
						<option value="Application Software(Cloud)">Application Software(Cloud)</option>
						<option value="Application Software">Application Software</option>
						<option value="Database">Database</option>
						<option value="Operating System">Operation System</option>
						<option value="Web Server">Web Server</option>
						<option value="Domain">Domain</option>
					  </select>
					  @if ($errors->has('product_type'))
                 		 <br/>
                 		 <span class="error">
                    	{{ $errors->first('product_type') }}
              		  </span>
				    @endif
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label"><span style="color:coral">*</span> Product Name</label>
					<div class="controls">
					  <input type="text" class="span11" name="product_name"value="{{$product->product_name}}" >
					@if ($errors->has('product_name'))
                 		 <br/>
                 		 <span class="error">
                    	{{ $errors->first('product_name') }}
              		  </span>
				    @endif
					</div>
				  </div>
				  
				  <div class="control-group">
					<label class="control-label">Manufacturer</label>
					<div class="controls">
					  <input type="text" class="span11" name="product_manufacturer"value="{{$product->product_manufacturer}}">
					</div>
				  </div>
				 
				  <div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
					  <textarea name="product_description"class="span11"> {{$product->product_description}} </textarea>
					</div>
				  </div>
				  
				  <div class="form-actions">
                  <a href="{{route('products.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary">Update</button>
				  </div>
				</form>
			  </div>
			</div>
	
	
	
	</div>
	  


@endsection