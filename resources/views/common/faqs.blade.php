@extends('layouts.app')


@section('content')

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


     <div class="row-fluid">
      <div class="span12">
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse" class="collapsed"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>What is ITAM?</h5>
                </a> </div>
            </div>
            <div class="accordion-body collapse" id="collapseGOne" style="height: 0px;">
              <div class="widget-content"> 
              IT Asset Management (ITAM) is “a set of business practices that incorporates IT assets across the business units within the organization. It joins the financial, inventory, contractual and risk management responsibilities to manage the overall life cycle of these assets including tactical and strategic decision making”. Assets include all elements of software and hardware that are found in the business environment.
               </div>
            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse" class="collapsed"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Why is Asset Management Important for IT?</h5>
                </a> </div>
            </div>
            <div class="accordion-body collapse" id="collapseGTwo" style="height: 0px;">
              <div class="widget-content">
            
              IT organizations manage a large proportion of the company’s total asset footprint. IT assets are both costly to acquire and to maintain. As a result, asset management plays a critical role in helping IT teams to ensure efficient use of the organizations resources in supporting the needs of users and business functions.<br/><br/>

Gartner defines IT Asset Management (ITAM) as: “providing an accurate account of technology asset lifecycle costs and risks to maximize the business value of technology strategy, architecture, funding, contractual and sourcing decisions.” This definition highlights that IT Asset Management isn’t just about inventorying assets, it about using the information that is captured to drive decisions. Increasingly, IT organizations are focusing on the usability and informational value of IT asset data to drive business value instead of just focusing on data quantity and accuracy.
<br/><br/>
<strong>Here are some of the key goals of asset management in IT:</strong> <br/>
1. Enforce compliance with corporate security policies and regulatory requirements <br/>
2. Improve productivity by deploying the technology to support user and business needs <br/>
3. Reduce licensing and support costs by eliminating or reallocating underutilized resources and licenses <br/>
4. Limit overhead costs of managing the IT environment

            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>What are the types of Asset Management?</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGThree">
              <div class="widget-content">
              <strong> 7 Types of Asset Management</strong><br/><br/>
              1. Financial Asset Management <br/>
2. Enterprise Asset Management<br/>
3. Infrastructure Asset Management<br/>
4. Public Asset Management<br/>
5. IT Asset Management<br/>
6. Fixed Assets Management<br/>
7. Digital Asset Management.

              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>











</div>
 
    

@endsection