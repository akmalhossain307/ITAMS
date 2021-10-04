
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
			<h5>Assign Asset to employee</h5>
		</div>
		
          <div class="widget-content nopadding">
      <form action="{{route('saveAssign')}}" method="POST" class="form-horizontal">
       @csrf
		
      
			   
			  <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Asset Name</label>
                <div class="controls">
                <small class="text-muted text-warning">Choose from available asset list</small>
                <select name="asset_id">
                <option value="0">--Choose an Asset--</option>
                @foreach($assets as $key=>$asset)
                <option value="{{$asset->id}}"> {{$asset->asset_name}} ({{$asset->serial_no}})</option>
                @endforeach
                  </select>
                  @if ($errors->has('asset_id'))
                 		 <br/>
                 		 <span class="error">
                    	{{ $errors->first('asset_id') }}
              		  </span>
				          @endif
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Assign To</label>
                <div class="controls">
                  <select name="employee_id">
                    <option value="0">--Choose an Employee--</option>
                    @foreach($employee as $key=>$emp)
                   
                    <option value="{{$emp->employee_id}}">{{$emp->emp_name}} ({{$emp->company_name}})</option>
                    @endforeach
                  </select>
                  @if ($errors->has('employee_id'))
                 		 <br/>
                 		 <span class="error">
                    	{{ $errors->first('employee_id') }}
              		  </span>
				          @endif
                </div>
              </div>
			  
			 
              <div class="form-actions">
              <a href="{{route('assets.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>
            </form>
          </div>
        </div>


</div>
    
@endsection