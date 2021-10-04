@extends('layouts.app')


@section('content')







    <div class="row-fluid">
	
	@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
	@endif
	
    <div class="text-right"> <a href="{{ route('roles.create') }}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Create New Role</a> </div>
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Role List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			 @foreach ($roles as $key => $role)
                <tr class="odd gradeX">
					<td>{{ ++$i }}</td>
					<td>{{ $role->name }}</td>
                  <td class="center">
				   <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
					@can('edit post')				   
					<a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
				   @endcan
			
				 @csrf
                 @method('DELETE')
                 <button type="submit" onclick="return confirm('Are you sure to delete this Role?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
				</form>
				 
				  </td> 
                </tr>
			@endforeach	
              </tbody>
            </table>
			{!! $roles->render() !!}
          </div>
        </div>
	
	
	</div>
    








@endsection