
@extends('layouts.app')
@section('content')
    
    <div class="row-fluid">



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


    
	<div class="widget-box">

         <div class="widget-title">
			<span class="icon">
				<i class="icon icon-edit"></i>									
			</span>
			<h5>Edit Vendor</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('companies.update',$company->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
           @method('PUT')

              
              
           <div class="control-group">
                <label class="control-label"> Company Code</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="company_code"value="{{$company->company_code}}" readonly>
                </div>
              </div>
			

              <div class="control-group">
                <label class="control-label">Company Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="company_name"value="{{$company->company_name}}">
                </div>
              </div>


			  
              <div class="form-actions">
              <a href="{{route('companies.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection