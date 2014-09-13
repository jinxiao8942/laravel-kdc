@include('client.common.header')

<div class="darkBg">
	<div class="hidden">
<section id="client-home-slide" class="pane">

	<div class="inner" data-stellar-background-ratio="0.5">
    
        <h1><span><strong>Become a</strong> client</span></h1>
        
        <p>
        	A LINE DESCRIBING HOW GREAT AND<br/>
        	BENEFICIAL IT IS TO BE A KDC Client!<br/>
            A LINE DESCRIBING HOW GREAT AND
		</p>
        
        <a href="#client-benefits-slide">

            <img src="{{ URL::asset('/img/client/icon-arrow-down.png') }}" alt="down arrow icon">
        
        </a>
    
    </div>
    <!--/.inner-->
    
</section>
<!--/#clients-home-slide-->

<section id="client-benefits-slide" class="pane">

	<div class="inner" data-stellar-background-ratio="0.5">
    
    	<h2>Benefits of becoming a KDC Client</h2>
        
        <div id="client-benefits-slide-carousel" class="carousel slide">
           
            <ol class="carousel-indicators">
                <li data-target="#accreditations-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#accreditations-carousel" data-slide-to="1"></li>
    
            </ol>
            <!--./carousel-indicators-->
    
            <div class="carousel-inner">
            
                <div class="active item">
                
                    <h3>Client Portal</h3>
                    
                    <p>Tincidunt vulputate amet fusce accumsan purus Scelerisque magna elit fusce sodales inceptos sodales volutpat. Lacus posuere facilisi fusce ad vitae Integer scelerisque facilisis. Nisl curabitur sociosqu dignissim. Nec. Mollis enim posuere hendrerit lacus leo a torquent vel. Dapibus in turpis tristique aliquam fames. Mauris, class. Ligula malesuada nec parturient es</p>
                    
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
        <!--./client-benefits-slide-carousel-->
    
    </div>
    <!--./inner-->
 
</section>
<!--/#client-benefits-slide-slide-->
</div>
<section id="client-application-slide" class="pane">

	<div class="inner">
    
		<h2><span><strong>Client</strong> Application Form<br /><br />
			<strong>Please call +44 (0) 1202 596 092<br /> or fill in this form below and we'll come<br /> back to you as soon as possible</strong></span>
		</h2>
		
		<p class="formIntro">A KDC client is guaranteed to be<br /> part of a very special service experience.<br /><br />Please fill out the form below and one of our<br /> associates will be in contact shortly</p>
        
        {{ Form::open(['role' => 'form']) }}
        
        	<fieldset>
            	<h3>Personal</h3>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Forename *" required="required" name="forename">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Surname *" required="required" name="surname">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Contact Number" name="phone">
                    </div>
                    <div class="col-xs-6">
                        <input type="email" class="form-control" placeholder="Email Address *" required="required" name="email">
                    </div>
                </div>
                
                <!-- <div class="row password-row">
                    <div class="col-xs-6">
                        <input type="password" class="form-control" placeholder="Password *" required="required">
                    </div>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" placeholder="Confirm Password *" required="required">
                    </div>
                </div> -->
            </fieldset>
            
            <fieldset>
            	<h3>Your Company</h3>

				<input type="text" class="form-control" placeholder="Company Name *" required="required" name="company_name">
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Company Address 1" name="address1">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Company Address 2" name="address2">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Town / City" name="town">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="County" name="county">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Postcode" name="postcode">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Country" name="country">
                    </div>
                </div>
				<div class="humanConfirmation">
		    <p>Please confirm you are not a robot...</p>
			<div class="fakeInput1"></div>
			<span>+</span>
			<div class="fakeInput2"></div>
			<span>=</span>
			<input type="text" class="input3" required>
			<div class="clearfix"></div>
		</div>
                
            </fieldset>
            
            <div class="submit-container">
				<input type="submit" value="submit">
			</div>
            
		</form>

        
    </div>
    <!--/.inner-->
    
</section>
<!--/#company-slide-->

</div> <!-- end darkbg -->

@include('client.common.footer')
