
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
			<h5>Create New Company</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('companies.store')}}" method="POST" class="form-horizontal">
            @csrf
              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Company Code</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="company_code"placeholder="code">
           @if ($errors->has('company_code'))
                  <br/>
                  <span class="error">
                    {{ $errors->first('company_code') }}
                </span>
				    @endif

                </div>
              </div>
			

              <div class="control-group">
                <label class="control-label"><span style="color:coral">*</span> Company Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="name"name="company_name"placeholder="company name">
           @if ($errors->has('company_name'))
                  <br/>
                  <span class="error">
                    {{ $errors->first('company_name') }}
                </span>
				    @endif

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