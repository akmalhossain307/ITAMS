
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
			<h5>Add New Accessory</h5>
		</div>
		
    
          <div class="widget-content nopadding">
      <form action="{{route('accessories.store')}}" method="POST" class="form-horizontal">
       @csrf
			 
			  <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Company</label>
                <div class="controls">
                  <select name="company_id" >
                    <option value="0">--Choose Company--</option>
                    @foreach($company as $key=>$com)

                    <option value="{{$com->company_code}}">{{$com->company_name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('company_id'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('company_id') }}
                            </span>
                    @endif
              
                
                </div>
          </div>
          <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Accessory Category</label>
                <div class="controls">
                  <select name="accessory_category" >
                    <option value="0">--Choose Category--</option>
                    <option value="Mouse">Mouse</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Tonar">Tonar</option>
                    <option value="Pendrive">Pendrive</option>
                  </select>
                  @if ($errors->has('accessory_category'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('accessory_category') }}
                            </span>
                    @endif
                </div>
          </div>
          <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Vendor </label>
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
                <label class="control-label"> <span style="color:coral">*</span> Accessory Name</label>
                <div class="controls">
                  <input type="text" class="span11" name="accessory_name"placeholder="name">
                  @if ($errors->has('accessory_name'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('accessory_name') }}
                            </span>
                    @endif
                </div>
          </div>
          <div class="control-group">
                <label class="control-label"> Manufacturer</label>
                <div class="controls">
                  <input type="text" class="span11" name="manufacturer"placeholder="name">
                </div>
          </div>
          <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Model No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="model_no"placeholder="model">
                  @if ($errors->has('model_no'))
                            <br/>
                            <span class="error">
                              {{ $errors->first('model_no') }}
                            </span>
                    @endif
                </div>
          </div>
         
          <div class="control-group">
                <label class="control-label"> Order No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="order_no"placeholder="order no">
                </div>
          </div>
			 
			  
			  <div class="control-group">
                <label class="control-label">Purchase Cost</label>
                <div class="controls">
                  <input type="text" class="span11" name="purchase_unit_price"placeholder="price">
                </div>
              </div>
          <div class="control-group">
            <label class="control-label">Purchase Quantity</label>
            <div class="controls">
              <input type="text" class="span11" name="purchase_qty"placeholder="qty">
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
                <label class="control-label">Warranty Expiry Date(If available)</label>
                <div class="controls">
                <input type="date" id="start" name="warranty_expiry_date" placeholder="mm-dd-yyyy"
        min="1997-01-01" max="2080-12-31">  

  
				 
                </div>
              </div>
			  
			  
              <div class="form-actions">
        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
			&nbsp;&nbsp;&nbsp;	<button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>
            </form>
          </div>
        </div>


</div>
    
@endsection