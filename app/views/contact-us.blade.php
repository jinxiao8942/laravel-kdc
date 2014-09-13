@extends('homepage.master')

@section('content')
<!-- @include('homepage.search') -->
<div class="purpleBar">
    
</div>
<section id="contact-us-home-slide" class="pane">
	
    <h1 class="slide-title">
    	<span>
        	Contact Us
    	</span>
    </h1>

	<div class="inner" data-stellar-background-ratio="0.5">
    
    	<h2>Have a query? Get in touch</h2>

        {{ Form::open(['role' => 'form']) }}
        
        	<fieldset>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Full Name *" required name="name">
                    </div>
		    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Email Address *" required name="email">
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Contact Number" name="phone">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Company" name="company">
                    </div>
                </div>
                
                <textarea class="form-control" placeholder="Message *" required name="contact_message"></textarea>
		
		<div class="humanConfirmation">
                            <p>Please confirm you are not a robot...</p>
                                <div class="fakeInput1"></div>
                                <span>+</span>
                                <div class="fakeInput2"></div>
                                <span>=</span>
                                <input type="text" class="input3" required>
                                <div class="clearfix"></div>
                        </div>
                
                <div class="submit-container">
					<input type="submit" value="send">
				</div>
			</fieldset>
		
		
    	</form>
        
        <div id="contact-details">
        
        	<div id="bournemouth-contact">
            
            	<div class="logo hidden-xs">
                
                	<img src="{{ URL::asset('/img/logo-kdc-sml.png')}}" alt="KDC Logo - Small" />
                
                </div>
                <!--/.logo-->
                
                <div class="info">
                
                	<p>Building 307, Aviation Park West, Bournemouth Airport,<br/>
			    Dorset <strong>BH23 6NW</strong> United Kingdom
			    <a class="bournemouthMap" href="#mapAnchor">View business hours and map</a></p>
                
                </div>
                <!--/.info-->
                
            </div>
            <!--/#bournemouth-contact-->
            
            <div id="bristol-contact">
            
            	<div class="logo hidden-xs">
                
                	<img src="{{ URL::asset('/img/logo-kdc-sml.png')}}" alt="KDC Logo - Small" />
                
                </div>
                <!--/.logo-->
                
                <div class="info">
                	<p>12 Beaufort Office Park, Woodlands, Almondsbury,<br/>
			Bristol <strong>BS32 4NE</strong> United Kingdom
			<a class="bristolMap" href="#mapAnchor">View business hours and map</a></p>
                
                </div>
                <!--/.info-->
            
            </div>
            <!--/#bristol-contact-->
        
        </div>
        <!-- /#contact-details-->
        <div id="mapAnchor"></div>
	<div id="bournemouthInfo">
        <div id="opening-hours">
        
        	<h3><span>Bournemouth</span> Business Hours</h3>
            
            <div class="row">
            
            	<div class="col-md-6">
                
                	Monday - Thursday
                    
                    <span>08:30 - 17:30</span>
                
                </div>
                
                <div class="col-md-6">
                
                	Friday
                    
                    <span>08:30 - 16:00</span>
                
                </div>
            
            </div>
        
        
        </div>
        <!--/#opening-hours-->
	<!-- google map -->
	<div id="map"></div>
	<div class="mapShadow"></div>
	</div>
	
	<div id="bristolInfo">
	<div id="opening-hours">
        
        	<h3><span>Bristol</span> Business Hours</h3>
            
            <div class="row">
            
            	<div class="col-md-6">
                
                	Monday - Thursday
                    
                    <span>08:30 - 17:30</span>
                
                </div>
                
		
                <div class="col-md-6">
                
                	Friday
                    
                    <span>08:30 - 16:00</span>
                
                </div>
            
            </div>
        
        
        </div>
        <!--/#opening-hours-->
	<!-- google map -->
	<div id="map2"></div>
	<div class="mapShadow"></div>
	</div>
	
    </div>
    <!--/.inner-->
    
<!--    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
    <!--<script type="text/javascript" src="{{ URL::asset('/js/gmaps.js') }}"></script>-->
</section>
<!--/#contact-us-home-slide-->

@stop
