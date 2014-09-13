@include('client.common.head')

<span id="top-anchor"></span>
<div id="headerMain" class="hidden-sm hidden-xs">
	<div class="navRow1">
		<div class="container">
			<div class="col-md-3">
				<div class="navSocial">
                                    <a href="https://www.facebook.com/kdcresource" target="_blank">
                                        <img src="http://www.kdcplc.co.uk/img/icon-header-facebook.png" alt="facebook icon">
                                    </a>
                                    
                                    <a href="https://twitter.com/kdcresource" target="_blank">
                                        <img src="http://www.kdcplc.co.uk/img/icon-header-twitter.png" alt="facebook icon">
                                    </a>
    
                                    <a href="http://www.linkedin.com/company/kdc-resource" target="_blank">
                                        <img src="http://www.kdcplc.co.uk/img/icon-header-linkedin.png" alt="facebook icon">
                                    </a>
				</div>
			</div>
			<div class="col-md-6 mainLinks">
				<ul>
					<li>
						<a href="http://www.kdcplc.co.uk/client/about">
							ABOUT
							<span class="rollover"></span>
						</a>
					</li>
					<li>
						<a href="http://www.kdcplc.co.uk/client/news">
							NEWS
							<span class="rollover"></span>
						</a>
					</li>
					<li>
						<a href="http://www.kdcplc.co.uk/client/sectors">
							SECTORS
							<span class="rollover"></span>
						</a>
					</li>
					<li>
						<a href="http://www.kdcplc.co.uk/client/contact-us">
							CONTACT US
							<span class="rollover"></span>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 candidateLink2">
				<a href="http://www.kdcplc.co.uk/">
					CANDIDATE
				</a>
			</div>
		</div>
	</div>
	<div class="navRow2">
		<div class="container">
			<div class="col-md-4 loginContainer">
				<a href="#" class="login-toggle">LOG IN</a>
				<a href="http://www.kdcplc.co.uk/client/become-a-client">BECOME A CLIENT</a>
			</div>
			<div class="col-md-4 logoContainer">
				<a href="http://www.kdcplc.co.uk/client">
					<img src="http://www.kdcplc.co.uk/img/client/logo-kdc.png" alt="KDC Logo">
				</a>
			</div>
			<div class="col-md-4 contactContainer">
				<p>+44 (0) 1202 596 092</p>
				<p><a href="mailto:solutions@kdcresource.com">SOLUTIONS@KDCRESOURCE.COM</a></p>
                                
			</div>
		</div>
	</div>
	<div id="header-login">
		<form id="login-form">
			<label>Email</label> <input type="email" />
			<label>Password</label> <input type="password" />
			<input type="submit" value="Log in" />
			<a href="#">Need a<br/>reminder?</a>
		</form>
	</div>
</div>
<div class="headerMainMargin hidden-sm hidden-xs"></div>
<!-- new CLIENT burger -->

<div id="burgerNav" class="visible-xs visible-sm">
    <div class="container">
        <a href="#" class="burger">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a href="http://www.kdcplc.co.uk/client" class="logo">
            <img src="http://www.kdcplc.co.uk/img/logo-kdc-main.png" alt="KDC Logo">
        </a>
        <a href="http://www.kdcplc.co.uk/" class="clientLink">CANDIDATE <span class="caret right"></span></a>
    </div>
    <ul class="ddl">
        <li>
            <a href="tel:+44 (0) 1202 596 092">+44 (0) 1202 596 092</a>
        </li>
        <li>
            <a href="mailto:solutions@kdcresource.com">SOLUTIONS@KDCRESOURCE.COM</a>
        </li>
        <li>
            <a href="#" class="burgerLogin">LOGIN</a>
            <div class="container">
                <ul class="login">
                    <li>
                        <form id="client-login-form-burger" action="client/login" method="post">
                            <label>Email</label>
                            <input type="email" name="email" />
                            <label>Password</label>
                            <input type="password" name="password" />
                            <input type="submit" value="Log in" />
                            <a href="#">Need a reminder?</a>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="client/become-a-client">REGISTER</a>
        </li>
        <li>
            <a href="client/about">ABOUT</a>
        </li>
        <li>
            <a href="client/sectors">SECTORS</a>
        </li>
        <li class="burgerSocial">
            <a href="https://www.facebook.com/kdcresource" target="_blank">
                <img src="http://www.kdcplc.co.uk/img/icon-header-facebook.png" alt="facebook icon">
            </a>
            
            <a href="https://twitter.com/kdcresource" target="_blank">
                <img src="http://www.kdcplc.co.uk/img/icon-header-twitter.png" alt="facebook icon">
            </a>

            <a href="http://www.linkedin.com/company/kdc-resource" target="_blank">
                <img src="http://www.kdcplc.co.uk/img/icon-header-linkedin.png" alt="facebook icon">
            </a>
	    
	    <button class="purechat-button-expand" style="visibility: hidden;">
		<img src="http://www.kdcplc.co.uk/img/icon-live-chat.png">
	    </button>
        </li>
    </ul>
