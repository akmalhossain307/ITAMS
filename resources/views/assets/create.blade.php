
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
				<i class="icon icon-plus-sign"></i>									
			</span>
			<h5>Add New Asset</h5>
		</div>
		
          <div class="widget-content nopadding">
      <form action="{{route('assets.store')}}" method="POST" class="form-horizontal">
       @csrf
			 
			  
              <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Product Name</label>
                <div class="controls">
                  <select name="product_id">
                    <option value="0">--Choose an Product--</option>
                    @foreach($product as $key=>$pro)

                    <option value="{{$pro->product_name}}">{{$pro->product_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('product_id'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('product_id') }}
                            </span>
                    @endif
                </div>
              </div>


			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Vendor</label>
                <div class="controls">
                  <select name="vendor_id" >
                    <option value="0">--Choose Vendor--</option>
                    @foreach($vendor as $key=>$ven)

                    <option value="{{$ven->id}}">{{$ven->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('vendor_id'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('vendor_id') }}
                            </span>
                    @endif
                </div>
              </div>
			  
			   <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Asset Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="asset_name"placeholder="name">
                  @if ($errors->has('asset_name'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('asset_name') }}
                            </span>
                    @endif
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Serial No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="serial_no"placeholder="serial">
                  @if ($errors->has('serial_no'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('serial_no') }}
                            </span>
                    @endif
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Purchase Price</label>
                <div class="controls">
                  <input type="text" class="span11" name="purchase_price"placeholder="price">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Depreciation Type</label>
                <div class="controls">
                  <select name="depreciation_type" >
                    <option value="0">--Choose a depreciation Type--</option>
                    <option value="Straight Line">Straight Line</option>
                    <option value="One Time Purchase">One Time Purchase</option>
                    <option value="Declining Balance">Declining Balance</option>
                    <option value="Double Declining Balance">Double Declining Balance</option>
                    
                    <option value="Sum of The years digit">Sum of The years digit</option>
                  </select>
                  @if ($errors->has('depreciation_type'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('depreciation_type') }}
                            </span>
                    @endif
                </div>
              </div>
			  
			   <div class="control-group">
                <label class="control-label">Purchase Date</label>
                <div class="controls">
                <input type="date" id="start" name="purchase_date" placeholder="mm-dd-yyyy"
        min="1997-01-01" max="2080-12-31">  

				        </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Warranty Expiry Date</label>
                <div class="controls">
                <input type="date" id="start" name="warranty_expiry_date" placeholder="mm-dd-yyyy"
        min="1997-01-01" max="2080-12-31">  

  
				 
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Purchase Type</label>
                <div class="controls">
                  <select name="purchase_type">
                    <option value="0">--Choose a Purchase Type--</option>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="Leased">Leased</option>
                    <option value="Subscription">Subscription</option>
                  </select>
                  @if ($errors->has('purchase_type'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('purchase_type') }}
                            </span>
                    @endif
                </div>
              </div>
			 
			  <div class="control-group">
                <label class="control-label">Short Description</label>
                <div class="controls">
                  <textarea name="description"class="span11"placeholder="description"></textarea>
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Useful Life</label>
                <div class="controls">
                  <input type="text" class="span11" name="useful_life"placeholder="life">
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
        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>
            </form>
          </div>
        </div>


</div>
    
@endsection