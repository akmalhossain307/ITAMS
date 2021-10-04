@extends('layouts.app')
@section('content')
<div class="row-fluid">
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
	
	
<div class="widget-box">
         <div class="widget-title">
			<span class="icon">
				<i class="icon icon-edit"></i>									
			</span>
			<h5>Edit User Role</h5>
		</div>
		
          <div class="widget-content nopadding">
			<form action="{{ route('roles.update',$role->id) }}" method="POST" class="form-horizontal">
				@csrf
			
              <div class="control-group">
                <label class="control-label"><b>Name</b></label>
                <div class="controls">
                  <input type="text" class="span11" name="name"value="{{$role->name}}">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"><b>Permission</b></label>
                
				
			<div class="controls">
                 
				 @foreach($permission as $value)
               
                <input type="checkbox" name="permission[]" value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? "checked" : ''}}> {{ $value->name }}
               
					<br/>
				@endforeach
				
               </div>
         
              </div>
              
              <div class="form-actions">
                 <a href="{{route('roles.index')}}" class="btn btn-danger btn-sm">Back</a>
				@csrf
				@method('PATCH')
				<button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    

@endsection