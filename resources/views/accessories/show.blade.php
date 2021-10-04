
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
								<h5>Asset Details</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered">
									
									<tbody>
										<tr>
											<td><b>Asset Name</b></td>
											<td>{{$details->asset_name}}</td>
										</tr>
										<tr>
											<td><b>Serial No.</b></td>
											<td>{{$details->serial_no}}</td>
										</tr>
										<tr>
											<td><b>Product Name</b></td>
											<td>{{$details->product_id}}</td>
										</tr>
										<tr>
											<td><b>Product Category</b></td>
											<td>{{$details->product_category_id}}</td>
										</tr>
										<tr>
											<td><b>Product Type</b></td>
											<td>{{$details->product_type_id}}</td>
										</tr>
										
										<tr>
											<td><b>Depreciation Type</b></td>
											<td>{{$details->depreciation_type}}</td>
										</tr>
										<tr>
											<td><b>Purchase Type</b></td>
											<td>{{$details->purchase_type}}</td>
										</tr>
										<tr>
											<td><b>Purchase Date</b></td>
											<td>{{$details->purchase_date}}</td>
										</tr>
										<tr>
											<td><b>Purchase Price</b></td>
											<td>{{$details->purchase_price}}</td>
										</tr>
										<tr>
											<td><b>Warranty Expiry date</b></td>
											<td>{{$details->warranty_expiry_date}}</td>
										</tr>
										<tr>
											<td><b>Description</b></td>
											<td>{{$details->description}}</td>
										</tr>
										<tr>
											<td><b>Useful Life</b></td>
											<td>{{$details->useful_life}}</td>
										</tr>
										<tr>
											<td><b>Residual Value</b></td>
											<td>{{$details->residual_value}}</td>
										</tr>

										<tr>
											<td><b>Residual Rate</b></td>
											<td>{{$details->residual_rate}}</td>
										</tr>
										
										
										
									</tbody>
								</table>
								
							</div>
						</div>
						
						
								
			<div class="text-center">
                <a href="{{route('assets.index')}}" class="btn btn-danger btn-sm btn-block">Back</a>
			
              </div>
						
						
					</div>
	
	
	
	<div class="span3">
	</div>
	
	
</div>
   


@endsection