
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
                                    <span class="icon"><i class="icon-repeat"></i></span>
                                    <h5>Software Notifications</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <ul class="activity-list">
                                        <li><a href="#">
                                            <i class="icon-user"></i>
                                            <strong>Themeforest</strong>Approved My college theme <strong>1 user</strong> <span>2 hours ago</span>
                                        </a></li>
                                        <li><a href="#">
                                            <i class="icon-file"></i>
                                            <strong>My College is PSD Template </strong> Theme <strong>Psd Theme</strong> <span>2months ago</span>
                                        </a></li>
                                        <li><a href="#">
                                            <i class="icon-envelope"></i>
                                            <strong>Lorem ipsum doler set</strong> adag<strong>agg</strong> <span>2 days ago</span>
                                        </a></li>
                                        <li><a href="#">
                                            <i class="icon-picture"></i>
                                            <strong>ITs my First Admin</strong> so very<strong>exited</strong> <span>2 days ago</span>
                                        </a></li>
                                        <li><a href="#">
                                            <i class="icon-user"></i>
                                            <strong>Admin</strong> bans <strong>3 users</strong> <span>week ago</span>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>







    

      
</div>
    
@endsection