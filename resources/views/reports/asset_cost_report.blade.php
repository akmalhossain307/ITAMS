
@extends('layouts.app')
@section('content')
    
    <div class="row-fluid">

    
	<div class="widget-box">

         <div class="widget-title">
			<span class="icon">
				<i class="icon icon-file"></i>									
			</span>
			<h5>Asset Costing Report</h5>
		</div>
		
          <div class="widget-content nopadding">
            <form action="{{route('view_asset_cost_report')}}" target="_blank"method="GET" class="form-horizontal">

			  
            <div class="control-group">
                <label class="control-label">From Date</label>
                <div class="controls">
                    <input type="date" id="start" name="from_date" placeholder="mm-dd-yyyy"
        min="1997-01-01" max="2080-12-31" required>  
        
			    </div>
            </div>

            <div class="control-group">
                <label class="control-label">To Date</label>
                <div class="controls">
                    <input type="date" id="start" name="to_date" placeholder="mm-dd-yyyy"
        min="1997-01-01" max="2080-12-31" required>  
        
			    </div>
            </div>

              <div class="form-actions">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-danger btn-sm">Reset</button>
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              </div>
            </form>
          </div>
        </div>
</div>
    
@endsection