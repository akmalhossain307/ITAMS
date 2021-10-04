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
	<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/uniform.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/select2.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/fullcalendar.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/maruti-style.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/maruti-media.css')}}" />
</head>

<body>

<!--Header-part-->
<div id="header">

	<h3> <a href="{{route('home')}}"> <img src="{{asset('public/img/jayson-logo.png')" class="img img-circle" alt="logo" width="60px"height="20px"/> IT Asset Management System</a></h3>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    
    <li class=" dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">User</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon icon-user"></i> Profile</a></li>
        <li><a class="sInbox" title="" href="#"><i class="icon icon-cog"></i> Change Password</a></li>
		<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> Logout</a>
									   
								 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>	   
                        </li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
  </ul>
</div>

<!--close-top-Header-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
    <li class="active"><a href="{{route('home')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	
	<li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>Vendor Management</span></a>
      <ul>
        <li><a href="vendor.html"><i class="icon icon-user"></i> Manage Vendor</a></li>
		 <li><a href="addVendor.html"><i class="icon icon-plus-sign"></i> Add Vendor</a></li>
      </ul>
    </li>
	
	<li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Product Management</span></a>
      <ul>
        <li><a href="product.html"><i class="icon icon-picture"></i> Manage Product</a></li>
		 <li><a href="addProduct.html"><i class="icon icon-plus-sign"></i> Add Product</a></li>
      </ul>
    </li>
	
	
	<li class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Asset Management</span></a>
      <ul>
        <li><a href="asset.html"><i class="icon icon-user"></i> Manage Asset</a></li>
        <li><a href="addAsset.html"><i class="icon icon-plus-sign"></i> Add Asset</a></li>
        <li><a href="assignedAsset.html"><i class="icon icon-user"></i> Assigned Asset</a></li>
      </ul>
    </li>
	
	<li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Employee Management</span></a>
      <ul>
        <li><a href="employee.html"><i class="icon icon-user"></i> Manage Employee</a></li>
		 <li><a href="addEmployee.html"><i class="icon icon-plus-sign"></i> Add Employee</a></li>
		 <li><a href="location.html"><i class="icon-globe"></i> Manage Location</a></li>
		 <li><a href="company.html"><i class="icon-eject"></i> Manage Campany</a></li>
		 <li><a href="department.html"><i class="icon-list-alt"></i> Manage Department</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Reports</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="index.html"><i class="icon icon-user"></i> <span>User Management</span></a>
      <ul>
        <li><a href="users.html"><i class="icon icon-user"></i> Manage User</a></li>
		 <li><a href="createUser.html"><i class="icon icon-plus-sign"></i> Create User</a></li>
        <li><a href="roles.html"><i class="icon icon-tags"></i> Manage Role</a></li>
		 <li><a href="createRole.html"><i class="icon icon-plus-sign"></i> Create Role</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="index.html"><i class="icon icon-cog"></i> <span>Support</span></a>
      <ul>
        <li><a href="faqs.html"><i class="icon icon-list"></i> FAQs</a></li>
        <li><a href="users.html"><i class="icon icon-file"></i> User Guide</a></li>
      </ul>
    </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
  </div>
  
  
  @yield('content')
  
  

</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; Jayson Group. <i>Developed By </i> <a href="#">Jayson Group IT</a> </div>
</div>
<script src="{{asset('public/js/excanvas.min.js')"></script> 
<script src="{{asset('public/js/jquery.min.js')"></script> 
<script src="{{asset('public/js/jquery.ui.custom.js')"></script> 
<script src="{{asset('public/js/bootstrap.min.js')"></script> 
<script src="{{asset('public/js/jquery.flot.min.js')"></script> 
<script src="{{asset('public/js/jquery.flot.resize.min.js')"></script> 
<script src="{{asset('public/js/jquery.peity.min.js')"></script> 
<script src="{{asset('public/js/fullcalendar.min.js')"></script> 
<script src="{{asset('public/js/jquery.uniform.js')"></script> 
<script src="{{asset('public/js/select2.min.js')"></script> 
<script src="{{asset('public/js/jquery.dataTables.min.js')"></script> 
<script src="{{asset('public/js/maruti.js')"></script> 
<script src="{{asset('public/js/maruti.tables.js')"></script> 
<script src="{{asset('public/js/maruti.dashboard.js')"></script> 



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

