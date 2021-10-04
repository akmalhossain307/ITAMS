
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
			<h5>Create New Employee</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('employees.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
              
              

            <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Employee ID</label>
                <div class="controls">
                  <input type="text" class="span11" name="employee_id"placeholder="Employee ID">
                  @if ($errors->has('employee_id'))
                    <br/>
                    <span class="error">
                      {{ $errors->first('employee_id') }}
                  </span>
				          @endif
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_name"placeholder="name">
                  @if ($errors->has('emp_name'))
                    <br/>
                    <span class="error">
                      {{ $errors->first('emp_name') }}
                  </span>
				          @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_email"placeholder="email">
                  
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">Phone No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="emp_phone"placeholder="phone">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Company</label>
                <div class="controls">
                  <select name="company_id">
                    <option value="0">--Choose a Company--</option>

                    @foreach($company as $key=>$com)

                    <option value="{{$com->id}}">{{$com->company_name}}</option>
                    @endforeach
                   
                  </select>
                  @if ($errors->has('company_id'))
                    <br/>
                    <span class="error">
                      {{ $errors->first('company_id') }}
                  </span>
				          @endif
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Department</label>
                <div class="controls">
                  <select name="department_id">
                    <option value="0">--Choose a Department--</option>
                    @foreach($department as $key=>$dep)

                    <option value="{{$dep->id}}">{{$dep->department_name}}</option>
                    @endforeach
                   
                  </select>
                  @if ($errors->has('department_id'))
                    <br/>
                    <span class="error">
                      {{ $errors->first('department_id') }}
                  </span>
				          @endif
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Location</label>
                <div class="controls">
                  <select name="location_id" >
                    <option value="0">--Choose a Location--</option>

                    @foreach($location as $key=>$loc)
                     <option value="{{$loc->id}}">{{$loc->location}}</option>
                    @endforeach
                    
                  </select>
                  @if ($errors->has('location_id'))
                    <br/>
                    <span class="error">
                      {{ $errors->first('location_id') }}
                  </span>
				          @endif
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