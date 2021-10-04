
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
			<h5>Edit Vendor</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('vendors.update',$editData->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
           @method('PUT')
              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="name" value="{{$editData->name}}">
           @if ($errors->has('name'))
                  <br/>
                  <span class="error">
                    {{ $errors->first('name') }}
                </span>
				    @endif

                </div>
              </div>
			  
              <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">

                <input type="file" name="logo"class="form-control" id="">
                <img src="{{ url('storage/app/public/uploads/'.$editData->logo) }}" width="200px" height="100"alt="img" title="" />
                </div>
              </div>
			  
              <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="email"value="{{$editData->email}}">
            @if ($errors->has('email'))
                  <br/>
                  <span class="error">
                    {{ $errors->first('email') }}
                </span>
				    @endif
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Contact Person</label>
                <div class="controls">
                  <input type="text" class="span11" name="contact_person"value="{{$editData->contact_person}}">
          @if ($errors->has('contact_person'))
                
             <br/>
             <span class="error">
              {{ $errors->first('contact_person') }}
            </span>
				  @endif
                </div>
            </div>
			  <div class="control-group">
                <label class="control-label">Designation</label>
                <div class="controls">
                  <input type="text" class="span11" name="designation"value="{{$editData->designation}}">
                </div>
              </div> 
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Phone No.</label>
                <div class="controls">
                  <input type="number" class="span11" name="phone_no"value="{{$editData->phone_no}}">
             @if ($errors->has('phone_no'))
                  <br/>
                  <span class="error">
              {{ $errors->first('phone_no') }}
            </span>
				    @endif
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <textarea name="address"class="span11"> {{$editData->address}}</textarea>
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">Vendor Details</label>
                <div class="controls">
                  <textarea name="details"class="span11"> {{$editData->details}}</textarea>
                </div>
              </div>
			  
              <div class="form-actions">
              <a href="{{route('vendors.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection