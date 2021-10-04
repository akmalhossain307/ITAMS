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
	@can('create vendor')
    <div class="text-right"><a href="{{route('vendor_report')}}" class="btn btn-default btn-sm" target="_blank"><i class="icon icon-print"></i> Print Vendor List</a> <a href="{{route('vendors.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Create New Vendor</a> </div>
	@endcan
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Vendor List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($alldata as $key=>$ven)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$ven->name}}</td>
                <td><img src="{{ url('storage/app/public/uploads/'.$ven->logo) }}" width="70px" height="20px"alt="" title="" /> 
         
                  </td>
                <td>{{$ven->contact_person}}</td>
                <td>{{$ven->email}}</td>
                <td>{{$ven->phone_no}}</td>
                <td>{{$ven->address}}</td>
                  <td class="center">
      <form action="{{ route('vendors.destroy', $ven->id) }}" method="POST">     
          @can('view vendor') 
					<a href="{{route('vendors.show',$ven->id)}}" class="btn btn-success btn-sm"><i class="icon icon-eye-open"></i></a>
          @endcan
          @can('edit vendor')	
          <a href="{{route('vendors.edit',$ven->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
					@endcan
          @csrf
					@method('DELETE')
          @can('delete vendor')
					<button type="submit" onclick="return confirm('Are you sure to delete this User?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
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