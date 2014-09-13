@extends('homepage.master')

@section('content')

@include('candidate.search')
@include('candidate.nav')

<div id="jobs-container" class="applications">
    
    <div class="container">
        <h2 class="portalTitle"><span>{{ count($jobs) }}</span> JOBS</h2>
        <div class="row">
            <h1>saved jobs</h1>
            <aside id="sidebar" class="col-md-3">
                
                <div id="job-filter">
                    <ul>
                        <li>
                            <input type="checkbox">
                            <span class="fakeCheck"></span>
                            <span>All</span>
                        </li>
                        <li>
                            <input type="checkbox">
                            <span class="fakeCheck"></span>
                            <span>Saved</span>
                        </li>
                        <li>
                            <input type="checkbox">
                            <span class="fakeCheck"></span>
                            <span>Applied</span>
                        </li>
                        <li>
                            <input type="checkbox">
                            <span class="fakeCheck"></span>
                            <span>Interview</span>
                        </li>
                    </ul>
                    <hr>
                </div>
            
                <div id="refine-search" class="widget">
                    
                
                    <h3>Refine Applications</h3>
                    
                    <ul>
                    
                        <li class="location">
                            <a href="#">Location</a>
                            <span class="arrow"></span>
                            <form>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                            </form>
                        </li>
                        <li class="sector">
                            <a href="#">Sector</a>
                            <span class="arrow"></span>
                            <form>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                            </form>
                        </li>
                        <li class="salary">
                            <a href="#">Salary</a>
                            <span class="arrow"></span>
                            <form>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                            </form>
                        </li>
                        <li class="type">
                            <a href="#">Type</a>
                            <span class="arrow"></span>
                            <form>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                            </form>
                        </li>
                        <li class="date">
                            <a href="#">Date</a>
                            <span class="arrow"></span>
                            <form>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        An option
                                    </label>
                                </div>
                            </form>
                        </li>
                    
                    </ul>
                
                </div>
                <!-- /#refine-search-->
                
               
                
            </aside>
            <!--/#sidebar-->
            
            <section id="jobs" class="col-md-9">
                @if(is_null($jobs))

                    <h3>You currently have no saved jobs.</h3>

                @else

                

                @foreach($jobs as $job)
                <?php 
                $jobInfo = DB::select("EXEC spJobByID_Select @JobID = $job->job_id");
                if(!empty($jobInfo))
                {
                    $jobInfo = $jobInfo[0];
                ?>

                

                <div class="job-item">
                    
                    <header class="job-header">
                        
                        <div class="row">
                        
                            <div class="title col-md-10">
                            
                                <h2>
                                    <img src="{{ URL::to('') }}/img/icon-job-item-aerospace.png" alt="aerospace icon" />
                                    {{ $jobInfo->JobTitle }}
                                </h2>
                            
                            </div>
                            <!--/.title-->
                            
                            <div class="date col-md-2">
                                
                                03 April 2014
                            
                            </div>
                            <!--./date-->
                            
                        </div>
                        
                    </header>
                    <!--/.job-header-->
                
                    <div class="job-body">
                    
                        <div class="row">
                    
                            <div class="job-type col-md-3">
                                <div class="inner">
                                    <img src="{{ URL::to('') }}/img/icon-type.png" alt="job type icon" />
                                    Contract
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-type-->
                            
                            <div class="job-location col-md-4">
                                <div class="inner">
                                    <img src="{{ URL::to('') }}/img/icon-location.png" alt="job location icon" />
                                    <strong>Bournemouth,</strong> Dorset
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-location-->
                            
                            <div class="job-salary col-md-3">
                                <div class="inner">
                                    <img src="{{ URL::to('') }}/img/icon-salary.png" alt="job salary icon" />
                                    <strong>&pound;30</strong> per hour
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-salary-->
                            
                            @if(!$job->applied)
                            <div class="job-save col-md-2">
                                <div class="inner">
                                    <a href="{{ URL::to('save-job-remove/'.$job->id) }}">Remove job</a>
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-save-->
                            @endif
                            
                            <div class="job-excerpt col-md-12">
                        
                                <p>{{ $jobInfo->JobDescription }}</p>
                            </div>
                            <!--/.job-excerpt-->
                            
                        </div>
                        <!--/.job-body .row -->
                    
                    </div>
                    <!--/.job-body-->
                        
                    <footer class="job-tools">
                        
                        <div class="row">
                            @if(!$job->applied)
                            <div class="job-apply col-md-5">
                                
                                <a href="#">
                                    
                                    Apply <span>for this job <img src="{{ URL::to('') }}/img/icon-apply-arrow-down.png" />
                                    
                                </a>
                                
                            </div>
                            <!--/.job-apply-->
                                
                            <div class="job-social-container col-md-7">
                                
                                <div class="job-social">
                                    <span class="details-container">
                                        <div class="inner">
                                            <a href="#">Details</a>
                                        </div>
                                        
                                    </span>
                                    <!--details-container-->
                                        
                                    <span class="refer-container">
                                        <div class="inner">
                                            <p>Refer</p>
                                            <a href="#">
                                                <img src="{{ URL::to('') }}/img/icon-tools-email.png" alt="email icon" />
                                            </a>
                                            <a href="#">
                                                <img src="{{ URL::to('') }}/img/icon-tools-print.png" alt="print icon" />
                                            </a>
                                        </div>
                                        
                                    </span>
                                    <!--details-container-->
                                        
                                    <span class="social-container">
                                        <div class="inner">
                                            <p>Share</p>
                                            <a href="#">
                                                <img src="{{ URL::to('') }}/img/icon-tools-facebook.png" alt="facebook icon" />
                                            </a>
                                            <a href="#">
                                                <img src="{{ URL::to('') }}/img/icon-tools-twitter.png" alt="twitter icon" />
                                            </a>
                                            <a href="#">
                                                <img src="{{ URL::to('') }}/img/icon-tools-linkedin.png" alt="linkedin icon" />
                                            </a>
                                        </div>
                                    </span>
                                    <!--details-container-->
                                </div>
                                <!--/.job-social-->                                
                            </div>
                            <!--/.job-social-container-->
                            
                        </div>
                        @else
                            <div class="job-apply col-md-5">
                                
                                    
                                  <h3>Applied - {{ $job->applied_date }}</h3>
                                
                            </div>
                        @endif  
                                                    
                    </footer>
                    <!-- /.job-tools-->
                    
                    <div class="job-details">
                        
                        <div class="details-header">
                            <div class="row">
                            
                                <div class="col-md-3">
                                    
                                    <span><strong>Closing date</strong> 13/04/14</span>
                                
                                </div>
                                
                                <div class="col-md-3">
                                
                                    <span><strong>Start date</strong> ASAP</span>
                                
                                </div>
                                
                                <div class="col-md-3">
                                
                                    <span><strong>Duration</strong> 6 Months</span>
                                
                                </div>
                                <div class="col-md-3">
                                
                                    <span><strong>Reference</strong> J12345</span>
                                
                                </div>
                            
                            </div>                      
                        
                        </div>
                        <!--/#details-header-->
                        
                        <div class="details-content">
                        
                            <p class="title">
                                <strong>
                                    KDC have an exciting opportunity for an experienced project manager to join a leader in aircraft interior installation company. At the forefront of their field, the company designs, stress, builds and installs bespoke and innovative aircraft interiors for large tier 1 civil operators. This process will involve the liaison with client and aircraft manufacturers, to establish the requirements and preferences of the customer and create very high spec end products to satisfy the most exacting of needs. 
                                </strong>
                            </p>
                            
                            <p>The role of the production project manager is to oversee all aspects of the process from initial creative design to final delivery. Core to this is the overview of production with direct customer liaison throughout.</p>
                            <p><strong>Candidates will be required to show:</strong>
                            <ul>
                                <li>Previous production project management skills ? preferably within the civil aviation industry </li>
                                <li>Experience with multidiscipline projects </li>
                                <li>Be an excellent communicator to all levels within both client and internally </li>
                                <li>Prince 2 or PMP qualification would be beneficial </li>
                                <li>Strong commercial awareness </li>
                                <li>Demonstrable understanding of change, risk mitigation and negotiation </li>
                            </ul>
                            <p>The role is perfect of a smart, intelligent and dynamic project manager who is both self-starters and team players. If you relish a challenge and want to work with an equally forward looking organisation then you need to get in touch. </p>
                        
                        </div>
                        <!--/.details-content-->
                        
                        <div class="details-apply">
                        
                            <a href="#">Apply <span>for this job</span></a>                        
                        
                        </div>
                        <!--/.details-apply-->
                    
                    
                    </div>
                    <!--/.job-details-->


                    
                    <div class="apply-form col-md-12">
                            
                  
                        {{ Form::open(['url' => 'candidate/apply/'.$jobInfo->JobId,'role' => 'form']) }}
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder="Full name *" name="name"value="{{ $candidate->name }} {{ $candidate->surname }}">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder="Current position *" name="current_position" value="{{ $candidate->current_position }}">
                                    </div>
                                    
                                </div>
                                    
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder="Phone Number *" name="phone" value="{{ $candidate->phone }}">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder="Email Address *" name="email" value="{{ $candidate->email }}">
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-xs-12">
                                        <textarea class="form-control" placeholder="covering letter" name="cover_letter"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                    
                                
                            <div class="submit-container">
                                <input type="submit" value="Apply">
                            </div>
                                
                   
                        </form>
                    </div>
                    <!--/.apply-form-->
                    
                </div>
                <!-- ./job-item-->
                <?php } ?>
                @endforeach
            @endif



            </section>
            <!--/#jobs-->
        </div>
        <!--/.jobs-->
    </div>
    <!--/.container-->  
