<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	   <title>{{ config('app.name', 'ITAMS || Dashboard') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{ url('public/img/favicon.ico') }}" type="image/x-icon"/>
	<link rel="shortcut icon" href="{{ url('public/img/favicon.ico') }}" type="image/x-icon"/>

   
	<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/css/datepicker.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/uniform.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/select2.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/fullcalendar.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/maruti-style.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/maruti-media.css')}}" />
  
  <style> 
    

    .error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }
    
    
    
    </style>

</head>

<body>
<!--Header-part-->
<div id="header">
 <a href="{{route('home')}}">	<h3> <img src="{{asset('public/img/jayson-logo.png')}}" class="img img-circle" alt="logo" width="60px"height="20px"/> IT Asset Management System</h3> </a>
</div>












	   
	<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 



<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav" style="width: auto; margin: 0px;">
  @can('edit profile')
    <li class=""><a title="" href="{{route('users.index')}}"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
    @endcan
    @can('view notification')
    <li  id="menu-messages"><a href="{{route('notifications')}}"><i class="icon icon-flag"></i> <span class="text">Notifications</span> <span class="label label-important">5</span></a>
    @endcan
    </li>
    @can('edit settings')
    <li class=""><a title="" href="{{route('settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    @endcan
    <!--
    <li class=""><a title="" href="#"><i class="icon icon-download-alt"></i> <span class="text">Backup</span></a></li>
    -->
    <li><a class="active" title="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i>Logout</a></li>
						
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                 </form>
  
  </ul>
</div>






<!--close-top-Header-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
   @can('view dashboard')
    <li class="active"><a href="{{route('home')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	  @endcan
    @can('vendor module')
	<li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>Vendor Management</span></a>
      <ul>
        <li><a href="{{route('vendors.index')}}"><i class="icon icon-user"></i> Manage Vendor</a></li>
		 <li><a href="{{route('vendors.create')}}"><i class="icon icon-plus-sign"></i> Add Vendor</a></li>
      </ul>
    </li>
	@endcan
  @can('product module')
	<li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Product Management</span></a>
      <ul>
        <li><a href="{{route('products.index')}}"><i class="icon icon-picture"></i> Manage Product</a></li>
		 <li><a href="{{route('products.create')}}"><i class="icon icon-plus-sign"></i> Add Product</a></li>
      </ul>
    </li>
	@endcan
  @can('accessory module')
    <li class="submenu"> <a href="#"><i class="icon icon-hdd"></i> <span>Accessory Management</span></a>
      <ul>
        <li><a href="{{route('accessories.index')}}"><i class="icon icon-picture"></i> Manage Accesory</a></li>
		 <li><a href="{{route('accessories.create')}}"><i class="icon icon-plus-sign"></i> Add Accessory</a></li>
      </ul>
    </li>
@endcan
@can('asset module')
	<li class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Asset Management</span></a>
      <ul>
        <li><a href="{{route('assets.index')}}"><i class="icon icon-user"></i> Manage Asset</a></li>
        <li><a href="{{route('assets.create')}}"><i class="icon icon-plus-sign"></i> Add Asset</a></li>
        <li><a href="{{route('assignedAsset')}}"><i class="icon icon-user"></i> Assigned Asset</a></li>
        <li><a href="{{route('assign')}}"><i class="icon icon-user"></i> Assign Asset to Employee</a></li>
        
      </ul>
    </li>
	@endcan
  @can('employee module')
	<li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Employee Management</span></a>
      <ul>
        <li><a href="{{route('employees.index')}}"><i class="icon icon-user"></i> Manage Employee</a></li>
		 <li><a href="{{route('employees.create')}}"><i class="icon icon-plus-sign"></i> Add Employee</a></li>
		 <li><a href="{{ route('locations.index') }}"><i class="icon-globe"></i> Manage Location</a></li>
		 <li><a href="{{route('companies.index')}}"><i class="icon-eject"></i> Manage Campany</a></li>
		 <li><a href="{{route('departments.index')}}"><i class="icon-list-alt"></i> Manage Department</a></li>
      </ul>
    </li>
@endcan
@can('user module')
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>User Management</span></a>
      <ul>
        <li><a href="{{ route('users.index') }}"><i class="icon icon-user"></i> Manage User</a></li>
		 <li><a href="{{ route('users.create') }}"><i class="icon icon-plus-sign"></i> Create User</a></li>
        <li><a href="{{ route('roles.index') }}"><i class="icon icon-tags"></i> Manage Role</a></li>
		 <li><a href="{{ route('roles.create') }}"><i class="icon icon-plus-sign"></i> Create Role</a></li>
		 
		 <li><a class="active" title="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i>Logout</a></li>
						
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
           </form>
		 
      </ul>
    </li>
@endcan
@can('report module')
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Reports</span></a>
      <ul>
        <li><a href="{{route('asset_report')}}">Asset Report</a></li>
        <li><a href="{{route('asset_cost_report')}}">Asset Cost Report</a></li>
      
      </ul>
    </li>
	@endcan

  <!--
	<li class="submenu"> <a href="#"><i class="icon icon-cog"></i> <span>Support</span></a>
      <ul>
        <li><a href="{{route('faqs')}}"><i class="icon icon-list"></i> FAQs</a></li>
        <li><a href="{{route('user_guide')}}"><i class="icon icon-file"></i> User Guide</a></li>
      </ul>
    </li>
-->

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('home')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
  </div>
  
  
<div class="container-fluid">
  
  @yield('content')
</div>


</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; Jayson Group. <i>Developed By </i> <a href="#">Jayson Group IT</a> </div>
</div>

<script src="{{asset('public/js/jquery.min.js')}}"></script> 

<script src="{{asset('public/js/jquery.ui.custom.js')}}"></script> 


<script src="{{asset('public/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/js/select2.min.js')}}"></script> 

<script src="{{asset('public/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/js/bootstrap-datepicker.js')}}"></script> 





<script type="text/javascript"> 
$(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});

</script>







<script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('public/js/maruti.js')}}"></script> 
<script src="{{asset('public/js/maruti.tables.js')}}"></script> 
<script src="{{asset('public/js/maruti.dashboard.js')}}"></script> 
<script src="{{asset('public/js/maruti.form_common.js')}}"></script>





<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
