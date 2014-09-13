@extends('homepage.master')

@section('content')

@include('candidate.search')
@include('candidate.nav')

<div id="jobs-container" class="applications">
    
    <div class="container">
        <h2 class="portalTitle"><span>{{ count($jobs) }}</span> JOBS</h2>
        <div class="row">
        
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
                
                    <h3>Refine APPLICATIONS</h3>
                    <form>
                    <ul>
                        <li class="sector">
                            <a href="#">Sector</a>
                            <span class="arrow"></span>
                            <div class="toggle">
                               <?php $checked = ''; ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sector[]" value="empty" <?php echo $checked; ?>>
                                        <span class="fakeCheck"></span>
                                        Sector Name
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li class="type">
                            <a href="#">Type</a>
                            <span class="arrow"></span>
                            <div class="toggle">
                               <?php $checked = 'checked'; ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sector[]" value="empty" <?php echo $checked; ?>>
                                        <span class="fakeCheck"></span>
                                        Sector Name
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="location">
                            <a href="#">Location</a>
                            <span class="arrow"></span>
                            <div class="toggle">
                               <?php $checked = ''; ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sector[]" value="empty" <?php echo $checked; ?>>
                                        <span class="fakeCheck"></span>
                                        Sector Name
                                    </label>
                                </div>
                            </div>
                        </li>
                    
                    </ul>
                    </form>
                </div>
                <!-- /#refine-search-->
                
               
                
            </aside>
            <!--/#sidebar-->
            
            <section id="jobs" class="col-md-9">
                @if(is_null($jobs))

                    <h3>You currently have no saved jobs.</h3>

                @else

                

                @foreach($jobs as $job)
                <?php $jobInfo = DB::select("EXEC spJobByID_Select @JobID = $job->job_id");
                if(!empty($jobInfo))
                {
                    $jobInfo = $jobInfo[0];
                ?>

                

                <div class="job-item">
                    
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
                            @if ($jobInfo->SectorId == 47)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            @elseif ($jobInfo->SectorId == 48)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Junk icon" />
                            @elseif ($jobInfo->SectorId == 49)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="hr icon" />
                            @elseif ($jobInfo->SectorId == 50)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Skilled icon" />
                            @elseif ($jobInfo->SectorId == 51)
                            <img src="{{ URL::asset('/img/icon-job-item-oilgas.png') }}" alt="Oil &amp; Gas icon" />
                            @elseif ($jobInfo->SectorId == 52)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="umbrella icon" />
                            @elseif ($jobInfo->SectorId == 53)
                            <img src="{{ URL::asset('/img/icon-job-item-space.png') }}" alt="space icon" />
                            @elseif ($jobInfo->SectorId == 54)
                            <img src="{{ URL::asset('/img/icon-job-item-it.png') }}" alt="IT icon" />
                            @elseif ($jobInfo->SectorId == 55)
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            @elseif ($jobInfo->SectorId == 56)
                            <img src="{{ URL::asset('/img/icon-job-item-automotive.png') }}" alt="automotive icon" />
                            @elseif ($jobInfo->SectorId == 57)
                            <img src="{{ URL::asset('/img/icon-job-item-defence.png') }}" alt="defence icon" />
                            @elseif ($jobInfo->SectorId == 58)
                            <img src="{{ URL::asset('/img/icon-job-item-marine.png') }}" alt="marine icon" />
                            @elseif ($jobInfo->SectorId == 59)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="non UK icon" />
                            @elseif ($jobInfo->SectorId == 60)
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="dead icon" />
                            @elseif ($jobInfo->SectorId == 61)
                            <img src="{{ URL::asset('/img/icon-job-item-power.png') }}" alt="power icon" />
                            @else
                            <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="Job icon" />
                            @endif
                                    <a href="{{ URL::to('jobs/'.$jobInfo->JobId.'-'.Str::slug($jobInfo->JobTitle)) }}?ref=details">
                                        {{ $jobInfo->JobTitle }}
                                        <span>REFERENCE <span>{{ $jobInfo->JobRefNo }}</span></span>
                                    </a>
                                    <!-- save job button -->
                                    <a class="saveJobButton" href="{{ URL::to('save-job', $job->JobId) }}">Save job</a>
                                </h2>
                            
                            </div>
                            <!--/.title-->
                            
                            
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
                                    {{ $jobInfo->JobType }}
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-type-->
                            
                            <div class="job-location col-md-4">
                                <div class="inner">
                                    <img src="{{ URL::asset('/img/icon-location.png') }}" alt="job location icon" />
                                    <strong>{{ $jobInfo->Area }}</strong>
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-location-->
                            
                            <div class="job-salary col-md-3">
                                <div class="inner">
                                    <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="job salary icon" />
                                    @if ($jobInfo->PayRate)
                                            @if($jobInfo->PayRate == '.00')
                                                <strong>Negotiable</strong>
                                            @else
                                                <strong>{{$jobInfo->CurrencySymbol}}{{number_format($jobInfo->PayRate, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> per {{ $jobInfo->ValueName }}
                                            @endif
                                        @elseif ($job->Salary)
                                            @if($job->Salary == '.00')
                                                <strong>Negotiable</strong>
                                            @else
                                                <strong>{{$jobInfo->CurrencySymbol}}{{number_format($jobInfo->Salary, 0, $locale['decimal_point'], $locale['thousands_sep'])}}</strong> per {{ $jobInfo->ValueName }}
                                            @endif
                                        @else
                                            <strong>Negotiable</strong>
                                        @endif
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.job-salary-->
                            
                            <!--/.job-excerpt-->
                            
                        </div>
                        <!--/.job-body .row -->
                    
                    </div>
                        
                    <footer class="job-tools">
                        
                        <div class="row">
                                
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
                                <!--/.job-social-->
                                
                                <div class="job-excerpt">
                                    <p>{{ Str::words($jobInfo->JobDescription,38) }}</p>
                                </div>
                            </div>
                            <!--/.job-social-container-->
                            
                        </div>
                                                    
                    </footer>
                       <!-- @if(!$job->applied)
                        <h1>have not applied for job yet</h1>
                        @else
                            <div class="job-apply col-md-5">
                                
                                    
                                  <h3>Applied - {{ $job->applied_date }}</h3>
                                
                            </div>
                        @endif  -->
                                                    
                
                    <!-- /.job-tools-->
                    
                    <div class="job-details">
                        
                        <div class="details-content">
                        <?php $desc = str_replace("\n", "<br />", $jobInfo->JobDescription); ?>
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
                        <p>To apply for this job you can either call us during office hours on {{ $jobInfo->OperatorTel }} or email <a href="mailto:{{ $jobInfo->OperatorEmail }}"> {{ $jobInfo->OperatorEmail }}</a>,
                            <button class="purechat-button-expand" style="visibility: hidden;">
                                <img src="http://www.kdcplc.co.uk/img/icon-live-chat.png">
                                    Chat with us direct
                            </button>
                            Or fill in this form and we'll get back to you as soon as possible.
                        </p>

                        {{ Form::open(['url' => 'jobs/'.$jobInfo->JobId.'/apply', 'role' => 'form', 'files' => true]) }}
        
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
                                
                                <div class="row">
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
                                </div>
                            </fieldset>
                    
                                
                            <div class="submit-container">
                                <input type="submit" value="Submit">
                            </div>
                                
                   
                        </form>

                    </div>
                    <!--/.apply-form--form-->
                    <div class="refer-form col-md-12">
                        <div class="referPop">
                        <div class="info">
                            <p>Send this job to someone you know</p>
                            <p class="referInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc.</p>
                            {{ Form::open(['url' => 'jobs/share?id='.$jobInfo->JobId, 'role' => 'form']) }}
                        
                                <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your name *" name="nameRefer" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your email address *" name="emailRefer" required>
                                    </div>
                                    
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your friends name *" name="friendNameRefer" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Your friend's email address *" name="friendEmailRefer" required>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Your message" name="messageRefer">{{ $jobInfo->JobTitle }}&#10;&#13;Ref: {{ $jobInfo->JobRefNo }}.&#10;&#13;To find out more about htis role, please click on this link {{ URL::to('jobs/'.$jobInfo->JobId.'-'.Str::slug($jobInfo->JobTitle)) }}?ref=details
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
<section id="vacancies-slide" class="pane">

    <div class="container">
        <div class="tabTop inverse">
            <span>RECOMMENDED VACANCIES</span>
        </div>
    </div>

        <div class="container">
        <div class="row">
            <div id="vacancySlider">
                <div class="slider2">
                    <div class="slide">
                        <div class="vacancyUpper">
                            <span>
                                <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            </span>
                            <a href="#?ref=details">
                                <p>Job Title</p>
                                <span>REFERENCE <span>J123456</span></span>
                            </a>
                        </div> <!-- end vacancy upper -->
                        
                        <div class="vacancyDetails">
                            <ul>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Permanent
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Burkina Faso
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        <strong>One Squillion</strong>
                                    </span>
                                </li>
                            </ul>
                            <a href="#?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                            
                            <div class="vacancyTabs">
                                <a href="#?ref=details">DETAILS</a>
                                <a href="#?ref=refer">REFER</a>
                                <span>SHARE
                                
                                    
                                    
                                    <a href="#" class="shareTwitterModule">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                    </a>
                                    
                                    <a href="#" class="linkedModule">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                    </a>
                                    
                                    <div class="fb-share-button" data-href="#" data-type="link">
                                    </div>
                                </span>
                            </div>
                        </div> <!-- ed vcancy details -->
                        
                        
                        
                    </div> <!-- end slide -->
                    
                    <div class="slide">
                        <div class="vacancyUpper">
                            <span>
                                <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            </span>
                            <a href="#?ref=details">
                                <p>Job Title</p>
                                <span>REFERENCE <span>J123456</span></span>
                            </a>
                        </div> <!-- end vacancy upper -->
                        
                        <div class="vacancyDetails">
                            <ul>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Permanent
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Burkina Faso
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        <strong>One Squillion</strong>
                                    </span>
                                </li>
                            </ul>
                            <a href="#?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                            
                            <div class="vacancyTabs">
                                <a href="#?ref=details">DETAILS</a>
                                <a href="#?ref=refer">REFER</a>
                                <span>SHARE
                                
                                    
                                    
                                    <a href="#" class="shareTwitterModule">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                    </a>
                                    
                                    <a href="#" class="linkedModule">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                    </a>
                                    
                                    <div class="fb-share-button" data-href="#" data-type="link">
                                    </div>
                                </span>
                            </div>
                        </div> <!-- ed vcancy details -->
                        
                        
                        
                    </div> <!-- end slide -->
                    
                    <div class="slide">
                        <div class="vacancyUpper">
                            <span>
                                <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            </span>
                            <a href="#?ref=details">
                                <p>Job Title</p>
                                <span>REFERENCE <span>J123456</span></span>
                            </a>
                        </div> <!-- end vacancy upper -->
                        
                        <div class="vacancyDetails">
                            <ul>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Permanent
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Burkina Faso
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        <strong>One Squillion</strong>
                                    </span>
                                </li>
                            </ul>
                            <a href="#?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                            
                            <div class="vacancyTabs">
                                <a href="#?ref=details">DETAILS</a>
                                <a href="#?ref=refer">REFER</a>
                                <span>SHARE
                                
                                    
                                    
                                    <a href="#" class="shareTwitterModule">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                    </a>
                                    
                                    <a href="#" class="linkedModule">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                    </a>
                                    
                                    <div class="fb-share-button" data-href="#" data-type="link">
                                    </div>
                                </span>
                            </div>
                        </div> <!-- ed vcancy details -->
                        
                        
                        
                    </div> <!-- end slide -->
                    
                    <div class="slide">
                        <div class="vacancyUpper">
                            <span>
                                <img src="{{ URL::asset('/img/icon-job-item-generic.png') }}" alt="main icon" />
                            </span>
                            <a href="#?ref=details">
                                <p>Job Title</p>
                                <span>REFERENCE <span>J123456</span></span>
                            </a>
                        </div> <!-- end vacancy upper -->
                        
                        <div class="vacancyDetails">
                            <ul>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-type.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Permanent
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-location.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        Burkina Faso
                                    </span>
                                </li>
                                <li>
                                    <span class="iconHolder">
                                        <img src="http://www.kdcplc.co.uk/img/icon-salary.png" alt="job type icon">
                                    </span>
                                    <span class="vacancyDetail">
                                        <strong>One Squillion</strong>
                                    </span>
                                </li>
                            </ul>
                            <a href="#?ref=apply" class="applyButton"><span>APPLY</span> FOR JOB<span class="caret right"></span></a>
                            
                            <div class="vacancyTabs">
                                <a href="#?ref=details">DETAILS</a>
                                <a href="#?ref=refer">REFER</a>
                                <span>SHARE
                                
                                    
                                    
                                    <a href="#" class="shareTwitterModule">
                                        <img src="{{ URL::asset('/img/icon-header-twitter.png') }}" alt="twitter icon" />
                                    </a>
                                    
                                    <a href="#" class="linkedModule">
                                        <img src="{{ URL::asset('/img/icon-header-linkedin.png') }}" alt="linkedin icon" />
                                    </a>
                                    
                                    <div class="fb-share-button" data-href="#" data-type="link">
                                    </div>
                                </span>
                            </div>
                        </div> <!-- ed vcancy details -->
                        
                        
                        
                    </div> <!-- end slide -->
                    
                    
                </div> <!-- end slider 2 -->
            </div> <!-- end vacancy slider -->
        </div> <!-- end row -->
    </div>
            
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
