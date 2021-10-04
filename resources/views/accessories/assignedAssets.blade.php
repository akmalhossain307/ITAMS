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
	
    <div class="text-right"> <a href="{{route('assets.index')}}" class="btn btn-danger btn-sm"> Back</a> </div>
	
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Asset List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Asset Name </th>
                  <th>Assigned To </th>
                  
                  <th>Assigned Date</th>
                </tr>
              </thead>
              <tbody>
              @foreach($assets as $key=>$asset)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$asset->asset_name}}</td>
                <td>{{$asset->emp_name}}({{$asset->employee_id}})</td>
                <td>{{$asset->updated_at}}</td>
        </tr>

        @endforeach
  

                
              </tbody>
            </table>
          </div>
        </div>
     
	</div>
 
    

@endsection