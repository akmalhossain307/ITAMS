
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
			<h5>Create New Vendor</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('vendors.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="name"placeholder="name">
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
                 
                </div>
              </div>
			  
              <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="email"placeholder="email">
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
                  <input type="text" class="span11" name="contact_person"placeholder="name">
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
                  <input type="text" class="span11" name="designation"placeholder="designation">
                </div>
              </div> 
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Phone No.</label>
                <div class="controls">
                  <input type="number" class="span11" name="phone_no"placeholder="phone">
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
                  <textarea name="address"class="span11" placeholder="address"></textarea>
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">Vendor Details</label>
                <div class="controls">
                  <textarea name="details"class="span11"placeholder="details"></textarea>
                </div>
              </div>
			  
              <div class="form-actions">
                 <button type="reset" class="btn btn-danger btn-sm">Reset</button>
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection