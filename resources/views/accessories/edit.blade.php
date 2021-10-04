
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
			<h5>Edit Accessory</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('accessories.update',$accessory->id)}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
             



            <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Company</label>
                <div class="controls">
                 

                    <select name="company_id" >
                    <option value="0">--Choose Company--</option>
                    @foreach($company as $key=>$com)

                 
<option value="{{$accessory->company_id}}" {{($accessory->company_id==$com->company_code)?"selected":''}}>{{$com->company_name}}</option>
                     
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
                    <option value="{{$accessory->accessory_category}}" selected> {{$accessory->accessory_category}}</option>
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

                    <option value="{{$ven->id}}" {{($accessory->vendor_id==$ven->id)?"selected":''}}>{{$ven->name}}</option>
   
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
                  <input type="text" class="span11" name="accessory_name"value="{{$accessory->accessory_name}}">
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
                  <input type="text" class="span11" name="manufacturer"value="{{$accessory->manufacturer}}">
                </div>
          </div>
          <div class="control-group">
                <label class="control-label"> <span style="color:coral">*</span> Model No.</label>
                <div class="controls">
                  <input type="text" class="span11" name="model_no"value="{{$accessory->model_no}}">
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
                  <input type="text" class="span11" name="order_no"value="{{$accessory->order_no}}">
                </div>
          </div>
			 
			  
			  <div class="control-group">
                <label class="control-label">Purchase Cost(Tk)</label>
                <div class="controls">
                  <input type="text" class="span11" name="purchase_unit_price"value="{{$accessory->purchase_unit_price}}">
                </div>
              </div>
          <div class="control-group">
            <label class="control-label">Purchase Quantity</label>
            <div class="controls">
              <input type="text" class="span11" name="purchase_qty"value="{{$accessory->purchase_qty}}">
            </div>
          </div>
			   <div class="control-group">
                <label class="control-label">Purchase Date(mm-dd-yyyy)</label>
                <div class="controls">
                <input type="date" id="start" name="purchase_date"value="{{$accessory->purchase_date}}"
        min="1997-01-01" max="2080-12-31">  

				        </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Warranty Expiry Date(mm-dd-yyyy)</label>
                <div class="controls">
                <input type="date" id="start" name="warranty_expiry_date" value="{{$accessory->warranty_expiry_date}}"
        min="1997-01-01" max="2080-12-31">  

  
				 
                </div>
              </div>
			  
			  
              <div class="form-actions">
              <a href="{{route('accessories.index')}}" class="btn btn-danger btn-sm">Back</a>
			&nbsp;&nbsp;&nbsp;	<button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection