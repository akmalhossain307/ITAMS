
@extends('layouts.app')
@section('content')


<div class="row-fluid">
	

	<div class="span3">
	</div>
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-eye-open"></i>
								</span>
								<h5>Vendor Details</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered">
									
									<tbody>
										<tr>
											<td><b>Name</b></td>
											<td>{{$details->name}}</td>
										</tr>
										<tr>
											<td><b>Logo</b></td>
											<td><img src="{{ url('storage/app/public/uploads/'.$details->logo) }}" alt="logo" class="img img-circle" width="100px" height="50px"/></td>
										</tr>
										<tr>
											<td><b>Email</b></td>
											<td>{{$details->email}}</td>
										</tr>
										<tr>
											<td><b>Contact Person</b></td>
											<td>{{$details->contact_person}}</td>
										</tr>
										<tr>
											<td><b>Phone No.</b></td>
											<td>{{$details->phone_no}}</td>
										</tr>
										<tr>
											<td><b>Designation</b></td>
											<td>{{$details->designation}}</td>
										</tr>
										<tr>
											<td><b>Address</b></td>
											<td>{{$details->address}}</td>
										</tr>
										<tr>
											<td><b>Details</b></td>
											<td>{{$details->details}}</td>
										</tr>
										
									</tbody>
								</table>
								
							</div>
						</div>
						
						
								
			<div class="text-center">
                <a href="{{route('vendors.index')}}" class="btn btn-danger btn-sm btn-block">Back</a>
			
              </div>
						
						
					</div>
	
	
	
	<div class="span3">
	</div>
	
	
</div>
   


@endsection