</div>
<div id="burgerMargin" class="visible-xs visible-sm"></div>


<!-- old nav -->
<!--<header id="masthead" class="hidden">

	<div class="container">
    
    	<div class="row">
        
        	<div id="branding" class="col-md-12">
            
            	<a href="{{ url('client') }}"><img src="{{ URL::asset('/img/client/logo-kdc.png') }}" alt="KDC Logo"></a>
                       
            </div>
            <!--/#branding
            
            <div id="responsive-nav-container">
            
                <nav id="user-login" class="col-md-4">
                
                    <ul>
                        <li id="branding-sml"><a href="/"><img src="{{ URL::asset('/img/client/logo-kdc-sml.png') }}" alt="KDC Logo"></a></li>
                        <li><a class="login-toggle" href="#"><strong>Log in</strong></a></li>
                        <li><a href="{{ url('client/become-a-client') }}">Become a client</a></li>
                    
                    </ul>            
                
                </nav>
                <!--/#user-login
                
                <nav id="mastnav" class="col-md-4">
                
                    <ul>
                    
                        <li><a href="{{ url('client/about') }}">About</a></li>
                        <li><a href="{{ url('client/news') }}">News</a></li>
                        <li><a href="{{ url('client/sectors') }}">Sectors</a></li>
                        <li><a href="{{ url('client/contact-us') }}">Contact Us</a></li>
                    
                    </ul>            
                
                </nav>
                <!--/#mastnav
                
                <nav id="social" class="col-md-4">
                
                    <ul>
                    
                        <li class="email"><a href="mailto:solutions@kdcresource.com"></a></li>
                        <li class="phone">
                            <span>
                                <div class="inner">+44 (0) 1202 596 092</div>
                                <img src="{{ URL::asset('/img/client/icon-phone.png') }}" />
                            </span>
                        </li>
                        <li class="social">
                            
                            <span>
                                
                                    <img src="{{ URL::asset('/img/client/icon-social.png') }}" class="open" />
                                    
                                    <a target="_blank" href="https://www.facebook.com/kdcresource">
                                        <img src="{{ URL::asset('/img/client/icon-header-facebook.png') }}" alt="facebook icon" />
                                    </a>
                                    
                                    <a target="_blank" href="https://twitter.com/kdcresource">
                                        <img src="{{ URL::asset('/img/client/icon-header-twitter.png') }}" alt="facebook icon" />
                                    </a>
    
                                    <a target="_blank" href="http://www.linkedin.com/company/kdc-resource">
                                        <img src="{{ URL::asset('/img/client/icon-header-linkedin.png') }}" alt="facebook icon" />
                                    </a>
                            </span>	
                        </li>
                        <li class="candidate"><a href="{{ url('/') }}">Candidate</a></li>
                    
                    </ul>
                
                </nav>
                <!--/#social
                
            </div>
            <!--/#responsive-nav-container
        
		
        </div>
        <!--/#masthead .container .row
    
    </div>
    <!--/#masthead .containe
    
    <div id="header-login">

        <form id="login-form">
        
            <label>Email</label> <input type="email" /> <label>Password</label> <input type="password" /> <input type="submit" value="Log in" /> <a href="#">Need a<br/>reminder?</a>
        
        </form>
    
    </div>
    <!--/#header-login

</header>-->
<!--/#masthead-->

<main id="mainstage">
	<div class="feedbackPop"><div class="close">X</div><div class="info">{{ Session::get('info') }}</div></div>
