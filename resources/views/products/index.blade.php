
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
  @can('create product')
    <div class="text-right"> <a href="{{route('products.create')}}" class="btn btn-info btn-sm"><i class="icon icon-plus-sign"></i> Add New Product</a> </div>
	@endcan
	 <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon icon-list"></i> </span> 
            <h5>Product List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Product Category</th>
                  <th>Product Type</th>
                  <th>Product Name</th>
                  <th>Manufacturer</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($products as $key=>$product)
                <tr class="odd gradeX">
                <td>{{$key+1}}</td>
                <td>{{$product->product_category}}</td>
                <td>{{$product->product_type}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_manufacturer}}</td>
                <td>{{$product->product_description}}</td>
                
                
                
                  <td class="center">
      <form action="{{ route('products.destroy', $product->id) }}" method="POST">      
      @can('edit product')
					<a href="{{route('products.edit',$product->id)}}" class="btn btn-info btn-sm"><i class="icon icon-edit"></i></a>
		  @endcan
        	@csrf
					@method('DELETE')
          @can('delete product')
					<button type="submit" onclick="return confirm('Are you sure to delete this product?')"class="btn btn-danger"><i class="icon icon-trash"></i></button> 
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
