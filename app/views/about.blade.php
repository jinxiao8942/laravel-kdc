@extends('homepage.master')


@section('content')

<section id="about-company-slide" class="about-slide pane">

    <h1 class="slide-title">
        <span>
            The Company
        </span>
    </h1>

    <div class="inner">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3 hidden-sm">
                
                    <div class="inner">
                        
                        <ul>
                            
                            <li><a href="#about-company-slide">The Company</a></li>
                            <li><a href="#about-history-slide">History</a></li>
                            <li><a href="#about-clients-slide">Clients</a></li>
                            <li><a href="#about-accredidations-slide">Accreditations</a></li>
                            <li><a href="#about-career-opportunities-slide">Career<br /> Opportunities</a></li>
                            
                        </ul>
                            
                        <p class="hidden"><a href="#">KDC Brochure</a></p>
                        <p class="hidden"><a href="#">Values &amp; Principles</a></p>
                    
                    </div>
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div id="first-pane-content" class="slide-pane-content col-md-9">
                
                    <h1>{{ $content->intro }}</h1>
                    <p>{{ $content->body }}</p>
            
            
                </div>
                <!--/.slide-pane-content-->    
            </div>
            <!--/.row-->
            
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-company-slide-->


<section id="about-testimonial-1-slide" class="about-slide testimonial-slide pane">

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <blockquote>{{$testimonials[0]->body}} 
                        <span>{{$testimonials[0]->title}} {{$testimonials[0]->intro}} </span>
                    </blockquote>
                    
                </div>
                <!--/.slide-pane-content-->    
            </div>
            <!--/.row-->
            
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-testimonial-1-slide-->

<section id="about-history-slide" class="about-slide pane">

    <h1 class="slide-title">
        <span>
            History
        </span>
    </h1>

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <h1>{{ $history->intro }}</h1>
                    <p>{{ $history->body }}</p>
            
            
                </div>
                <!--/.slide-pane-content-->    
            </div>
            <!--/.row-->
            
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-history-slide-->

<section id="about-clients-slide" class="about-slide pane">

    <h1 class="slide-title">
        <span>
            Clients
        </span>
    </h1>

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                    <div id="clients-container">
                    
                    	<div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-cobham.png" alt="cobham logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-bae.png" alt="bae logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-airbus.png" alt="airbus logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-quinetiq.png" alt="qintetiq logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-boeing.png" alt="boeing logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-alcoa.png" alt="alcoa logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-atl.png" alt="atl logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-ckn.png" alt="ckn logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-esterline.png" alt="esterline logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-beagle.png" alt="beagle logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-costain.png" alt="costain logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-britten-norman.png" alt="britten norman logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-eaton.png" alt="eaton logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-dek.png" alt="dek logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-astrium.png" alt="astrium logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-finmeccanica.png" alt="finmeccanica logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-qioptiq.png" alt="qioptiq logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-eads.png" alt="eads logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-tods.png" alt="tods logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-magna.png" alt="magna logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-stirling.png" alt="stirling logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-chemring.png" alt="cheming logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-ford.png" alt="ford logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-caterpillar.png" alt="caterpilla logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-honda.png" alt="honda logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-aeroform.png" alt="aeroform logo" /></div>
                            <div class="client col-sm-2"><img src="img/logo-client-seab.png" alt="seab logo" /></div>
                        
                        </div>
                        
                        <div class="row">
            	
                            <div class="client col-sm-4"><img src="img/logo-client-paradigm.png" alt="paradigm logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-msi.png" alt="msi logo" /></div>
                            <div class="client col-sm-4"><img src="img/logo-client-meggitt.png" alt="meggitt logo" /></div>
                        
                        </div>
                                
                    
                    </div>
                </div>
                <!--/.slide-pane-content-->    
                
            </div>
            <!--/.row-->
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-clients-slide-->

<section id="about-testimonial-2-slide" class="about-slide testimonial-slide pane">

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <blockquote>{{$testimonials[1]->body}} 
                        <span>{{$testimonials[1]->title}} {{$testimonials[1]->intro}} </span>
                    </blockquote>
                    
                </div>
                <!--/.slide-pane-content-->    
            </div>
            <!--/.row-->
            
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-testimonial-2-slide-->

<section id="about-accredidations-slide" class="about-slide pane">

    <h1 class="slide-title">
        <span>
            Accreditations
        </span>
    </h1>

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <div class="row">
                    
                        <div class="col-md-6">
                            
                            <img src="img/logo-about-bureau.png" alt="Bureau Logo" />
                            
                            <h4>BVQI Certification</h4>
                            <p>KDC operate a quality management systems that has been certified by BVQI to both BS EN ISO 9001:2000 and AS/EN9100. This ongoing commitment ensures that our clients can rely on us to manage their projects to the highest standard.</p>
                            
                        </div>
                        
                        <div class="col-md-6">
                            
                            <img src="img/logo-about-aeg.png" alt="AUG Logo" />
                            
                            <h4>AUG Licence</h4>
                            <p>With a strong presence in Germany already, this licence has been a natural step to providing an all-round resourcing service within Europe.</p>
                        
                        
                        </div>
                    
                    </div>
                    <!--/.row-->
                    
                    <div class="row">
                    
                        <div class="col-md-6">
                        
                            <img src="img/logo-about-rec.png" alt="REC Logo" />
                            
                            <h4>REC Membership</h4>
                            <p>KDC is a registered member of REC (Recruitment & Employment Confederation) ensuring a high level of performance from our recruitment staff, and the facilities the company can offer. Some more words can go here to fill space.</p>
                        
                        
                        </div>
                        
                        <div class="col-md-6">
                        
                            <img src="img/logo-about-dorset.png" alt="Dorset Business Logo" />
                            
                            <h4>Dorset Chamber of Commerce</h4>
                            <p>KDC are proud to be members of the Dorset Chamber of Commerce. Founded in 1949, the Chamber has a long and proud tradition of serving the business community, delivering the very best services, business information and advice.</p>
                        
                        
                        </div>
                    
                    </div>
                    <!--/.row-->
                </div>
                <!--/.slide-pane-content-->    
                
            </div>
            <!--/.row-->
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-accredidations-slide-->

<section id="about-testimonial-3-slide" class="about-slide testimonial-slide pane">

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <blockquote>{{$testimonials[2]->body}} 
                        <span>{{$testimonials[2]->title}} {{$testimonials[2]->intro}} </span>
                    </blockquote>
                    
                </div>
                <!--/.slide-pane-content-->    
            </div>
            <!--/.row-->
            
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-testimonial-3-slide-->

<section id="about-career-opportunities-slide" class="about-slide pane">

    <h1 class="slide-title">
        <span>
            Career Opportunities
        </span>
    </h1>

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <div class="container">
        
            <div class="row">
            
                <nav class="slide-pane-nav col-md-3">
                    
                    
                </nav>
                <!--/.slide-pane-nav-->
                
                <div class="slide-pane-content col-md-9">
                
                    <h1>KDC has two Divisions working independently and together to provide our Clients with a diverse range of services.</h1>
                    <p>KDC’s Recruitment Division has teams providing service solutions to a variety of Clients in all our core industry sectors. The Division is divided into Permanent and Contract teams covering Engineering, Manufacturing and Strategic Services. Our extensive database of qualified Candidates, covering most of the EU, has allowed our Clients to successfully fulfil their recruitment requirements with the help of our Consultants.</p>
                    
                    <section id="jobs">
            

                        <p>There are currently no vacancies.</p>



                        <!-- ./job-item-->
                    </section>
                    <!--/#jobs-->
            
                </div>
                <!--/.slide-pane-content-->
                   
            </div>
            <!--/.row-->
            
        </div>
        <!--/.container-->       
    
    </div>
    <!--/.inner-->

</section>
<!--/#about-history-slide-->

@stop
