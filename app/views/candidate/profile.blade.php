@extends('homepage.master')


@section('content')

@include('candidate.search')
@include('candidate.nav')

<?php
setlocale(LC_ALL, ''); // Locale will be different on each system.
$amount = 1000000.97;
$locale = localeconv();
?>

<div id="candidateProfile">
    <div class="container">
        <div class="tabTop inverse">
            <span>PERSONAL DETAILS</span>
        </div>
    </div>
    <div class="container">
            <div class="col-md-8 col-center-block alertFormContainer">
                {{ Form::open(['url' => 'candidate/update-profile', 'role' => 'form']) }}
                    <div class="col-md-12 formElement">
                        <label>EMAIL ADDRESS</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->email }}" name="email">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>FIRST NAME</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->name }}" name="name">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>SURNAME</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->surname }}" name="surname">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>CURRENT POSITION</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->current_position }}" name="current_position">
                    </div>
                    <div class="col-md-6 formElement">
                        <label>CONTACT NUMBER</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->phone }}" name="phone">
                    </div>
                    
                    <!-- divider -->
                    <div class="col-md-5 visible-lg visible-md">
                        <hr>
                    </div>
                    <div class="col-md-2 centered divider">
                        ADDRESS
                    </div>
                     <div class="col-md-5 visible-lg visible-md">
                        <hr>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="col-md-3 formElement">
                        <label>HOUSE NUMBER</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_house_number }}" name="address_house_number">
                    </div>
                    <div class="col-md-9 formElement">
                        <label>STREET</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_street }}" name="address_street">
                    </div>
                    <div class="col-md-7 formElement">
                        <label>ADDRESS 2</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_address_2 }}" name="address_address_2">
                    </div>
                    <div class="col-md-5 formElement">
                        <label>COUNTY</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_county }}" name="address_county">
                    </div>
                    <div class="col-md-4 formElement">
                        <label>CITY</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_city }}" name="address_city">
                    </div>
                    <div class="col-md-3 formElement">
                        <label>POSTCODE</label>
                        <input type="text" class="form-control input-lg" value="{{ $candidate->address_postcode }}" name="address_postcode">
                    </div>
                    <div class="col-md-5 formElement">
                        <label>COUNTRY</label>
                        <select class="selectpicker">
                            <option>United Kingdom</option>
                            <option>United Kingdom</option>
                            <option>United Kingdom</option>
                            <option>United Kingdom</option>
                        </select>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 centered col-center-block formElement">
                        <button type="submit" class="btn btn-default submit">UPDATE DETAILS</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
</div>
<!-- start password section -->
<div id="candidateProfilePassword">
    <div class="container">
        <div class="tabTop inverse dark">
            <span>PASSWORD</span>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8 col-center-block alertFormContainer">
            {{ Form::open(['url' => 'candidate/update-password', 'role' => 'form']) }}
                <div class="col-md-6 formElement">
                    <label>NEW PASSWORD</label>
                    <input type="password" class="form-control input-lg" name="password">
                </div>
                <div class="col-md-6 formElement">
                    <label>CONFIRM PASSWORD</label>
                    <input type="password" class="form-control input-lg" name="password_confirmation">
                </div>
                <div class="col-md-12 centered formElement">
                    <button type="submit" class="btn btn-default submit">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- latest vacancies -->
