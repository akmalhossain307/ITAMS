
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
			<h5>Create New Location</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('locations.store')}}" method="POST" class="form-horizontal">
            @csrf
              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Location</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="location"placeholder="location">
           @if ($errors->has('location'))
                  <br/>
                  <span class="error">
                    {{ $errors->first('location') }}
                </span>
				    @endif

                </div>
              </div>
			
			  
			  <div class="control-group">
                <label class="control-label">Details</label>
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