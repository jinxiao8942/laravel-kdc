@include('client.common.header')


<section id="contact-us-home-slide" class="pane clientContact">

	<div class="inner">
    
        <h1 class="center">
            <span>Contact</span> Us<br /><br />
	    Call us now: +44 (0) 1202 596 092
        </h1>
        
        {{ Form::open(['role' => 'form']) }}
        
        	<fieldset>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Full Name *" required name="fullName">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Company *" required name="company">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Contact Number" name="contactNumber">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Email Address *" required name="email">
                    </div>
                </div>
                
                <textarea class="form-control" placeholder="Message *" required name="messageContent"></textarea>
		<div class="humanConfirmation white">
                            <p>Please confirm you are not a robot...</p>
                                <div class="fakeInput1"></div>
                                <span>+</span>
                                <div class="fakeInput2"></div>
                                <span>=</span>
                                <input type="text" class="input3" required>
                                <div class="clearfix"></div>
                        </div>
                
                <div class="submit-container">
					<input type="submit" value="send" class="blueText">
				</div>
			</fieldset>
		
    	</form>
    </div>
    <!--/.inner-->
    
    <div id="contact-details">
        
        	<div id="bournemouth-contact">
            
            	<div class="logo">
                
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
            
            	<div class="logo">
                
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
    
</section>
<!--/#contact-us-home-slide-->



@include('client.common.footer')