</div>
<!--/#jobs-container-->

<!-- latest vacancies -->
<section id="vacancies-slide" class="pane dark">

    <div class="container">
        <div class="tabTop inverse">
            <span>RECOMMENDED VACANCIES</span>
        </div>
    </div>

    <div class="container">
    
        <div class="row">
     <ul class="bxslider">
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                
                
                
            </ul>
            
            <div id="vacancy-scroller" class="col-md-2">
                <div id="fakeScroller">
                    <a href="#" class="prev">
                        <img src="{{ URL::asset('/img/icon-index-vacancy-scroller-dark.png') }}" alt="vacancy scroller button" />
                    </a>
                    <br />
                    Scroll<br/>
                    Through<br/>
                    <a href="#" class="next">
                        <img src="{{ URL::asset('/img/icon-index-vacancy-scroller-down-dark.png') }}" alt="vacancy scroller button" />
                    </a>
                </div>
            </div></div>
    <!--/#vacancies-slide .container-->
    
</section> <!-- end latest vacancies -->

<!-- start testimonails -->
<section id="home-testimonials-slide" class="pane">

    
    <h1 class="slide-title">
        <span>      
            What our candidates say about us
        </span>
    </h1>
    
    <div class="inner">
    
        <h2>
            <strong>A really nice and large quote</strong><br/>
            a client saying how amazing and<br/>
            <strong>brilliant KDC are!</strong> 
        </h2>
        
        <span class="author">
        
            firstname surname <strong>from company</strong>
        
        </span>
    
    </div>
    
</section>
@stop
