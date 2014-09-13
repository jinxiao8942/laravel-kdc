@include('client.common.header')
<div class="darkBg">
<section id="home-slide" class="pane">

	<div class="inner" data-stellar-background-ratio="0.5">
    
        <h1 class="center">
		<p><img src="http://www.kdcplc.co.uk/img/logo-kdc-home-slide.png" alt="KDC Logo Big"></p>
            <span>A unique service experience</span><br/>
            unparalleled support<br/>
            <span>the very best candidates</span>
        </h1>
        
        <a href="#client-anchor">
        
            See what makes<br/>
            <span>us unique</span><br/>
            <img src="{{ URL::asset('/img/client/icon-arrow-down.png') }}" alt="down arrow icon">
        
        </a>
    
    </div>
    <!--/.inner-->
    
    
    
</section>
<!--/#home-slide-->

<section id="client-portal-slide" class="pane parralax">
	
    <div id="client-anchor"></div>
    <div class="inner" data-stellar-ratio="1.5">	
        
        <h2><span>Client Portal</span></h2>
        
        
        <div class="more-details">
        
            <p class="intro">Manage your <strong>whole</strong> recruitment process</p>
            <p class="details">Includes applicant tracking for all clients which ensures enhanced visibility,<br /> traceability and real time data/metrics</p>
            
            <a href="#">want to know more?</a>
		
        </div>
        <!--/.more-details-->
        <a href="#manage-slide" class="next-slide">    
		
            <img src="{{ URL::asset('/img/client/icon-arrow-down-blue.png') }}" alt="down arrow icon">
        
        </a>
    
    </div>
    
</section>
<!--/#client-portal-slide-->

<section id="manage-slide" class="pane" data-stellar-background-ratio="0.5">

	<div class="inner">
    
        <h2><span>Manage</span></h2>
        
        <div id="manage-carousel" class="carousel slide">
           
            <ol class="carousel-indicators hidden">
                <li data-target="#manage-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#manage-carousel" data-slide-to="1"></li>
    
            </ol>
            <!--./carousel-indicators-->
    
            <div class="carousel-inner">
            
                <div class="active item">
                
                    <h3>Manage Applications</h3>
                    
                    <p>Check the status of your vacancies and instantly see what applications have been received and review potential CVs. It puts you in control and keeps you constantly up to date.</p>
                    
                </div>
                <!--./item-->
                
                <div class="item">
                
                    <h3>Vacancies</h3>
                    
                    <p>Tincidunt vulputate amet fusce accumsan purus Scelerisque magna elit fusce sodales inceptos sodales volutpat. Lacus posuere facilisi fusce ad vitae Integer scelerisque facilisis. Nisl curabitur sociosqu dignissim. Nec. Mollis enim posuere hendrerit lacus leo a torquent vel. Dapibus in turpis tristique aliquam fames. Mauris, class. Ligula malesuada nec parturient es</p>
                </div>
                <!--./item-->
                
            </div>
            <!--./carousel-inner-->
            
        </div>
        <!--./manage-carousel-->
    
    </div>
    <!--./inner-->
 
</section>
<!--/#manage-slide-->

<section id="weekly-reports-slide" class="pane parralax">
	
	
	<div class="inner" data-stellar-ratio="1.5">
    	<h2><span>Weekly Status Reports</span></h2>
        
        <div class="more-details">
        
            <p class="intro">Reports on all your vacancies</p>
            <p class="details">Weekly report to show you the status of your vacancies, allowing you<br /> to stay informed at all times.</p>
            <a href="#">want to know more?</a>
		
        </div>
        <!--/.more-details-->
        <a href="#candidate-anchor" class="next-slide">    
		
            <img src="{{ URL::asset('/img/client/icon-arrow-down.png') }}" alt="down arrow icon">
        
        </a>
    </div>
    
</section>
<!--/#weekly-reports-slide-->

<section id="best-candidates-slide" class="pane parralax">

	<div id="candidate-anchor"></div>
	<div class="inner" data-stellar-ratio="1.5">
    
        <h2><span>The Best Candidates</span></h2>
        
        <p>We filter our candidates so you know you have<br/><strong>the best for your position</strong></p>
        
        <a href="#compliance-anchor">
            <img src="{{ URL::asset('/img/client/icon-arrow-down-blue.png') }}" alt="arrow icon">
        </a>
    
    </div>

</section>
<!--/#best-candidates-slide-->

<section id="compliance-slide" class="pane parralax">
	
	<div id="compliance-anchor"></div>
    <div class="inner" data-stellar-ratio="1.5">
        
        <h2><span>Full Compliance</span></h2>
        
        <p>Only supplying <strong>Opted Out</strong> consultancy staff, <br/>therefore reducing IR35 risk</p>
        
        <a href="#cost-anchor">
            <img src="{{ URL::asset('/img/client/icon-arrow-down-blue.png') }}" alt="arrow icon">
        </a>
        
    </div>

</section>
<!--/#compliance-slide-->

<section id="cost-slide" class="pane parralax">

    <div id="cost-anchor"></div>
    <div class="inner" data-stellar-ratio="1.5">

        <h2><span>Cost</span></h2>
        
        <div class="more-details">
        
            <p class="intro"><strong>Complete</strong> knowledge of market control rates</p>
            <p class="details">RPO light solution, applicant tracking for all clients which ensures enhanced visibility,<br/>
            traceability &amp; real time data/metrics</p>
            
            <a href="#">want to know more?</a>
		
        </div>
        <!--/.more-details-->
        <a href="#contact-slide" class="next-slide">    
		
            <img src="{{ URL::asset('/img/client/icon-arrow-down-blue.png') }}" alt="down arrow icon">
        
        </a>
    
    </div>
    
</section>
<!--/#cost-slide-->

<section id="contact-slide" class="pane" data-stellar-background-ratio="0.5">

	<h2><span>Get in touch</span></h2>
    
    <h3>Have some questions?<br/>Why not <strong>Drop us a line?</strong></h3>
     <p id="footer-phone2" class="visible-xs"><span>+44(0)845 200 4972</span></p>
    
    <ul class="hidden-xs">
    
    	<li><a href="client/contact-us"><img src="{{ URL::asset('/img/client/icon-chat.png') }}" alt="chat icon"></a></li>
        <li><a href="mailto:solutions@kdcresource.com"><img src="{{ URL::asset('/img/client/icon-email-alt.png') }}" alt="email icon"></a></li>
        <li><a id="footer-phone-toggle" href="#"><img src="{{ URL::asset('/img/client/icon-phone-alt.png') }}" alt="phone icon"></a></li>
        <li><a href="https://www.facebook.com/kdcresource"><img src="{{ URL::asset('/img/client/icon-facebook.png') }}" alt="facebook icon"></a></li>
        <li><a href="https://twitter.com/kdcresource"><img src="{{ URL::asset('/img/client/icon-twitter.png') }}" alt="twitter icon"></a></li>
        <li><a href="http://www.linkedin.com/company/kdc-resource"><img src="{{ URL::asset('/img/client/icon-linked-in.png') }}" alt="linked in icon"></a></li>
        
	</ul>
    
    <p id="footer-phone"><span>+44(0)845 200 4972</span></p>

</section>
<!--/#contact-slide-->

</div>

@include('client.common.footer')
