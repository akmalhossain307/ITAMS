@extends('layouts.app')

@section('content')

			
			
			
	
    <div class="row-fluid">
	<h4>Welcome to Dashboard</h4>
      <div class="widget-box">
	  
	     
	  
        <div class="widget-title">
          <h5><i class="icon icon-signal"></i> Analytics</h5>
         
        </div>
        <div class="widget-content">
          <div class="row-fluid">
        
			 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
                    
			 	
   
    <ul class="quick-actions">
    @can('vendor module')
	 <li> <a href="{{route('vendors.index')}}"><span class="label label-important vCount">{{$vendors}}</span> <i class="icon-client"></i> Vendors </a> </li>
	 @endcan
   @can('asset module')
   <li> <a href="{{route('assets.index')}}"><span class="label label-important vCount">{{$assets}}</span> <i class="icon-survey"></i> Assets </a> </li>
   @endcan
   @can('vendor module')
   <li> <a href="{{route('accessories.index')}}"><span class="label label-important vCount">{{$accessories}}</span> <i class="icon icon-hdd"></i> Accessory </a> </li>
   @endcan
   @can('asset module')
   <li> <a href="#"><span class="label label-important vCount">{{$assignedAssets}}</span> <i class="icon-piechart"></i> Assigned </a> </li>
	 @endcan
   @can('vendor module')
   <li> <a href="#"><span class="label label-important vCount">{{$unAssignedAssets}}</span> <i class="icon-database"></i> Unassigned </a> </li>
	 @endcan
   @can('employee module')
   <li> <a href="{{route('locations.index')}}"><span class="label label-important vCount">{{$locations}}</span> <i class="icon-web"></i> Locations </a> </li>
	 @endcan
   @can('employee module')
   <li> <a href="{{route('companies.index')}}"><span class="label label-important vCount">{{$companies}}</span> <i class="icon-database"></i> Companies </a> </li>
	 @endcan
   @can('employee module')
   <li> <a href="{{route('departments.index')}}"><span class="label label-important vCount">{{$departments}}</span> <i class="icon-cabinet"></i> Departments </a> </li>
	 <!--<li> <a href="#"><span class="label label-important vCount">0</span> <i class="icon-wallet"></i> Accessory </a> </li>-->
	 @endcan
   @can('employee module')
   <li> <a href="{{route('employees.index')}}"><span class="label label-important vCount">{{$employees}}</span> <i class="icon-people"></i> Employee </a> </li>
	 @endcan
   @can('product module')
   <li> <a href="{{route('products.index')}}"><span class="label label-important vCount">{{$products}}</span> <i class="icon-shopping-bag"></i> Products </a> </li>
	 @endcan
   @can('asset module')
   <li> <a href="{{route('assets.index')}}"><span class="label label-important vCount">BDT {{number_format($totalAssetCost,2)}}</span> <i class="icon-shopping-bag"></i> Total Asset Cost </a> </li>
   @endcan
   @can('accessory module')
   <li> <a href="{{route('accessories.index')}}"><span class="label label-important vCount">BDT {{number_format($totalAccessoryCost,2)}}</span> <i class="icon-shopping-bag"></i> Accessory Cost </a> </li>
   @endcan    
        </ul>
   
			
          </div>
        </div>
      </div>
    </div>
    		
			
			
			
			
			
			
			
			
@endsection
          
  