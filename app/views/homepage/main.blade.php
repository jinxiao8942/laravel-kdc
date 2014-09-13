@extends('homepage.master')


@section('content')
<?php
setlocale(LC_ALL, ''); // Locale will be different on each system.
$amount = 1000000.97;
$locale = localeconv();
?>
<section id="home-slide" class="pane">

    <div class="inner" data-stellar-background-ratio="0.5">
        
        <div id="home-slideshow">
            <img src="{{ URL::asset('/img/logo-kdc-home-slide.png') }}" alt="KDC Logo Big"/><br/>
            <div class="fade-item">
                <h1><span>Experienced <strong>Technical Recruiters</strong></h1>
            </div>
            <!--/.slide-->
            @foreach($messages as $message)
                <div class="fade-item"><h1><span>{{$message->body}}</span></h1></div>
            @endforeach
        </div>
        <!--/#home-slideshow-->
            
        <form method="get" action="jobs">
            <fieldset>
                <input type="text" placeholder="Keyword" name="keyword" /> <input type="submit" value="" />
            </fieldset>
            <p><a href="jobs">Advanced Search</a></p>
        </form>
    </div>
    <!--/.inner-->
    
</section>
<!--/#home-slide-->

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
            </div>
        </div>
        </div>
    
    <!--/#vacancies-slide .container-->
    </div>
</section>
<!--/#vacancies-slide-->

<section id="sectors-slide" class="pane">

    <h1 class="slide-title">
        <span>
            Sectors
        </span>
    </h1>

    <div class="container">
    
        <div class="row">
        
        <div class="col-sm-6">
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=55') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-aerospace-xl.png') }}" alt="aerospace icon" />
                        </span>
                    </a>
                    
                    <h2>Aerospace</h2>
                    
                    <p>KDC offer blue and white-collar employment opportunities for highly skilled personnel, with an emphasis on precision technology, innovative design and complex manufacturing.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=56') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-automotive-xl.png') }}" alt="automotive icon" />
                        </span>
                    </a>
                    
                    <h2>Automotive</h2>
                    
                    <p>KDC's capability covers the complete automotive product life-cycle, focussing on developed relationships with many prominent OEMs and 2nd tier suppliers.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=57') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-defense-xl.png') }}" alt="defense icon" />
                        </span>
                    </a>
                    
                    <h2>Defence</h2>
                    
                    <p>Supplying diverse candidates to cater for many diverse projects, KDC has the capability to match the Defence sector's exacting requirements for blue and white-collar personnel.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=58') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-marine-xl.png') }}" alt="marine icon" />
                        </span>
                    </a>
                    
                    <h2>Marine</h2>
                    
                    <p>With employment opportunities for contract and permanent staff, KDC services the prestigious Marine sector with a workforce that delivers consistent exceptional results.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=51') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-oil-gas-xl.png') }}" alt="oil-gas icon" />
                        </span>
                    </a>
                    
                    <h2>Oil &amp; Gas</h2>
                    
                    <p>KDC works alongside Operators, Contractors and Service Companies within the Oil and Gas sector, offering recruitment solutions across all stages of the product cycle, in both the UK and overseas.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=53') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-space-xl.png') }}" alt="space icon" />
                        </span>
                    </a>
                    
                    <h2>Space</h2>
                    
                    <p>In this highly specialised and technically demanding sector, KDC has developed a unique position supplying diverse candidates on a contract, temporary or permanent basis.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=61') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-power-xl.png') }}" alt="power icon" />
                        </span>
                    </a>
                    
                    <h2>Power</h2>
                    
                    <p>Incorporating nuclear, renewable and petrochemical industries, KDC services the Power sector by developing strategic relationships, which provide us with a deep understanding of our clients' business needs.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inner">
                    <a href="{{ url('jobs?sector%5B%5D=54') }}" class="icon">
                        <span>
                            <img src="{{ URL::asset('/img/icon-index-it-xl.png') }}" alt="it icon" />
                        </span>
                    </a>
                    
                    <h2>IT</h2>
                    
                    <p>KDC offers the fast moving IT sector a range of contract and permanent candidates, whose skill and expertise reflect the unique requirements of this most diverse industry.</p>
                </div>
            </div>
        </div>
        
    </div>
        
        
        
    </div>        

</section>


<section id="home-testimonials-slide" class="pane">

    
    <h1 class="slide-title">
        <span>      
            What our candidates say about us
        </span>
    </h1>
    
    <div class="inner">
            @if($testimonial)
    
        <h2>
            {{$testimonial->body}} 
        </h2>
        
        <span class="author">
        
            {{$testimonial->title}} <strong>{{$testimonial->intro}}</strong>
        
        </span>
        @endif    
    </div>
    
</section>


<section id="become-a-candidate" class="pane">

    <div class="inner" data-stellar-background-ratio="0.5">
    
        <h1 class="center">Seen a position you are interested in?</h1>
        
        <a href="contact-us">Get in touch</a>
    
    </div>
    <!--/.inner-->
    
</section>
<!--/#testimonial-1-slide-->

@stop
