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
@can('create accessory')
    <div class="text-right"> <a href="{{route('accessories.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Create New</a> </div>
	@endcan
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Accessory List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Accessory Name </th>
                  <th>Model No. </th>
                  <th>Order No. </th>
                  <th>Accessory Type</th>
                  <th>Purchased for</th>
                  <th>Vendor Name</th>
                  <th>Pur. Qty</th>
                  <th>Pur. Date</th>
                  <th>Unit Cost</th>
                  <th>Total Cost</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($alldata as $key=>$accessory)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$accessory->accessory_name}}</td>
                <td>{{$accessory->model_no}}</td>
                <td>{{$accessory->order_no}}</td>
                <td>{{$accessory->accessory_category}}</td>
                <td>{{$accessory->company_name}}</td>
                <td>{{$accessory->name}}</td>
                <td>{{$accessory->purchase_qty}}</td>
                <td>{{$accessory->purchase_date}}</td>
                <td>Tk {{$accessory->purchase_unit_price}}</td>
                <td>Tk 
                @php 
                echo$total_cost=$accessory->purchase_qty*$accessory->purchase_unit_price;
                @endphp
              
                </td>
               
                  <td class="center">
      <form action="{{ route('accessories.destroy', $accessory->id) }}" method="POST">    
      @can('edit accessory')
      	<a href="{{route('accessories.edit',$accessory->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
@endcan
					@csrf
					@method('DELETE')
          @can('delete accessory')
					<button type="submit" onclick="return confirm('Are you sure to delete this accessoriy?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
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