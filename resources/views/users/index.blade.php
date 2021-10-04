@extends('layouts.app')


@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


 <div class="row-fluid">
 @can('create user')
    <div class="text-right"> <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Create New User</a> </div>
	@endcan
  <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>User List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			   @foreach ($data as $key => $user)
			    
                <tr class="odd gradeX">
				<td>{{ ++$i }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
				  @if(!empty($user->getRoleNames()))
					@foreach($user->getRoleNames() as $v)
					   <label class="badge badge-success">{{ $v }}</label>
					@endforeach
				  @endif
				</td>
                  
                  <td class="center">
				  <form action="{{ route('users.destroy', $user->id) }}" method="POST"> 
          @can('edit user')
				 <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
         @endcan
					@csrf
					@method('DELETE')
          @can('delete user')
					<button type="submit" onclick="return confirm('Are you sure to delete this User?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
          @endcan
      	</form>
				  </td>
                </tr>
			@endforeach	
				
               
               
              </tbody>
            </table>
			{!! $data->render() !!}
          </div>
        </div>
	
	
	</div>
    

@endsection