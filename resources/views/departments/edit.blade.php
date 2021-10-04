
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
            <form action="{{route('departments.update',$department->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
           @method('PUT')

              
              
           <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Department</label>
                <div class="controls">
                   <input type="text" class="span11" id="name"name="department_name" value="{{$department->department_name}}">
                </div>
              </div>
			
              <div class="form-actions">
              <a href="{{route('departments.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection