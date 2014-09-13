@extends('homepage.master')

@section('content')

@include('candidate.search')
@include('candidate.nav')

<div id="jobAlerts">
        <div class="container">
            <div class="tabTop inverse showCriteria">
                <span>JOB ALERT CRITERIA<span class="caret"></span></span>
            </div>
        </div>
        <div class="container jobAlertsIntro">
            <div class="row">
                <div class="col-md-8 col-center-block">
                    <hr>
                    <h1>WELCOME TO YOUR <span>JOB ALERTS</span></h1>
                    <hr>
                    <p class="showCriteria">Adjust your Job Alert criteria <span class="caret"></span></p>
                </div>
            </div>
        </div>
        <div class="container criteriaContainer">
            <div class="col-md-8 col-center-block alertFormContainer">
            	@if (! empty($alert))

                {{ Form::open( array('action' => 'CandidateController@jobAlertsPost' )) }}
                    <div class="col-md-6 formElement">
                        <label>JOB TYPE</label>
                        {{ Form::select('job_type_id', $job_types, $alert->job_type_id, ['class' => 'selectpicker']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>JOB KEYWORDS</label>
                        <input type="text" class="form-control input-lg tagsInput" name="job_keywords" value="{{ $alert->keywords }}">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SECTOR</label>
                        {{ Form::select('sector_id', $sectors, $alert->sector_id, ['class' => 'selectpicker withIcons']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SKILL KEYWORDS</label>
                        <input type="text" class="form-control input-lg tagsInput" name="skill_keywords" value="{{ $alert->skill_keywords }}">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>LOCATION</label>
                        {{ Form::select('location_id', $locations, $alert->location_id, ['class' => 'selectpicker']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SALARY EXPECTATIONS</label>
                        <input type="text" class="form-control input-lg" name="salary" value="{{ $alert->salary_expectations }}">
                    </div>
                    <div class="col-md-6 col-md-offset-6 formElement">
                        <label class="checklabel">Disable Job alerts</label>
                        <input type="checkbox" name="active">
                        <span class="fakeCheck"></span>
                        <button type="submit" class="btn btn-default submit">UPDATE DETAILS</button>
                    </div>
                {{ Form::close() }}

                @else
                {{ Form::open( array('action' => 'CandidateController@jobAlertsPost' )) }}
                    <div class="col-md-6 formElement">
                        <label>JOB TYPE</label>
                        {{ Form::select('job_type_id', $job_types, null, ['class' => 'selectpicker']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>JOB KEYWORDS</label>
                        <input type="text" class="form-control input-lg tagsInput" name="job_keywords">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SECTOR</label>
                        {{ Form::select('sector_id', $sectors, null, ['class' => 'selectpicker withIcons']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SKILL KEYWORDS</label>
                        <input type="text" class="form-control input-lg tagsInput" name="skill_keywords">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>LOCATION</label>
                        {{ Form::select('location_id', $locations, null, ['class' => 'selectpicker']) }}
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SALARY EXPECTATIONS</label>
                        <input type="text" class="form-control input-lg" name="salary">
                    </div>
                    <div class="col-md-6 col-md-offset-6 formElement">
                        <label class="checklabel">Disable Job alerts</label>
                        <input type="checkbox" name="active">
                        <span class="fakeCheck"></span>
                        <button type="submit" class="btn btn-default submit">UPDATE DETAILS</button>
                    </div>
                {{ Form::close() }}


            	@endif
            </div>
        </div>
        <div class="container">
            <div class="tabTop inverse dark lower">
                <span>JOB ALERTS</span>
            </div>
        </div>
    </div>
    
    <!-- end job alerts  -->
    
    <!-- latest vacancies -->
<!-- latest vacancies 
@if(!empty($jobs))
<section id="vacancies-slide" class="pane dark hidden-xs">

<div class="container">
        <div class="tabTop inverse">
            <span>RECOMMENDED VACANCIES</span>
        </div>
    </div>

    <div class="container">
    
        <div class="row">
                <ul class="bxslider">

                    @foreach($jobs as $job)

                        <li class="vacancy">
                            <h2>
                                    <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                                    <strong>{{ $job->JobTitle }}</strong>  
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

                    @endforeach
                                                
                
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
            </div>
        
      </div>
    <!--/#vacancies-slide .container
    
</section> <!-- end latest vacancies 

@endif -->

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
