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
  @can('create asset')
    <div class="text-right"> <a href="{{route('assets.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Add New</a> </div>
	@endcan
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
                  <th>Serial No. </th>
                  <th>Product Type</th>
                  <th>Product Name</th>
                  <th>Vendor Name</th>
                  <th>Current Status</th>
                  <th>Assign</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($alldata as $key=>$asset)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$asset->asset_name}}</td>
                <td>{{$asset->serial_no}}</td>
                <td>{{$asset->product_type_id}}</td>
                <td>{{$asset->product_id}}</td>
                <td>{{$asset->name}}</td>
                <td>@if($asset->status=='0')
                       <span class="label label-warning">Unassigned</span>
                      @else 
                      <span class="label label-success">Assigned</span>
                     @endif
                </td>
                <td> 
                @if($asset->status=='0')
                <a href="{{route('AssignedAsset.show',$asset->id)}}" class="btn btn-info btn-sm">Assign</a> 
                
                @else 
                <a href="#" class="btn btn-info btn-sm disabled">Assign</a>
                @endif 
                </td>
               

                  <td class="center">
      <form action="{{ route('assets.destroy', $asset->id) }}" method="POST">   
      @can('view asset')
      <a href="{{route('assets.show',$asset->id)}}" class="btn btn-success btn-sm"><i class="icon icon-eye-open"></i></a>   
      @endcan
      @can('edit asset')
      	<a href="{{route('assets.edit',$asset->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
      @endcan
					@csrf
					@method('DELETE')
          @can('delete asset')
					<button type="submit" onclick="return confirm('Are you sure to delete this Asset?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
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