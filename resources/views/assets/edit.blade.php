
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
            <form action="{{route('assets.update',$asset->id)}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
             


           <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Product Category</label>
                <div class="controls"> <span>{{$asset->product_category_id}} (Existing product category)</span>
                  <select name="product_category_id">
                    <option value="0">--Choose a Category--</option>
                    <option value="Cloud Infrastructure">Cloud Infrastructure</option>
                    <option value="Networking">Networking</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Software">Software</option>
                    <option value="Others">Others</option>
                    </select>
                 
                </div>
              </div> 
			  
			  <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Product Type</label>
                <div class="controls"> <span>{{$asset->product_type_id}} (Existing product type)</span>
                  <select name="product_type_id">
                    <option value="0">--Choose an Product Type--</option>
                    <option value="Application Software(Cloud)">Application Software(Cloud)</option>
                    <option value="Application Software">Application Software</option>
                    <option value="Database">Database</option>
                    <option value="Operating System">Operation System</option>
                    <option value="Web Server">Web Server</option>
                    <option value="Domain">Domain</option>
                    </select>
                  
                </div>
              </div>
			  
			

              <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Product Name</label>
                <div class="controls">
                  <select name="product_id">
                    <option value="0">--Choose an Product--</option>
                    @foreach($product as $key=>$pro)

  <option value="{{$pro->product_name}}" {{($asset->product_id==$pro->product_name)?"selected":''}}>{{$pro->product_name}}</option>
 
                    @endforeach
                  </select>
                 
                </div>
              </div>


			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Vendor</label>
                <div class="controls">
                  <select name="vendor_id" >
                    <option value="0">--Choose Vendor--</option>
                    @foreach($vendor as $key=>$ven)

                   
<option value="{{$ven->id}}" {{($asset->vendor_id==$ven->id)?"selected":''}}>{{$ven->name}}</option>
                     
                    @endforeach
                  </select>
                
                </div>
              </div>
			  
			   <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Asset Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="asset_name" value="{{$asset->asset_name}}">
                 
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Serial No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="serial_no" value="{{$asset->serial_no}}">
                
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Purchase Price</label>
                <div class="controls">
                  <input type="text" class="span11" name="purchase_price" value="{{$asset->purchase_price}}">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Depreciation Type</label>
                <div class="controls"> <span>{{$asset->depreciation_type}} (Existing depreciation type)</span>
                  <select name="depreciation_type" >
                    <option value="0">--Choose a depreciation Type--</option>
                    <option value="Declining Balance">Declining Balance</option>
                    <option value="Double Declining Balance">Double Declining Balance</option>
                    <option value="Straight Line">Straight Line</option>
                    <option value="Sum of The years digit">Sum of The years digit</option>
                  </select>
                 
                </div>
              </div>
			  
			   <div class="control-group">
                <label class="control-label">Purchase Date (mm-dd-yyyy)</label>
                <div class="controls">
                <input type="date" id="start" name="purchase_date" value="{{$asset->purchase_date}}"
        min="1997-01-01" max="2080-12-31">  

				        </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Warranty Expiry Date (mm-dd-yyyy)</label>
                <div class="controls">
                <input type="date" id="start" name="warranty_expiry_date" value="{{$asset->warranty_expiry_date}}"
        min="1997-01-01" max="2080-12-31">  

  
				 
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Purchase Type</label>
                <div class="controls">
                  <select name="purchase_type">
                    <option value="0">--Choose a Purchase Type--</option>
                    <option value="{{$asset->purchase_type}}" selected> {{$asset->purchase_type}}</option>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="Leased">Leased</option>
                    <option value="Subscription">Subscription</option>
                  </select>
                
                </div>
              </div>
			 
			  <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description"class="span11">{{$asset->description}}</textarea>
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Useful Life</label>
                <div class="controls">
                  <input type="text" class="span11" name="useful_life"value="{{$asset->useful_life}}">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Residual Value</label>
                <div class="controls">
                  <input type="text" class="span11" name="residual_value"value="{{$asset->residual_value}}">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Rate(%)</label>
                <div class="controls">
                  <input type="number" class="span11" name="residual_rate"value="{{$asset->residual_rate}}">
                </div>
              </div>
			  
			  <h4> &nbsp;&nbsp;&nbsp;&nbsp;Add Asset Specification</h4>
			  <hr /> 
			  
				
	<div class="form-group fieldGroup">	
			  <div class="control-group">
                <label class="control-label">Specification Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="specification_name[]"placeholder="name">
                  <input type="hidden" class="span11" name="spec_counter[]">
                </div>
              </div>
			  <div class="control-group">
               <label class="control-label">Specification Value</label>
                <div class="controls">
                  
				  <input type="text" class="span11" name="specification_value[]"placeholder="value">
          <input type="hidden" class="span11" name="spec_counter[]">
                </div>
              </div>
	</div> 
			  
			  <div class="text-left"> 
					<a href="javascript:void(0)" class="btn btn-success btn-sm addMore"><i class="icon icon-plus-sign"></i> Add More field</a>
			 </div>
			  
<!-- copy of input fields group -->
<div class="form-group fieldGroupCopy" style="display: none;">
    <div class="input-group">
	
	
	<div class="text-right">  
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="icon icon-trash"></i> Remove</a>
        </div>
	</div>
			<div class="control-group">
                <label class="control-label">Specification Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="specification_name[]"placeholder="name">
                  <input type="hidden" class="span11" name="spec_counter[]">
                </div>
              </div>
			  <div class="control-group">
               <label class="control-label">Specification Value</label>
                <div class="controls">
                  
				  <input type="text" class="span11" name="specification_value[]"placeholder="value">
          <input type="hidden" class="span11" name="spec_counter[]">
                </div>
              </div>
		
    </div>
</div>






			  
              <div class="form-actions">
              <a href="{{route('assets.index')}}" class="btn btn-danger btn-sm">Back</a>
				<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection