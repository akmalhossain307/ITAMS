
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
            <form action="{{route('employees.update',$employee->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
           @method('PUT')
             


           <div class="control-group">
                <label class="control-label"> Employee ID</label>
                <div class="controls">
                  <input type="text" class="span11" name="employee_id" value="{{$employee->employee_id}}" readonly >
                 
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"> Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_name" value="{{$employee->emp_name}}">
                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_email"value="{{$employee->emp_email}}">
                  
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">Phone No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_phone"value="{{$employee->emp_phone}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Company</label>
                <div class="controls">
                  <select name="company_id">
                  

                    @foreach($company as $key=>$com)

                    <option value="{{$com->id}}" {{($employee->company_id==$com->id)?"selected":''}} > {{$com->company_name}}</option>
                    @endforeach
                   
                  </select>
                 
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">  Department</label>
                <div class="controls">
                  <select name="department_id">
                    
                    @foreach($department as $key=>$dep)

                    <option value="{{$dep->id}}" {{($employee->department_id==$dep->id)?"selected":''}}>{{$dep->department_name}}</option>
                    @endforeach
                   
                  </select>
                 
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">  Location</label>
                <div class="controls">
                  <select name="location_id" >
                   
                    @foreach($location as $key=>$loc)
                     <option value="{{$loc->id}}" {{($employee->location_id==$loc->id)?"selected":''}}>{{$loc->location}}</option>
                    @endforeach
                    
                  </select>
                 
                </div>
              </div>









			  
              <div class="form-actions">
              <a href="{{route('employees.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection