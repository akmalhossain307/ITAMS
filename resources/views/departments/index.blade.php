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
	
    <div class="text-right"> <a href="{{route('departments.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Create New</a> </div>
	
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Location List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Department Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($alldata as $key=>$dep)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$dep->department_name}}</td>
            
                
                  <td class="center">
      <form action="{{ route('departments.destroy', $dep->id) }}" method="POST">      
				<a href="{{route('departments.edit',$dep->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
					@csrf
					@method('DELETE')
					<button type="submit" onclick="return confirm('Are you sure to delete this department?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
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