<section id="vacancies-slide" class="pane">

    <h1 class="slide-title">
        <span>
            Latest Vacancies
        </span>
    </h1>

    <div class="container">
        <div class="row">
            <div id="vacancySlider">
                <div class="slider2">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="slide">
                            <div class="vacancyUpper">
                                <span>
                                    <!--Switch on sector id to get the correct icons-->
                                    @if ($latest[$i]->SectorId == 47)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                                    @elseif ($latest[$i]->SectorId == 48)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Junk icon" />
                                    @elseif ($latest[$i]->SectorId == 49)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="hr icon" />
                                    @elseif ($latest[$i]->SectorId == 50)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Skilled icon" />
                                    @elseif ($latest[$i]->SectorId == 51)
                                    <img src="{{ URL::asset('/img/icon-job-item-oilgas.png') }}" alt="Oil &amp; Gas icon" />
                                    @elseif ($latest[$i]->SectorId == 52)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="umbrella icon" />
                                    @elseif ($latest[$i]->SectorId == 53)
                                    <img src="{{ URL::asset('/img/icon-index-space.png') }}" alt="space icon" />
                                    @elseif ($latest[$i]->SectorId == 54)
                                    <img src="{{ URL::asset('/img/icon-job-item-it.png') }}" alt="IT icon" />
                                    @elseif ($latest[$i]->SectorId == 55)
                                    <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                                    @elseif ($latest[$i]->SectorId == 56)
                                    <img src="{{ URL::asset('/img/icon-job-item-automotive.png') }}" alt="automotive icon" />
                                    @elseif ($latest[$i]->SectorId == 57)
                                    <img src="{{ URL::asset('/img/icon-job-item-defence.png') }}" alt="defence icon" />
                                    @elseif ($latest[$i]->SectorId == 58)
                                    <img src="{{ URL::asset('/img/icon-job-item-marine.png') }}" alt="marine icon" />
                                    @elseif ($latest[$i]->SectorId == 59)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="non UK icon" />
                                    @elseif ($latest[$i]->SectorId == 60)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="dead icon" />
                                    @elseif ($latest[$i]->SectorId == 61)
                                    <img src="{{ URL::asset('/img/icon-job-item-power.png') }}" alt="power icon" />
                                    @else
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="aerospace icon" />
                                    @endif
                                </span>
                                <a href="{{ URL::to('jobs/'.$latest[$i]->JobId.'-'.Str::slug($latest[$i]->JobTitle)) }}?ref=details">
                                    <p>{{ $latest[$i]->JobTitle }}
                                    </p>
                                    <span>REFERENCE <span>{{ $latest[$i]->JobRefNo }}</span></span>
                                </a>
                            </div>
                            <div class="vacancyDetails">
                                <ul>
                                    <li>
                                        <span class="iconHolder">
                                            <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                        </span>
                                        <span class="vacancyDetail">
                                            {{ $latest[$i]->JobType }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="iconHolder">
                                            <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                        </span>
                                        <span class="vacancyDetail">
                                            {{ $latest[$i]->Area }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="iconHolder">
                                            <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                        </span>
                                        <span class="vacancyDetail">

                                             @if ($latest[$i]->PayRate)
                                                @if($latest[$i]->PayRate == '.00')
                                                    <strong>Negotiable</strong>
                                                @else
                                                    <strong>{{$latest[$i]->CurrencySymbol}}{{number_format($latest[$i]->PayRate, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> Per {{ $latest[$i]->ValueName }}
                                                @endif
                                                @elseif ($latest[$i]->Salary)
                                                @if($latest[$i]->Salary == '.00')
                                                    <strong>Negotiable</strong>
                                                @else
                                                    <strong>{{$latest[$i]->CurrencySymbol}}{{number_format($latest[$i]->Salary, 0, $locale['decimal_point'], $locale['thousands_sep'])}} Per Annum</strong> 
                                                @endif
                                            @else
                                                <strong>Negotiable</strong>
                                            @endif
                                        </span>
                                        
                                    </li>
                                </ul>
                                
                                <a href="{{ URL::to('jobs/'.$latest[$i]->JobId.'-'.Str::slug($latest[$i]->JobTitle)) }}?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                                
                                <div class="vacancyTabs">
                                    <a href="{{ URL::to('jobs/'.$latest[$i]->JobId.'-'.Str::slug($latest[$i]->JobTitle)) }}?ref=details">DETAILS</a>
                                    <a href="{{ URL::to('jobs/'.$latest[$i]->JobId.'-'.Str::slug($latest[$i]->JobTitle)) }}?ref=refer">REFER</a>
                                    <span>SHARE
                                    
                                        
                                        
                                        <a href="#" class="shareTwitterModule">
                                            <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                        </a>
                                        
                                        <a href="#" class="linkedModule">
                                            <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                        </a>
                                        
                                        <div class="fb-share-button" data-href="{{ URL::to('jobs/'.$latest[$i]->JobId.'-'.Str::slug($latest[$i]->JobTitle)) }}" data-type="link">
                                        </div>
                                    </span>
                                </div>
                            </div>
                    </div>
                    @endfor
                </div> <!-- end slider 2 -->
            </div> <!-- end vacancy slider -->
        </div> <!-- end row -->
    </div>
            
            
</section>



<!-- start testimonails -->
<section id="home-testimonials-slide" class="pane">

	
    <h1 class="slide-title">
    	<span>    	
        	What our candidates say about us
    	</span>
    </h1>
    
    <div class="inner">
    	<h2>
        	  {{$testimonial->body}} 
    	</h2>
        
        <span class="author">
        
        	{{$testimonial->title}} {{$testimonial->intro}} 
        
        </span>
    
    </div>
    
</section>
@stop
