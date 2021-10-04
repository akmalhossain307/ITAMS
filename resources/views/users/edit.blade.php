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
			<h5>Edit User</h5>
		</div>
		
          <div class="widget-content nopadding">
		  <form action="{{ route('users.update',$user->id) }}" method="POST" class="form-horizontal">
			@csrf
        
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="name"value="{{$user->name}}">
				   
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="email"value="{{$user->email}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" class="span11" name="password"placeholder="Enter Password">
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">Confirm Password</label>
                <div class="controls">
                  <input type="password" class="span11" name="confirm-password"placeholder="Confirm Password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Role</label>
				<div class="controls"> 
					 <select class="form-control" name="roles">
							@foreach($userRole as $urole)
								@foreach($roles as $role)
								@if($urole==$role)
								<option value="{{$role}}" selected >{{$role}}</option>
								@else 
								<option value="{{$role}}" selected >{{$role}}</option>
								@endif 
								@endforeach
							@endforeach
                        </select>
				</div>
               
              </div>
              
              <div class="form-actions">
                 @csrf
				@method('PATCH')
				 <a href="{{route('users.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
 
@endsection