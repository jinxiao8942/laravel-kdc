<span id="top-anchor"></span>

<div id="burgerNav" class="visible-xs visible-sm">
    <div class="container">
        <a href="#" class="burger">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a href="http://www.kdcplc.co.uk" class="logo">
            <img src="http://www.kdcplc.co.uk/img/logo-kdc-main.png" alt="KDC Logo">
        </a>
        <a href="http://www.kdcplc.co.uk/client" class="clientLink">CLIENT <span class="caret right"></span></a>
    </div>
    <ul class="ddl">
        <li>
            <a href="tel:+44 (0) 1202 596 092">+44 (0) 1202 596 092</a>
        </li>
        <li>
            <a href="mailto:candidates@kdcresource.com">CANDIDATES@KDCRESOURCE.COM</a>
        </li>
        <li>
            <a href="#" class="burgerLogin">LOGIN</a>
            <div class="container">
                <ul class="login">
                    <li>
                        <form id="login-form-burger" action="candidate/login" method="post">
                            <label>Email</label>
                            <input type="email" name="email" />
                            <label>Password</label>
                            <input type="password" name="password" />
                            <input type="submit" value="Log in" />
                            <a href="{{ URL::to('candidate/forgot') }}">Need a reminder?</a>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="become-a-candidate">REGISTER</a>
        </li>
        <li>
            <a href="jobs">JOB SEARCH</a>
        </li>
        <li>
            <a href="career-resources">CAREER RESOURCES</a>
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
<header id="masthead" class="visible-md visible-lg">

    <div id="header-top">

        <div class="container">
        
            <div class="row">
            
                <nav id="user-login" class="col-sm-4">
                    @if(!is_null(Session::get('candidate')))
                    
                        <ul>
                            <li><a href="{{ URL::to('candidate') }}">Candidate</a></li>
                            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                        </ul>
                    
                    @else
                    
                        <ul>
                            <!--<li class="cv-tips-link"><a href="{{ URL::to('cv-tips') }}">CV &amp; Tips</a></li>-->
                             <li class="login-link"><a class="login-toggle" href="#">Log in</a></li>
                            <li class="register-link"><a href="{{ url('/become-a-candidate') }}">Register</a></li>                  
                        </ul> 
                    @endif
                    
                
                </nav>
                <!--/#nav-spacer-->
                
                <nav id="mastnav" class="col-sm-4">
                
                    <ul>
                    
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/news') }}">News</a></li>
                        <li><a class="sector-toggle" href="#">Sectors</a></li> 
                                        
                    </ul>            
                
                </nav>
                <!--/#mastnav-->
                
                <nav id="user-tools" class="col-sm-4">
                
                    <ul>
    
                        <li class="social">
                            
                            <span>
                                    
                                    <a href="https://www.facebook.com/kdcresource" target="_blank">
                                        <img src="{{ URL::asset('/img/icon-header-facebook.png') }}" alt="facebook icon" />
                                    </a>
                                    
                                    <a href="https://twitter.com/kdcresource" target="_blank">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="facebook icon" />
                                    </a>
    
                                    <a href="http://www.linkedin.com/company/kdc-resource" target="_blank">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="facebook icon" />
                                    </a>
                            </span>
                        </li>
                        <li class="candidate"><a href="{{ url('client') }}">Client</a></li>
                    
                    </ul>
                
                </nav>
                <!--/#user-tools-->
                
            </div>
            <!--/#header-top .container .row-->
            
        </div>
        <!--/#header-top .container -->
    
    </div>
    <!--/#header-top-->
    
    <div id="header-login">
        <form id="login-form" action="candidate/login" method="post">
            <label>Email</label> <input type="email" name="email" /> <label>Password</label> <input type="password" name="password" /> <input type="submit" value="Log in" /> <a href="{{ URL::to('candidate/forgot') }}">Need a<br/>reminder?</a>
        </form>
    
    </div>
    <!--/#header-login-->
    
    <div id="sectors-dropdown">
    
        <ul>
        
            <li>
                <a href="{{ url('jobs?sector%5B%5D=55') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-aerospace.png') }}" alt="aerospace icon" />
                    <span>Aerospace</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=56') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-automotive.png') }}" alt="automotive icon" />
                    <span>Automotive</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=57') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-defense.png') }}" alt="defense icon" />
                    <span>Defence</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=58') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-marine.png') }}" alt="marine icon" />
                    <span>Marine</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=51') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-oil-gas.png') }}" alt="oil and gas icon" />
                    <span>Oil &amp; Gas</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=53') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-space.png') }}" alt="space icon" />
                    <span>Space</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=61') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-power.png') }}" alt="power icon" />
                    <span>Power</span>
                </a>
            </li>
            
            <li>
                <a href="{{ url('jobs?sector%5B%5D=54') }}">
                    <img src="{{ URL::asset('/img/icon-header-sector-it.png') }}" alt="it icon" />
                    <span>IT</span>
                </a>
            </li>
        
        
        </ul>
    
    </div>
    <!--/#sectors-dropdown-->
    
    <div id="header-main">
        
        <div class="container">
          
            <div class="row">
            
                <div id="branding" class="col-sm-3">
                
                    <a href="{{ url('/') }}"><img src="{{ URL::asset('/img/logo-kdc-main.png') }}" alt="KDC Logo" /></a>
                           
                </div>
                <!--/#branding-->
            
                <nav id="subnav" class="col-sm-6">
                
                    <ul>
                        <li>
                            <a href="{{ url('/career-resources') }}">
                                <img src="{{ URL::asset('/img/icon-header-candidates.png') }}" alt="candidates icon" />
                                <span>Career<br /> Resources</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ url('/jobs') }}">
                                <img src="{{ URL::asset('/img/icon-header-jobs.png') }}" alt="jobs icon" />
                                <span>Job<br /> Search</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ url('/contact-us') }}">
                                <img src="{{ URL::asset('/img/icon-header-contact.png') }}" alt="contact icon" />
                                <span>Contact<br /> Us</span>
                            </a>
                        </li>
                        
                        
                         <li class="scroll-search">
                            <a href="#">
   
                                <img src="{{ URL::asset('/img/icon-header-search.png') }}" alt="search icon" />
                                                        
                            </a>
                            
                        </li>  
                    </ul>            
                
                </nav>
                <!--/#user-login-->
                
                <div id="header-contact" class="col-sm-3">
                
                    <span class="phone"><strong>+44 (0) 1202 569 092</strong></span>
                    <span class="email"><a href="mailto:candidates@kdcresource.com"><strong>candidates@kdcresource.com</strong></a></span>
                    <button class='purechat-button-expand' style="visibility: hidden;"><a><strong>Live Chat</strong></a><img src="{{ URL::asset('/img/icon-live-chat.png') }}" /></button>
                </div>
                    
                <form id="header-search" method="get" action="jobs">
                    <fieldset>
                        <input type="text" placeholder="Keyword" name="keyword" />
                    </fieldset>
                </form>
        </div>
        <!--/#header-main .container-->
    
    </div>
    <!--/#header-main-->
    
</header>
<!--/#masthead-->

<main id="mainstage">
    <div class="feedbackPop"><div class="close">X</div><div class="info">{{ Session::get('info') }}</div></div>
    
	@if($errors->has())
		@foreach ($errors->all() as $error)
		<div class="feedbackPop"><div class="close">X</div><div class="info">{{ $error }}</div></div>
		@endforeach
	@endif
