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
			<h5>Create New User</h5>
		</div>
		
          <div class="widget-content nopadding">
		  <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
			@csrf
        
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="name"placeholder="name">
				   
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" class="span11" name="email"placeholder="email">
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
							@foreach($roles as $role)
							<option value="{{$role->name}}">{{$role->name}}</option>
							@endforeach
                        </select>
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