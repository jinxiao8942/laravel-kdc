@extends('homepage.master')

@section('content')

<div class="purpleBar"></div>
<div id="jobs-container">
    
    <h1 class="slide-title">
        <span>
           Latest Vacancies
        </span>
    </h1>

    <div class="container">
    
        <div class="row">
		
		<section id="jobs" class="col-md-9 col-md-push-3">
        
                <div class="job-item">
                <!-- 
                    JobTitle
                    Salary
                    UpdatedOn
                    EmploymentTypeId
                    JobDescription
                    JobRefNo
                    JobId
                    ValueName
                    SectorId
                    SectorName
                    LocationId
                    Location
                    CurrencySymbol
                    PayRate
                    JobTypeID
                    JobType
                -->
                    <header class="job-header">
                        
                        <div class="row">
                        
                            <div class="title col-sm-12">
                            
                                <h2>
                                    <!-- Sectors 

                                    47  Main Sector
                                    48  Junk
                                    49  Internal HR
                                    50  Skilled Trades
                                    51  Oil & Gas
                                    52  Ltd Company / Umbrella
                                    53  Space
                                    54  IT Sector
                                    55  Aerospace
                                    56  Automotive
                                    57  Defence
                                    58  Marine
                                    59  Non UK
                                    60  Dead
                                    61  Power
                                -->
                                    <!-- Switch on sector id to get the correct icons. -->
                                    @if ($job->SectorId == 47)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                                    @elseif ($job->SectorId == 48)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Junk icon" />
                                    @elseif ($job->SectorId == 49)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="hr icon" />
                                    @elseif ($job->SectorId == 50)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Skilled icon" />
                                    @elseif ($job->SectorId == 51)
                                    <img src="{{ URL::asset('/img/icon-job-item-oilgas.png') }}" alt="Oil &amp; Gas icon" />
                                    @elseif ($job->SectorId == 52)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="umbrella icon" />
                                    @elseif ($job->SectorId == 53)
                                    <img src="{{ URL::asset('/img/icon-job-item-space.png') }}" alt="space icon" />
                                    @elseif ($job->SectorId == 54)
                                    <img src="{{ URL::asset('/img/icon-job-item-it.png') }}" alt="IT icon" />
                                    @elseif ($job->SectorId == 55)
                                    <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                                    @elseif ($job->SectorId == 56)
                                    <img src="{{ URL::asset('/img/icon-job-item-automotive.png') }}" alt="automotive icon" />
                                    @elseif ($job->SectorId == 57)
                                    <img src="{{ URL::asset('/img/icon-job-item-defence.png') }}" alt="defence icon" />
                                    @elseif ($job->SectorId == 58)
                                    <img src="{{ URL::asset('/img/icon-job-item-marine.png') }}" alt="marine icon" />
                                    @elseif ($job->SectorId == 59)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="non UK icon" />
                                    @elseif ($job->SectorId == 60)
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="dead icon" />
                                    @elseif ($job->SectorId == 61)
                                    <img src="{{ URL::asset('/img/icon-job-item-power.png') }}" alt="power icon" />
                                    @else
                                    <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Job icon" />
                                    @endif
                                    <a href="{{ URL::to('jobs/'.$job->JobId.'-'.Str::slug($job->JobTitle)) }}">
                                        {{ $job->JobTitle }}
                                        <span>REFERENCE <span>{{ $job->JobRefNo }}</span></span>
                                    </a>
				    <a class="saveJobButton" href="{{ URL::to('save-job', $job->JobId) }}">Save job</a>
                                </h2>
                            
                            </div>
                            
                        </div>
                        
                    </header>
                    <!--/.job-header-->
                
                    <div class="job-body">
                    
                        <div class="row">
                    
                            <div class="job-type col-md-3">
                                <div class="inner">
                                    <!-- Employment Type IDs
                                    4 Permanent
                                    5 Temp
                                    6 Contract
                                    7 Any
                                    8 Contract / Perm
                                    9 Temp / Perm
                                    10 FTC
                                    11 Contracting
                                    -->
                                    <img src="{{ URL::asset('/img/icon-type.png')}}" alt="job type icon" />
                                    <?php $type = DB::connection('pronet')->table('ProNet.dbo.EmploymentTypes')->where('EmploymentTypeId', $job->EmploymentTypeId)->first(); ?>
                                    {{ $type->Description }}
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-type-->
                            
                            <div class="job-location col-md-4">
                                <div class="inner">
                                    <img src="{{ URL::asset('/img/icon-location.png') }}" alt="job location icon" />
                                    <strong>{{ $job->Area }}</strong>
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-location-->
                            <?php
                            setlocale(LC_ALL, ''); // Locale will be different on each system.
                            $amount = 1000000.97;
                            $locale = localeconv();
                            ?>
                            <div class="job-salary col-md-3">
                                <div class="inner">
                                    <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="job salary icon" />
                                    @if ($job->PayRate)
					@if($job->PayRate == '.00')
					    <strong>Negotiable</strong>
					@else
					    <strong>{{$job->CurrencySymbol}}{{number_format($job->PayRate, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> Per {{ $job->ValueName }}
					@endif
				    @elseif ($job->Salary)
					@if($job->Salary == '.00')
					    <strong>Negotiable</strong>
					@else
					    <strong>{{$job->CurrencySymbol}}{{number_format($job->Salary, 0, $locale['decimal_point'], $locale['thousands_sep'])}} Per Annum</strong> 
					@endif
				    @else
					<strong>Negotiable</strong>
				    @endif
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-salary-->
                            
                            <!--<div class="job-save col-md-2">
                                <div class="inner">
                                    <a href="{{ URL::to('save-job', $job->JobId) }}">Save job</a>
                                </div>
                                <!--/.inner-->
                            <!--</div>
                            <!--/.job-save-->
                            
                            
                        </div>
                        <!--/.job-body .row -->
                    
                    </div>
                    <!--/.job-body-->
                        
                    <footer class="job-tools">
                        
                 
		       <div class="row">
                        
                            
                            <!--/.job-apply-->
                                
                            <div class="job-social-container col-md-12">
				<button class="btn visible-xs applyJobNew"><span>APPLY</span> FOR JOB<span class="caret right"></span></button>
                                
                                <div class="job-social">
                                    <span class="job-apply hidden-xs">
                                        <div class="inner">
                                            <a href="#">APPLY FOR JOB</a>
                                        </div>
                                        
                                    </span>
                                    
                                    <!--details-container-->
                                        
                                    <span class="social-container">
                                        <div class="inner">
                                            <p>Share</p>
                                                <div class="fb-share-button socialLink" data-href="#" data-type="link">
                                                </div>
                                                <a href="#" class="socialLink shareTwitter">
                                                    <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                                </a>
                                                <a href="#" class="socialLink shareLinked">
                                                    <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                                </a>
                                        </div>
                                    </span>
                                    
                                    <span class="refer-container">
                                        <div class="inner">
                                            <p>Refer</p>
                                            <a href="#" class="emailRefer">
                                                <img src="{{ URL::asset('/img/icon-tools-email-dark.png') }}" alt="email icon" />
                                            </a>
                                            <a href="#" class="newsPrint">
                                                <img src="{{ URL::asset('/img/icon-tools-print-dark.png') }}" alt="print icon" />
                                            </a>
                                        </div>
                                        
                                    </span>
                                    
                                    <span class="details-container">
                                        <div class="inner">
                                            <a href="#">Details</a>
                                        </div>
                                    </span>
                                </div>
				<div class="job-excerpt">
                                    <p>{{ Str::words($job->JobDescription,38) }}</p>
                                </div>
                                <!--/.job-social-->                                
                            </div>
			    
                            <!--/.job-social-container-->
                            
                        </div>
                                                    
                    </footer>
                    <!-- /.job-tools-->
                    
                    <div class="job-details">
                        
                      
                        
                        <div class="details-content">
                        
                            
                            <?php $desc = str_replace("\n", "<br />", $job->JobDescription); ?>
                            {{ $desc }}
                        
                        </div>
                        <!--/.details-content-->
                        
                        <div class="details-apply">
                        
                            <a href="#">Apply <span>for this job</span></a>                        
                        
                        </div>
                        <!--/.details-apply-->
                    
                    
                    </div>
                    <!--/.job-details-->
                    
                    <div class="apply-form col-md-12">
			<p>To apply for this job you can either call us during office hours on {{ $job->OperatorTel }} or email <a href="mailto:{{ $job->OperatorEmail }}">{{ $job->OperatorEmail }}</a>,
                            <button class="purechat-button-expand" style="visibility: hidden;">
                                <img src="http://www.kdcplc.co.uk/img/icon-live-chat.png">
                                    Chat with us direct
                            </button>
                            Or fill in this form and we'll get back to you as soon as possible.
                        </p>

                        {{ Form::open(['url' => 'jobs/'.$job->JobId.'/apply', 'role' => 'form', 'files' => true]) }}
        
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Full name *" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Email *" name="email" required>
                                    </div>
                                    
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Current position" name="position">
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Message" name="covering_letter"></textarea>
                                    </div>
                                </div>
                            </fieldset>
			    <div class="cvUpload">
                                    <div class="uploadElements hidden-xs hidden-sm">
                                        <span class="title hidden-xs hidden-sm">Upload CV (optional) <span>| </span></span>
                                        <span class="fakeBrowse hidden-xs hidden-sm"></span>
                                        <input type="file" name="cv" class="realUpload hidden-xs hidden-sm">
                                        <button class="btn hidden-xs hidden-sm">Choose file</button>
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
                                </div>
                    
                                
                            <!-- <div class="submit-container"> -->
                                <input type="submit" value="Submit">
                            <!-- </div> -->
                                
                   
                        </form>

                    </div>
                    <!--/.apply-form-->
		    
		    <div class="refer-form col-md-12">
                        <div class="referPop">
                        <div class="info">
                            <p>Send this job to someone you know</p>
			    <p class="referInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc.</p>
                            {{ Form::open(['url' => 'jobs/share?id='.$job->JobId, 'role' => 'form']) }}
                        
                                <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your name *" name="nameRefer" required name="name_1">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your email address *" name="emailRefer" required name="email_1">
                                    </div>
                                    
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your friends name *" name="friendNameRefer" required name="name_2">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your friend's email address *" name="friendEmailRefer" required name="email_2">
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Your message" name="messageRefer">{{ $job->JobTitle }}&#10;&#13;Ref: {{ $job->JobRefNo }}.&#10;&#13;To find out more about htis role, please click on this link {{ URL::to('jobs/'.$job->JobId.'-'.Str::slug($job->JobTitle)) }}?ref=details
                                        </textarea>
                                    </div>
                                </div>
                                
                                <div class="humanConfirmation">
                                            <p>Please confirm you are not a robot...</p>
                                                <div class="fakeInput1">3</div>
                                                <span>+</span>
                                                <div class="fakeInput2">2</div>
                                                <span>=</span>
                                                <input type="text" class="input3" required="">
                                                <div class="clearfix"></div>
                                        </div>
				
				<p class="referTerms"><a href="#">View referral terms and conditions</a></p>
				<!-- hidden terms pop -->
				<div class="referTermsPop" style="display: none;">
					<div class="close">X</div>
					<div class="info">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					</div>
				</div>
                                
                                <div class="submit-container">
                                                        <input type="submit" value="Send">
                                                </div>
                                        </fieldset>
                                
                                
                        </form>
                        </div>
                    </div>
    
    
                    </div>
                    
                </div>
                <!-- ./job-item-->
            </section>
            <!--/#jobs-->
        
            <aside id="sidebar" class="col-md-3 col-md-pull-9">
            
                <div id="smallSearch">
			<form action="{{ URL::to('jobs') }}" method="get">
				<h3>Search by keyword</h3>
				<input type="text" name="keyword">
				<input type="submit" value="Search">
			</form>
			<div class="clearfix"></div>
		</div>
                
                <div id="job-alerts" class="widget">
                    <h3>Haven't found what you're looking for?</h3>
                    <p><a href="../become-a-candidate">Register now</a> and we will keep you updated</p>
                    <!--<h3>Sign up for <span>job alerts</span></h3>
                    
                    <form>
                    
                        <p><input type="email" placeholder="Email address" /></p>
                        <p class="right"><input type="submit" value="Submit" /></p>
                    
                    </form>-->
                    
                    
                
                </div>
                <!--/#job-alerts-->
                
                

                <div id="recommended-jobs" class="widget">
                
                    <h3>Latest jobs</h3>
                    @foreach($latest as $latest_job)


                    <div class="slide">
                        <div class="vacancyUpper">
                            <span class="visible-inline-block-lg">
                                 <!-- Switch on sector id to get the correct icons. -->
                            @if ($latest_job->SectorId == 47)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            @elseif ($latest_job->SectorId == 48)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Junk icon" />
                            @elseif ($latest_job->SectorId == 49)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="hr icon" />
                            @elseif ($latest_job->SectorId == 50)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Skilled icon" />
                            @elseif ($latest_job->SectorId == 51)
                            <img src="{{ URL::asset('/img/icon-job-item-oilgas.png') }}" alt="Oil &amp; Gas icon" />
                            @elseif ($latest_job->SectorId == 52)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="umbrella icon" />
                            @elseif ($latest_job->SectorId == 53)
                            <img src="{{ URL::asset('/img/icon-job-item-space.png') }}" alt="space icon" />
                            @elseif ($latest_job->SectorId == 54)
                            <img src="{{ URL::asset('/img/icon-job-item-it.png') }}" alt="IT icon" />
                            @elseif ($latest_job->SectorId == 55)
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            @elseif ($latest_job->SectorId == 56)
                            <img src="{{ URL::asset('/img/icon-job-item-automotive.png') }}" alt="automotive icon" />
                            @elseif ($latest_job->SectorId == 57)
                            <img src="{{ URL::asset('/img/icon-job-item-defence.png') }}" alt="defence icon" />
                            @elseif ($latest_job->SectorId == 58)
                            <img src="{{ URL::asset('/img/icon-job-item-marine.png') }}" alt="marine icon" />
                            @elseif ($latest_job->SectorId == 59)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="non UK icon" />
                            @elseif ($latest_job->SectorId == 60)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="dead icon" />
                            @elseif ($latest_job->SectorId == 61)
                            <img src="{{ URL::asset('/img/icon-job-item-power.png') }}" alt="power icon" />
                            @else
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Job icon" />
                            @endif
                            </span>
                            <a href="{{ URL::to('jobs/'.$latest_job->JobId.'-'.Str::slug($latest_job->JobTitle)) }}?ref=details">
                                <p>{{ $latest_job->JobTitle }}
                                </p>
				<span>REFERENCE <span>{{ $latest_job->JobRefNo }}</span></span>
                            </a>
                        </div>
                        <div class="vacancyDetails">
                            <ul>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        {{ $latest_job->JobType }}
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        {{$latest_job->Area}}
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                    </span>
                                    
				    
				    <span class="vacancyDetail">
                                        @if ($latest_job->PayRate)
                                            @if($latest_job->PayRate == '.00')
                                                <strong>Negotiable</strong>
                                            @else
                                                <strong>{{$latest_job->CurrencySymbol}}{{number_format($latest_job->PayRate, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> Per {{ $latest_job->ValueName }}
                                            @endif
                                        @elseif ($latest_job->Salary)
                                            @if($latest_job->Salary == '.00')
                                                <strong>Negotiable</strong>
                                            @else
                                                <strong>{{$latest_job->CurrencySymbol}}{{number_format($latest_job->Salary, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> 
                                            @endif
                                        @else
                                            <strong>Negotiable</strong>
                                        @endif
                                    </span>
				    
				    
				    
                                </li>
                            </ul>
                            
                            <a href="{{ URL::to('jobs/'.$latest_job->JobId.'-'.Str::slug($latest_job->JobTitle)) }}?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                            
                            <div class="vacancyTabs">
                                <a href="{{ URL::to('jobs/'.$latest_job->JobId.'-'.Str::slug($latest_job->JobTitle)) }}?ref=details">DETAILS</a>
                                <a href="{{ URL::to('jobs/'.$latest_job->JobId.'-'.Str::slug($latest_job->JobTitle)) }}?ref=refer">REFER</a>
                                <span>SHARE
                                
                                    
                                    
                                    <a href="#" class="shareTwitterModule">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                    </a>
                                    
                                    <a href="#" class="linkedModule">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                    </a>
				    <div class="fb-share-button" data-href="{{ URL::to('jobs/'.$latest_job->JobId.'-'.Str::slug($latest_job->JobTitle)) }}" data-type="link">FB LINK
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <!--/#recommended-jobs-->
                
            </aside>
            <!--/#sidebar-->
            
            
        </div>
        <!--/.jobs-->
    </div>
    <!--/.container-->  
</div>
</div>
<!--/#jobs-container-->

@stop
