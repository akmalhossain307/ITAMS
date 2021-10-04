
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
				<i class="icon icon-edit"></i>									
			</span>
			<h5>Edit Settings</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('updateSettings')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="control-group">
                <label class="control-label">App Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="app_name"value="{{$settings->app_name}}">
          
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Company Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="company_name"value="{{$settings->company_name}}">
          
                </div>
              </div>
			  
       <div class="text-center">  <img src="{{ url('storage/app/public/uploads/settings/'.$settings->company_logo) }}" width="40px" height="15px"alt="logo" class="img img-thumbnail" /> 
          </div>
			  <div class="control-group">
                <label class="control-label">Company Logo</label>

                
                <div class="controls">
               
                <input type="file" name="company_logo"class="form-control" id="">
               
                </div>
              </div>
			  
              <div class="control-group">
                <label class="control-label">Company Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="company_email"value="{{$settings->company_email}}">
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"> Contact No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="contact_no"value="{{$settings->contact_no}}">
                </div>
            </div>
			  
			  
			  
			  <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <textarea name="address"class="span11" >{{$settings->address}}</textarea>
                </div>
              </div>

              <div class="form-actions">
              <a href="{{route('home')}}" class="btn btn-danger btn-sm">Cancel</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection