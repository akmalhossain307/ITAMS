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
				<i class="icon icon-pencil"></i>									
			</span>
			<h5>Create New User Role</h5>
		</div>
		
          <div class="widget-content nopadding">
			<form action="{{ route('roles.store') }}" method="POST" class="form-horizontal">
				@csrf
			
              <div class="control-group">
                <label class="control-label"><b>Name</b></label>
                <div class="controls">
                  <input type="text" class="span11" name="name"placeholder="name">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"><b>Permission</b></label>
                
				
			<div class="controls">
                           
              
				
				@foreach($permission as $value)
				   
					<input type="checkbox" name="permission[]" value="{{$value->id}}"> {{ $value->name }}
				   
				<br/>
				@endforeach
				
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