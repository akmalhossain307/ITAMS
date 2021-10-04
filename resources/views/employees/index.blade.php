@extends('layouts.app')


@section('content')

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



<div class="row-fluid">
  @can('create employee')
    <div class="text-right"> <a href="{{route('employees.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Add New</a> </div>
	@endcan
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Employee List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Employee ID </th>
                  <th>Employee Name </th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th>Company</th>
                  <th>Department</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($alldata as $key=>$emp)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$emp->employee_id}}</td>
                <td>{{$emp->emp_name}}</td>
                <td>{{$emp->emp_email}}</td>
                <td>{{$emp->emp_phone}}</td>
                <td>{{$emp->company_name}}</td>
                <td>{{$emp->department_name}}</td>
                <td>{{$emp->location}}</td>

      <td class="center">
      <form action="{{ route('employees.destroy', $emp->id) }}" method="POST">      
      @can('edit employee')
        <a href="{{route('employees.edit',$emp->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
				@endcan
        	@csrf
					@method('DELETE')
          @can('delete employee')
					<button type="submit" onclick="return confirm('Are you sure to delete this Employee?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
			    @endcan
      
      	</form>
				  </td>
        </tr>
        @endforeach 

                
              </tbody>
            </table>
          </div>
        </div>
     
	</div>
 
    

@endsection